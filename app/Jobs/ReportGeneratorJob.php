<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;


class ReportGeneratorJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $user;

    public function __construct()
    {
        // $this->user = $user;
    }

    public function handle()
    {
        print(sesssion('report_unique_id'));
        // print_r("Deferred task fired for user: " . $this->user->id);
        // \Log::info("Deferred task fired for user: " . $this->user->id);
        // try {
        //     $data = $saved_horoscope;

        //     DB::beginTransaction();

        //     // ✅ Example Insert using Query Builder
        //     $mainProfileId = DB::table('ab15b_astroProfile_table')->insertGetId([
        //         'astroProfileName' => $data['fullname1'],
        //         'userName' => $data['fullname1'],
        //         'gender' => 'Male',
        //         'dateOfBirth' => $data['male-year'] . '-' . $data['male-month'] . '-' . $data['male-date'],
        //         'timeOfBirth' => $this->convertTo24Hour($data['male-hour'], $data['male-minute'], $data['ampm1']),
        //         'placeOfBirthCity' => explode(",", $data['maleplace'])[0] ?? '',
        //         'placeOfBirthState' => explode(",", $data['maleplace'])[1] ?? '',
        //         'placeOfBirthCountry' => explode(",", $data['maleplace'])[2] ?? '',
        //         'associatedUserID' => $userId,
        //         'isAllianceProfile' => 'Y',
        //         'isMainUserProfile' => 'Y',
        //         'isdCode' => $isdCode,
        //         'mobileNumber' => $mobile,
        //         'email' => $email,
        //     ]);

        //     Log::info("Main horoscope created: " . $mainProfileId);
        //     session('report_unique_id', null);
        // } catch (Exception $ex) {
        //     DB::rollBack();
        //     Log::error($ex->getMessage());
        //     session('report_unique_id', 123);
        //     return back()->with('error', 'Something went wrong, please try later.');
        // }
    }

    private function convertTo24Hour($hour, $minute, $ampm)
    {
        if ($ampm == "AM" && $hour == "12") $hour = 0;
        if ($ampm == "PM" && $hour != "12") $hour += 12;
        return sprintf("%02d:%02d", $hour, $minute);
    }

}
