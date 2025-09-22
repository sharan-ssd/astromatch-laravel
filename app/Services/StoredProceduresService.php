<?php
namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class StoredProceduresService
{
    /**
     * Process future data using stored procedure SP_AB_ProcessPositions
     */

    public function processFuture($userId, $defaultAstroProfileID, $chartId, $language)
    {
        try {
            // Call stored procedure
            DB::statement("CALL SP_AB_ProcessPositions(:userID, :astroProfileID, :chartID, :language, @o_responseCode, @o_responseMessage)", [
                'userID'        => $userId,
                'astroProfileID'=> $defaultAstroProfileID,
                'chartID'       => $chartId,
                'language'      => $language
            ]);

            // Fetch OUT parameters
            $row = DB::select("SELECT @o_responseCode as responseCode, @o_responseMessage as responseMessage");

            \Log::info("Process future SP called for astroProfileID : " . $defaultAstroProfileID);

            if (!empty($row)) {
                $responseCode = $row[0]->responseCode;
                $responseMessage = $row[0]->responseMessage;

                if ($responseCode == 0) {
                    return response()->json([
                        'status' => 'success',
                        'message' => $responseMessage
                    ]);
                } else {
                    return response()->json([
                        'status' => 'failed',
                        'message' => $responseMessage
                    ]);
                }
            } else {
                return response()->json([
                    'status' => 'failed',
                    'message' => 'Processing failed'
                ]);
            }
        } catch (\Exception $ex) {
            Log::error("processFuture error: " . $ex->getMessage(), ['trace' => $ex->getTraceAsString()]);
            return response()->json([
                'status' => 'error',
                'message' => 'Exception occurred',
                'details' => $ex->getMessage()
            ]);
        }
    }

    /**
     * Calculate Bhavaga Match using stored procedure SP_CalculateBhavagaMatching
     */
    public function calculateBhavagaMatch($userId, $mainProfileId, $mainUserGender, $allianceProfileId, $allianceUserGender, $chartId, $matchWrtGender) {
        try {

            $astroOrgID = config('services.report.astroOrgID');
            $astroOrgSDTemplateID_bhavaga = config('services.report.astroOrgSDTemplateID_bhavaga');
            $customReportOrgConfigID = config('services.report.customReportOrgConfigID');
            $customReportID = config('services.report.customReportID');
            DB::statement("
                CALL SP_CalculateBhavagaMatching(
                    :astroOrgID,
                    :astroOrgSDTemplateID,
                    :customReportOrgConfigID,
                    :customReportID,
                    :mainUserId,
                    :mainProfileId,
                    :mainUserGender,
                    :chartId,
                    :allianceUserId,
                    :allianceProfileId,
                    :allianceUserGender,
                    :chartId2,
                    :matchWrtGender
                )
            ", [
                'astroOrgID'             => $astroOrgID,
                'astroOrgSDTemplateID'   => $astroOrgSDTemplateID_bhavaga,
                'customReportOrgConfigID'=> $customReportOrgConfigID,
                'customReportID'         => $customReportID,
                'mainUserId'             => $userId,
                'mainProfileId'          => $mainProfileId,
                'mainUserGender'         => $mainUserGender,
                'chartId'                => $chartId,
                'allianceUserId'         => $userId,
                'allianceProfileId'      => $allianceProfileId,
                'allianceUserGender'     => $allianceUserGender,
                'chartId2'               => $chartId,   // second chartId binding
                'matchWrtGender'         => $matchWrtGender,
            ]);

            return [
                'status'  => 'success',
                'message' => 'Bhavaga match calculation executed successfully'
            ];
        } catch (\Exception $ex) {
            Log::error("calculateBhavagaMatch error: " . $ex->getMessage(), [
                'trace' => $ex->getTraceAsString()
            ]);

            return [
                'status'  => 'error',
                'message' => $ex->getMessage(),
            ];
        }
    }

    public function matchMaking($mainProfileId,$allianceProfileId,$matchmethod,$language,$userId) {
        try {
            $astroOrgConfigID = config('services.report.astroOrgConfigID');
            $astroOrgSDTemplateID = config('services.report.astroOrgSDTemplateID');
            if($matchmethod == "10point")
                $decisionTemplateId = config('services.report.southIndianMatchTemplateID');
            else
                $decisionTemplateId = config('services.report.northIndianMatchTemplateID');


            $decisionName = "Marriage Decision for Astro Profile ID : $mainProfileId with the Alliance ID(s) : $allianceProfileId";
            // Step 1: Decision
            $decisionId = $this->createDecision($decisionName, $decisionTemplateId, $userId);

            // Step 2: Factor priorities
            $this->copyFactorPriorities($decisionTemplateId, $decisionId);

            // Step 3: Option + assessment
            $optionId = $this->createOption($decisionId, $allianceProfileId);
            
            // 6. Call stored procedure
            DB::statement("
                CALL SP_MatchMaker_v4(:astroOrgSDTemplateID,:mainProfileId,:allianceProfileId,:language,:astroOrgConfigID,@a,@b,@c,@d)
            ", [
                'astroOrgSDTemplateID' => $astroOrgSDTemplateID,
                'mainProfileId'        => $mainProfileId,
                'allianceProfileId'    => $allianceProfileId,
                'language'             => $language,
                'astroOrgConfigID'     => $astroOrgConfigID,
            ]);

            $row = DB::select("SELECT @a as a, @b as b, @c as c, @d as d");

            $factors_result = $row[0]->c ?? '';
            $factor_values = explode(',', $factors_result);

            // 7. Extract factor IDs & values
            $factors = [];
            $factorIds = [];
            $count = 0;

            if ($matchmethod === "10point") {
                $factorIds = [7,14,11,13,5,6,10,8,4,9];
                $factors = [
                    $factor_values[6]  ?? 0,
                    $factor_values[14] ?? 0,
                    $factor_values[8]  ?? 0,
                    $factor_values[13] ?? 0,
                    $factor_values[3]  ?? 0,
                    $factor_values[5]  ?? 0,
                    $factor_values[4]  ?? 0,
                    $factor_values[15] ?? 0,
                    $factor_values[2]  ?? 0,
                    $factor_values[11] ?? 0,
                ];
                $count = 10;
            } elseif ($matchmethod === "36points") {
                $factorIds = [12,9,5,4,6,8,10,18];
                $factors = [
                    $factor_values[7]  ?? 0,
                    $factor_values[11] ?? 0,
                    $factor_values[3]  ?? 0,
                    $factor_values[2]  ?? 0,
                    $factor_values[5]  ?? 0,
                    $factor_values[15] ?? 0,
                    $factor_values[4]  ?? 0,
                    $factor_values[10] ?? 0,
                ];
                $count = 8;
            }

            // 8. Insert factor mappings
            $this->insertFactorMappings($decisionId, $optionId, $factorIds, $factors);

            return $decisionId;
        } catch (\Exception $ex) {
            Log::error("matchMaking error: " . $ex->getMessage(), [
                'trace' => $ex->getTraceAsString()
            ]);
            return null;
        }
    }

    public function quickDezider($decisionId)
    {
        try {
            $case2Flag = config('services.report.case2Flag');
            // Call stored procedure
            DB::statement('CALL SP_QuickDezider(:decisionId, :caseFlag)', [
                'decisionId' => $decisionId,
                'caseFlag'   => $case2Flag,
            ]);
        } catch (\Exception $ex) {
            Log::error('Error in quickDezider: ' . $ex->getMessage(), [
                'trace' => $ex->getTraceAsString()
            ]);
        }
    }
 
    /**
     * Common function → Create a new decision
     */
    private function createDecision($decisionName, $decisionTemplateId, $userId)
    {
        return DB::table('qd7_decisions_table')->insertGetId([
            'decisionName'        => $decisionName,
            'isTemplate'          => 'N',
            'decisionTemplateID'  => $decisionTemplateId,
            'decisionForUserID'   => $userId,
        ]);
    }

    /**
     * Common function → Copy factor priorities from template
     */
    private function copyFactorPriorities($fromTemplateId, $toDecisionId)
    {
        $factorPriorities = DB::table('qd3b_factorPriorities_table')
            ->where('associatedDecisionID', $fromTemplateId)
            ->get();

        foreach ($factorPriorities as $fp) {
            DB::table('qd3b_factorPriorities_table')->insert([
                'associatedDecisionID' => $toDecisionId,
                'factorID'             => $fp->factorID,
                'factorType'           => $fp->factorType,
                'classification'       => $fp->classification,
                'factorNotation'       => $fp->factorNotation,
                'level1Priority'       => $fp->level1Priority,
                'factorName'           => $fp->factorName,
                'expectedFactorValue'  => $fp->expectedFactorValue,
                'standardRating'       => $fp->standardRating,
                'realisticGap'         => $fp->realisticGap,
                'realisticRating'      => $fp->realisticRating,
            ]);
        }
    }

    /**
     * Common function → Insert option + assessment
     */
    private function createOption($decisionId, $allianceProfileId, $optionName = "")
    {
        $optionId = DB::table('qd5a_options_table')->insertGetId([
            'optionType'           => 'Alliances',
            'associatedProfileID'  => $allianceProfileId,
            'associatedDecisionID' => $decisionId,
            'optionName'           => $optionName,
            'optionSource'         => 'Self',
        ]);

        DB::table('qd5b_optionsAssessment_table')->insert([
            'associatedOptionID'   => $optionId,
            'optionName'           => $optionName,
            'associatedDecisionID' => $decisionId,
        ]);

        DB::table('qd7_decisions_table')
            ->where('decisionID', $decisionId)
            ->update([
                'listOfOptionsCosnidered' => $optionId,
            ]);

        return $optionId;
    }

    /**
     * Common function → Insert factor mappings
     */
    private function insertFactorMappings($decisionId, $optionId, $factorIds, $factorValues)
    {
        foreach ($factorIds as $index => $factorId) {
            DB::table('qd6_optionFactorMap_table')->insert([
                'associatedDecisionID' => $decisionId,
                'optionID'             => $optionId,
                'factorID'             => $factorId,
                'assessmentPercentage' => $factorValues[$index] ?? 0,
                'factorValueSource'    => 'Self',
                'assessmentInput'      => 'Automatic Percentage',
            ]);
        }
    }

    /**
     * Reuse helpers inside matchMaking / additionalMatchMaking
     */
    public function additionalMatchMaking($mainProfileId,$allianceProfileId,$factor_values,$userId) {
        $decisionTemplateId = config('services.report.additional36pointTemplateID');
        $decisionName = "Additional 36 Points Match Making for Astro Profile ID : $mainProfileId with the Alliance ID(s) : $allianceProfileId";

        // Step 1: Decision
        $decisionId = $this->createDecision($decisionName, $decisionTemplateId, $userId);

        // Step 2: Factor priorities
        $this->copyFactorPriorities($decisionTemplateId, $decisionId);

        // Step 3: Option + assessment
        $optionId = $this->createOption($decisionId, $allianceProfileId);

        // Step 4: Insert factor mappings
        $factorIds = [154, 155, 156, 157, 158, 159, 160, 161];
        $this->insertFactorMappings($decisionId, $optionId, $factorIds, $factor_values);

        // Step 5: Run QuickDezider
        $this->quickDezider($decisionId);

        // Step 6: Fetch overall %
        $row = DB::table('qd7_decisions_table')
            ->select('choosenOptionPercentage')
            ->where('decisionID', $decisionId)
            ->first();

        return $row->choosenOptionPercentage ?? 0;
    }

    public function checkTharaPalan($mainProfileID, $allianceProfileID, $starField, $genderType, $languageValues)
    {
        $tharaPalan   = '';
        $tharapalan1  = '';
        $tharapalan2  = '';

        try {
            // Call the stored procedure
            DB::statement("CALL SP_MatchByThara_v2(?, ?, @a, @b, @c, @d, @e, @f, @g, @h)", [
                $mainProfileID,
                $allianceProfileID
            ]);

            // Fetch OUT params
            $row = DB::selectOne("SELECT @a as a,@b as b,@c as c,@d as d,@e as e,@f as f,@g as g,@h as h");

            // Translate tharapalan1
            $row1 = DB::table('ab_translations_table')
                ->where('possibleValue_en', $row->b)
                ->value($starField);
            $tharapalan1 = $row1;

            $row2 = DB::table('ab_translations_table')
                ->where('possibleValue_en', $row->c)
                ->value($starField);
            $tharapalan1 .= " - " . $row2;

            // Translate tharapalan2
            $row3 = DB::table('ab_translations_table')
                ->where('possibleValue_en', $row->e)
                ->value($starField);
            $tharapalan2 = $row3;

            $row4 = DB::table('ab_translations_table')
                ->where('possibleValue_en', $row->f)
                ->value($starField);
            $tharapalan2 .= " - " . $row4;

            // Build result with gender-based display
            if (!empty($tharapalan1)) {
                if ($genderType === "Male") {
                    $tharaPalan = "<br/><span class='text-center fw-bold text-pink'>" . 
                        $languageValues['femaletharapalan'] . " : </span><span class='text-center fw-bold'>" . $tharapalan1 . "</span><br/>" .
                        "<span class='text-center fw-bold text-pink'>" . $languageValues['maletharapalan'] . " : </span><span class='text-center fw-bold'>" . $tharapalan2 . "</span>";
                } else {
                    $tharaPalan = "<br/><span class='text-center fw-bold text-pink'>" . 
                        $languageValues['maletharapalan'] . " : </span><span class='text-center fw-bold'>" . $tharapalan1 . "</span><br/>" .
                        "<span class='text-center fw-bold text-pink'>" . $languageValues['femaletharapalan'] . " : </span><span class='text-center fw-bold'>" . $tharapalan2 . "</span>";
                }
            }

            // Append additional values
            $tharaPalan .= "##" . $row->g . "##" . $row->h;

        } catch (\Exception $ex) {
            Log::error("Error in checkTharaPalan: " . $ex->getMessage(), [
                'trace' => $ex->getTraceAsString()
            ]);
        }

        return $tharaPalan;
    }

    function checkForDasaSandhi($astroProfileID)
    {
        $output = "";
        
        try {
            // Call stored procedure with input and output parameters
            DB::statement('CALL SP_CheckForDasaSandhi(:astroProfileID,@a,@b,@c,@d,@e,@f,@g,@h,@i)', [
                'astroProfileID' => $astroProfileID
            ]);

            // Fetch output parameters
            $row = DB::select('SELECT @a, @b, @c, @d, @e, @f, @g, @h, @i')[0];

            $output = $row->{'@a'} . '##' . $row->{'@b'} . '##' . $row->{'@c'};

        } catch (\Exception $ex) {
            // Log exception using Laravel log
            \Log::error($ex->getMessage());
            \Log::error($ex->getTraceAsString());
        }

        return $output;
    }

    function matchByRahuKethu($mainProfileID, $allianceProfileID)
    {
        $output = "";

        try {
            // Call the stored procedure
            DB::statement('CALL SP_MatchByRahuKethu(:mainProfileID, :allianceProfileID, @a, @b)', [
                'mainProfileID' => $mainProfileID,
                'allianceProfileID' => $allianceProfileID
            ]);

            // Fetch the output parameters
            $row = DB::select('SELECT @a, @b')[0];

            $output = $row->{'@a'} . '##' . $row->{'@b'};

        } catch (\Exception $ex) {
            \Log::error($ex->getMessage());
            \Log::error($ex->getTraceAsString());
        }

        return $output;
    }

    function checkMudakkuRasi($mainProfileID, $allianceProfileID)
    {
        $output = "";

        try {
            // Call the stored procedure
            DB::statement('CALL SP0_CheckMudakkuRasi(:mainProfileID, :allianceProfileID, @a, @b)', [
                'mainProfileID' => $mainProfileID,
                'allianceProfileID' => $allianceProfileID
            ]);

            // Fetch the output parameters
            $row = DB::select('SELECT @a, @b')[0];

            $output = $row->{'@a'} . '##' . $row->{'@b'};

        } catch (\Exception $ex) {
            \Log::error($ex->getMessage());
            \Log::error($ex->getTraceAsString());
        }

        return $output;
    }

    function integratedNumeroMatching($astroOrgSDTemplateID, $mainProfileID, $allianceProfileID, $gender, $lang, $languageValues)
    {
        $result = "";

        try {
            // Call the stored procedure
            DB::statement('CALL SP_IntegratedNumeroMatching(:astroOrgSDTemplateID, :mainProfileId, :allianceProfileId, :language, @a, @b)', [
                'astroOrgSDTemplateID' => $astroOrgSDTemplateID,
                'mainProfileId' => $mainProfileID,
                'allianceProfileId' => $allianceProfileID,
                'language' => $lang
            ]);

            // Fetch output parameters
            $row = DB::select('SELECT @a, @b')[0];
            $jsonString = $row->{'@b'};

            // Decode JSON
            $dataArray = json_decode($jsonString, true);

            if (json_last_error() === JSON_ERROR_NONE) {
                // Destiny Number
                if ($gender === "Male") {
                    $result .= $languageValues['destinynumbermale'] . " : " . $dataArray[0]["Destiny Number based Matching Percentage for Other User"] . " %" . "<br>";
                    $result .= $languageValues['destinynumberfemale'] . " : " . $dataArray[0]["Destiny Number based Matching Percentage for Main User"] . " %" . "<br>";
                } else {
                    $result .= $languageValues['destinynumbermale'] . " : " . $dataArray[0]["Destiny Number based Matching Percentage for Main User"] . " %" . "<br>";
                    $result .= $languageValues['destinynumberfemale'] . " : " . $dataArray[0]["Destiny Number based Matching Percentage for Other User"] . " %" . "<br>";
                }
                $result .= $languageValues['destinynumberpercentage'] . " : " . $dataArray[0]["Destiny Number based Overall Matching Percentage"] . " %  -  " . $dataArray[0]["Destiny Number based Overall Matching Remarks"] . "<br><br>";

                // Birth Number
                if ($gender === "Male") {
                    $result .= $languageValues['birthnumbermale'] . " : " . $dataArray[1]["Birth Number based Matching Percentage for Other User"] . " %" . "<br>";
                    $result .= $languageValues['birthnumberfemale'] . " : " . $dataArray[1]["Birth Number based Matching Percentage for Main User"] . " %" . "<br>";
                } else {
                    $result .= $languageValues['birthnumbermale'] . " : " . $dataArray[1]["Birth Number based Matching Percentage for Main User"] . " %" . "<br>";
                    $result .= $languageValues['birthnumberfemale'] . " : " . $dataArray[1]["Birth Number based Matching Percentage for Other User"] . " %" . "<br>";
                }
                $result .= $languageValues['birthnumberpercentage'] . " : " . $dataArray[1]["Birth Number based Overall Matching Percentage"] . " %  -  " . $dataArray[1]["Birth Number based Overall Matching Remarks"] . "<br><br>";

                // Name Number
                if ($gender === "Male") {
                    $result .= $languageValues['namenumbermale'] . " : " . $dataArray[2]["Name Number based Matching Percentage for Other User"] . " %" . "<br>";
                    $result .= $languageValues['namenumberfemale'] . " : " . $dataArray[2]["Name Number based Matching Percentage for Main User"] . " %" . "<br>";
                } else {
                    $result .= $languageValues['namenumbermale'] . " : " . $dataArray[2]["Name Number based Matching Percentage for Main User"] . " %" . "<br>";
                    $result .= $languageValues['namenumberfemale'] . " : " . $dataArray[2]["Name Number based Matching Percentage for Other User"] . " %" . "<br>";
                }
                $result .= $languageValues['namenumberpercentage'] . " : " . $dataArray[2]["Name Number based Overall Matching Percentage"] . " %  -  " . $dataArray[2]["Name Number based Overall Matching Remarks"] . "<br><br>";

                // Overall Numero-Nameology
                $result .= $languageValues['numeronamologyoverallpercentage'] . " : <span style='color:#b90075;font-size:18px;'>" . $dataArray[3]["Overall Numero-Nameology Matching Percentage"] . " %</span>" . "<br>";
                $result .= $languageValues['numeronamologyoverallremarks'] . " : " . $dataArray[3]["Overall Numero-Nameology Matching Remarks"];
                $result .= "##" . $dataArray[3]["Overall Numero-Nameology Matching Percentage"];
            }

        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
            Log::error($ex->getTraceAsString());
            $result = "";
        }

        return $result;
    }
    
    function matchMakingDecision($mainProfileId, $allianceProfileId, $decisionTemplateId, $factor_values, $userId, $case2Flag)
    {
        $overAllPercentage = 0;
        $decisionName = "Match Making Decision for Astro Profile ID: {$mainProfileId} with the Alliance ID(s): {$allianceProfileId}";

        try {
            DB::beginTransaction();

            // Insert decision
            $decisionId = DB::table('qd7_decisions_table')->insertGetId([
                'decisionName' => $decisionName,
                'isTemplate' => 'N',
                'decisionTemplateID' => $decisionTemplateId,
                'decisionForUserID' => $userId,
            ]);

            // Copy factor priorities from template
            $factorPriorities = DB::table('qd3b_factorPriorities_table')
                ->where('associatedDecisionID', $decisionTemplateId)
                ->get();

            foreach ($factorPriorities as $fp) {
                DB::table('qd3b_factorPriorities_table')->insert([
                    'associatedDecisionID' => $decisionId,
                    'factorID' => $fp->factorID,
                    'factorType' => $fp->factorType,
                    'classification' => $fp->classification,
                    'factorNotation' => $fp->factorNotation,
                    'level1Priority' => $fp->level1Priority,
                    'factorName' => $fp->factorName,
                    'expectedFactorValue' => $fp->expectedFactorValue,
                    'standardRating' => $fp->standardRating,
                    'realisticGap' => $fp->realisticGap,
                    'realisticRating' => $fp->realisticRating,
                ]);
            }

            // Insert option
            $optionId = DB::table('qd5a_options_table')->insertGetId([
                'optionType' => 'Alliances',
                'associatedProfileID' => $allianceProfileId,
                'associatedDecisionID' => $decisionId,
                'optionName' => '',
                'optionSource' => 'Self',
            ]);

            // Insert option assessment
            DB::table('qd5b_optionsAssessment_table')->insert([
                'associatedOptionID' => $optionId,
                'optionName' => '',
                'associatedDecisionID' => $decisionId,
            ]);

            // Update decision with option
            DB::table('qd7_decisions_table')
                ->where('decisionID', $decisionId)
                ->update(['listOfOptionsCosnidered' => $optionId]);

            // Insert factor mappings with assessment percentages
            $factorIds = [144,145,146,147,148,149,150,151,152,153];
            foreach ($factorIds as $index => $factorId) {
                DB::table('qd6_optionFactorMap_table')->insert([
                    'associatedDecisionID' => $decisionId,
                    'optionID' => $optionId,
                    'factorID' => $factorId,
                    'assessmentPercentage' => $factor_values[$index],
                    'factorValueSource' => 'Self',
                    'assessmentInput' => 'Automatic Percentage',
                ]);
            }

            // Call the quickDezider function (if still needed)
            quickDezider($decisionId, $case2Flag);

            // Fetch the final choosenOptionPercentage
            $overAllPercentage = DB::table('qd7_decisions_table')
                ->where('decisionID', $decisionId)
                ->value('choosenOptionPercentage') ?? 0;

            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            Log::error($ex->getMessage());
            Log::error($ex->getTraceAsString());
            $overAllPercentage = 0;
        }

        return $overAllPercentage;
    }

    function checkRaghuDosha($astroProfileID)
    {
        $doshaResult = "";

        try {
            // Call stored procedure
            $row = DB::selectOne('CALL SP_CheckRahuDosha(:astroProfileID, @a, @b, @c, @d)', [
                'astroProfileID' => $astroProfileID
            ]);

            // Fetch output variables
            $outputs = DB::selectOne('SELECT @a as a, @b as b, @c as c, @d as d');

            if ($outputs && $outputs->a === "Y") {
                $doshaResult = "(" . $outputs->c . "-" . $outputs->d . ")";
            }
        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
            Log::error($ex->getTraceAsString());
        }

        return $doshaResult;
    }

    function checkSevvaaiDosha($astroProfileID, $astroOrgSDTemplateID, $languageValues, $convertLang = 'English')
    {
        $doshaResult = "";

        try {
            // Call stored procedure
            DB::statement('CALL SP_CheckSevvaaiDosha(:astroProfileID, :astroOrgSDTemplateID, @a,@b,@c,@d,@e,@f,@g,@h,@i,@j,@k,@l,@m,@n,@o,@p,@q)', [
                'astroProfileID' => $astroProfileID,
                'astroOrgSDTemplateID' => $astroOrgSDTemplateID
            ]);

            // Fetch output variables
            $row = DB::selectOne('SELECT @a as a,@b as b,@c as c,@d as d,@e as e,@f as f,@g as g,@h as h,@i as i,@j as j,@k as k,@l as l,@m as m,@n as n,@o as o,@p as p,@q as q');

            if ($row && $row->m >= 1) {
                $numberOfDoshaTypesIdentified = $row->m;
                $applicableDoshaTypes = $row->n;
                $overallSevvaaiDoshaLevel = $row->q;

                $fromLagnaLevel = $row->g;
                $fromRasiLevel = $row->h;
                $fromSukranLevel = $row->i;

                $tempTypes = explode(',', $row->n);

                $formattedDoshas = [];

                foreach ($tempTypes as $type) {
                    $typeName = $type;

                    if ($convertLang != 'English') {
                        $translation = DB::selectOne(
                            "SELECT fn_translateList('ab_sevvaaiDoshaLevels_table','doshaType',:type,'English',:lang,1) as translated",
                            ['type' => $type, 'lang' => $convertLang]
                        );
                        $typeName = $translation->translated ?? $type;
                    } else {
                        $typeName = str_replace('From', 'From ', $type);
                    }

                    switch ($type) {
                        case 'FromRasi':
                            $formattedDoshas[] = round($fromRasiLevel) . "% - " . $typeName;
                            break;
                        case 'FromLagna':
                            $formattedDoshas[] = round($fromLagnaLevel) . "% - " . $typeName;
                            break;
                        default:
                            $formattedDoshas[] = round($fromSukranLevel) . "% - " . $typeName;
                            break;
                    }
                }

                $doshaResult = implode(', ', $formattedDoshas);
                $doshaResult .= "<br>" . ($languageValues['sevvaaipercentage'] ?? 'Sevvaai Percentage') . " : " . round($overallSevvaaiDoshaLevel) . "%"
                    . "##" . $numberOfDoshaTypesIdentified . "^" . $applicableDoshaTypes . "^" . $overallSevvaaiDoshaLevel;
            }

        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
            Log::error($ex->getTraceAsString());
        }

        return $doshaResult;
    }

    function matchSevvaaiDosha($astroOrgSDTemplateID,$maleAstroProfileID,$femaleAstroProfileID,$weightageMode,$numberOfMaleDoshaTypesIdentified,$numberOfFemaleDoshaTypesIdentified,$applicableMaleDoshaTypes,$applicableFemaleDoshaTypes,$overallMaleSevvaaiDoshaLevel,$overallFemaleSevvaaiDoshaLevel,$convertLang = 'English') {
        $doshaResult = "";

        try {
            // Call stored procedure
            DB::statement('CALL SP_MatchBySevvaaiDosha(
                :astroOrgSDTemplateID,
                :maleAstroProfileID,
                :femaleAstroProfileID,
                :weightageMode,
                :numberOfMaleDoshaTypesIdentified,
                :numberOfFemaleDoshaTypesIdentified,
                :applicableMaleDoshaTypes,
                :applicableFemaleDoshaTypes,
                :overallMaleSevvaaiDoshaLevel,
                :overallFemaleSevvaaiDoshaLevel,
                @a,@b
            )', [
                'astroOrgSDTemplateID' => $astroOrgSDTemplateID,
                'maleAstroProfileID' => $maleAstroProfileID,
                'femaleAstroProfileID' => $femaleAstroProfileID,
                'weightageMode' => $weightageMode,
                'numberOfMaleDoshaTypesIdentified' => $numberOfMaleDoshaTypesIdentified,
                'numberOfFemaleDoshaTypesIdentified' => $numberOfFemaleDoshaTypesIdentified,
                'applicableMaleDoshaTypes' => $applicableMaleDoshaTypes,
                'applicableFemaleDoshaTypes' => $applicableFemaleDoshaTypes,
                'overallMaleSevvaaiDoshaLevel' => $overallMaleSevvaaiDoshaLevel,
                'overallFemaleSevvaaiDoshaLevel' => $overallFemaleSevvaaiDoshaLevel
            ]);

            // Fetch output variables
            $row = DB::selectOne('SELECT @a as a, @b as b');

            if ($row && $row->a != "") {
                // Translate if needed
                $output = $row->b;
                if ($convertLang != 'English') {
                    $translation = DB::selectOne(
                        "SELECT fn_translateList('ab_sevvaaiDoshaOverallRangeMatching_table','overallRangeMatchingStatus',:value,'English',:lang,1) as translated",
                        ['value' => $row->b, 'lang' => $convertLang]
                    );
                    $output = $translation->translated ?? $row->b;
                }

                $doshaResult = round($row->a) . "%"; // You can append "- $output" if needed
            }

        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
            Log::error($ex->getTraceAsString());
        }

        return $doshaResult;
    }
}