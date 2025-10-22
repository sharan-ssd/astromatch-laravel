<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Exception;

class UserController extends Controller
{
    // Define API URLs
    private $socialLoginAPI = "https://xspaz.com/xlive/mobile/socialLogin";
    private $sendOtpAPI = "https://xspaz.com/xlive/mobile/sendOtp2";
    private $verifyMobileAPI = "https://xspaz.com/xlive/v2/verifyMobile";

    public function handleRequest(Request $request)
    {
        if ($request->has('checkDuplicateMobile') && $request->checkDuplicateMobile === 'Y') {
            return $this->checkDuplicateMobile($request);
        }

        if ($request->has('checkDuplicateEmail') && $request->checkDuplicateEmail === 'Y') {
            return $this->checkDuplicateEmail($request);
        }

        if ($request->has('validateLogin') && $request->validateLogin === 'Y') {
            return $this->validateLogin($request);
        }

        if ($request->has('validateOTP') && $request->validateOTP === 'Y') {
            return $this->validateOTP($request);
        }

        return response()->json(['message' => 'Invalid request'], 400);
    }

    private function checkDuplicateMobile(Request $request)
    {
        $mobile = $request->input('mobile');
        $isdCode = $request->input('isdCode');
        $email = $request->input('email');
        $appID = $request->input('appID', '');
        $authID = $request->input('authID', '');
        $message = '';

        try {
            $user = DB::table('ab15_userInfo_table')->where('mobileNumber', $mobile)->first();

            if ($user) {
                $message = "Mobile number already registered.";
            } else {
                $signUpData = [
                    "message" => "",
                    "emailId" => $email,
                    "mobileNumber" => $mobile,
                    "isdCode" => $isdCode,
                ];

                // Step 1: Call socialLogin API
                $authToken = $this->socialLogin($signUpData, $appID, $authID);
                Session::put('authToken', $authToken);

                // Step 2: Send OTP
                $otp = $this->sendOtp($isdCode, $mobile, $authToken);
                Session::put('otp', $otp);

                // Step 3: Update user data
                DB::table('ivr0_signUp_table')
                    ->where('email', $email)
                    ->update(['isdCode' => $isdCode, 'mobileNumber' => $mobile]);
            }
        } catch (Exception $ex) {
            $message = $ex->getMessage();
        }

        return response($message);
    }

    private function checkDuplicateEmail(Request $request)
    {
        $email = $request->input('email');
        $message = '';

        try {
            $user = DB::table('ab15_userInfo_table')->where('email', $email)->first();

            if ($user) {
                $message = "Email already registered.";
            }
        } catch (Exception $ex) {
            $message = $ex->getMessage();
        }

        return response($message);
    }

    private function validateLogin(Request $request)
    {
        $email = $request->input('email');
        $userID = $request->input('userID');
        $message = '';

        $user = DB::table('ab15_userInfo_table')->where('email', $email)->first();

        if ($user && $user->userID != $userID) {
            $message = "Email not registered with this userID.";
        }

        return response($message);
    }

    private function validateOTP(Request $request)
    {
        $otp = $request->input('otp');
        $isdCode = $request->input('isdCode');
        $mobile = $request->input('mobile');
        $message = '';

        if (Session::has('otp')) {
            if ($otp == Session::get('otp')) {
                // Verify with external API
                $authToken = Session::get('authToken');
                $verified = $this->verifyMobile($isdCode, $mobile, $otp, $authToken);
                $message = $verified ? 'yes' : 'no';
            } else {
                $message = 'no';
            }
        }

        return response($message);
    }

    // ✅ API Helper Methods

    private function socialLogin(array $signUpData, $appID, $authID)
    {
        try {
            $url = "{$this->socialLoginAPI}?appID={$appID}&authID={$authID}";

            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ])->post($url, $signUpData);

            $response->throw();

            return $response->json()['authToken'] ?? '';
        } catch (Exception $e) {
            \Log::error('Social Login API error: ' . $e->getMessage());
            return '';
        }
    }

    private function sendOtp($isdCode, $mobile, $authToken)
    {
        try {
            $payload = [
                "isdCode" => $isdCode,
                "mobile" => $mobile,
            ];

            $response = Http::withHeaders([
                'Authorization' => "Bearer {$authToken}",
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ])->post($this->sendOtpAPI, $payload);

            $response->throw();

            return $response->json()['otp'] ?? rand(100000, 999999);
        } catch (Exception $e) {
            \Log::error('Send OTP API error: ' . $e->getMessage());
            return rand(100000, 999999);
        }
    }

    private function verifyMobile($isdCode, $mobile, $otp, $authToken)
    {
        try {
            $payload = [
                "isdCode" => $isdCode,
                "mobile" => $mobile,
                "otp" => $otp,
            ];

            $response = Http::withHeaders([
                'Authorization' => "Bearer {$authToken}",
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ])->post($this->verifyMobileAPI, $payload);

            $response->throw();

            $data = $response->json();
            return isset($data['status']) && $data['status'] === 'success';
        } catch (Exception $e) {
            \Log::error('Verify Mobile API error: ' . $e->getMessage());
            return false;
        }
    }
}
