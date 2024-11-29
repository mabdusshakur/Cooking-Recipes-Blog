<?php

namespace App\Helpers;
use App\Jobs\SendOtpEmail;
use App\Mail\OtpMail;
use Mail;
use Str;

class OtpHelper
{
    public $otp_length, $mail;
    public $otp;

    public function __construct($otp_length = 4, $mail)
    {
        $this->otp_length = $otp_length;
        $this->mail = $mail;
        $this->otp = $this->generateOtp();
    }

    public function generateOtp()
    {
        return substr(str_shuffle(str_repeat('0123456789', $this->otp_length)), 0, $this->otp_length);
    }

    public function getOtp()
    {
        return $this->otp;
    }

    public function sendOtp($email, $data = [])
    {
        try {
            $data = array_merge($data, ['otp' => $this->otp]);
            SendOtpEmail::dispatch($email, $data);
            return true;
        } catch (\Throwable $th) {
            Logger::Log($th);
            return false;
        }
    }
}