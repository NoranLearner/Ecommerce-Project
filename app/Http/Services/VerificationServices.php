<?php

namespace App\Http\Services;

use App\Models\User;
use App\Models\UserVerificationCode;
use Illuminate\Support\Facades\Auth;

class VerificationServices
{

    /** set OTP code for mobile
     * @param $data
     *
     * @return User_verification
     */

    public function setVerificationCode($data)
    {
        $code = mt_rand(100000, 999999);
        $data['code'] = $code;
        UserVerificationCode::whereNotNull('user_id')->where(['user_id' => $data['user_id']])->delete();
        return UserVerificationCode::create($data);
    }


    public function getSMSVerifyMessageByAppName($code)
    {
        $message = " is your verification code for your account";
        return $code.$message;
    }


    public function checkOTPCode ($code){

        if (Auth::guard()->check()) {

            $verificationData = UserVerificationCode::where('user_id',Auth::id()) -> first();

            if($verificationData -> code == $code){
                User::whereId(Auth::id()) -> update(['mobile_verified_at' => now()]);
                return true;
            }
            else{
                return false;
            }
        }

        return false ;
    }


    public function removeOTPCode($code)
    {
        UserVerificationCode::where('code',$code) -> delete();
    }

}
