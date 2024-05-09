<?php 

/*
*
* Send emails here
* Email configuration located at app>Config>Email.php 
*
*/

namespace App\Libraries;

class EmailSender {

    protected $email;

    public function __construct()
    {
        $this->email = \Config\Services::email();
    }

    // Call to generate a random otp //
    protected function generateOTP($length = 6) : string {
        $startText = "SJCP";
        $nums = substr(str_shuffle("0123456789"), 0, $length);

        return $startText . $nums;
    }

    protected function generateMessage($status) {

    }

    public function send($purpose, $to) {

    }

}