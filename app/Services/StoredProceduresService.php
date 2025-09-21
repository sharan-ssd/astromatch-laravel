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

            \Log::error("Process future SP called for astroProfileID : " . $defaultAstroProfileID);

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
                'astroOrgSDTemplateID'   => $astroOrgSDTemplateID,
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

}