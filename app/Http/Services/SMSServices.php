<?php

namespace App\Http\Services;

use App\Models\UserVerificationCode;

class SMSServices
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

}
