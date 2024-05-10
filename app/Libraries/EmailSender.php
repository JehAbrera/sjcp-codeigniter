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

    protected function generateMessage($value, $extra = null) : string {
        $msg = "";
        switch ($value) {
            case 'Registration':
                $msg = "To continue with your registration, please enter the OTP <b>$extra</b> to verify your email address. For your protection, please do not share this with anyone.<br>
                This is a system-generated email. Please do not reply to this email.";
                break;
            case 'Forget Password':
                break;
            case 'Status':
                switch ($extra) {
                    case 'Pending':
                        break;
                    case 'Approved':
                        break;
                    case 'Completed':
                        break;
                    case ('Declined' || 'Canceled'):
                        break;
                }
        }
        return $msg;
    }

    public function send($purpose, $reason, $to) {
        $this->email->setFrom('stjohn.automatedmail@gmail,com', 'Saint John of the Cross Parish');
        $this->email->setTo($to);
        $this->email->setMailType('html');
        if($purpose == 'otp') {
            $otp = $this->generateOTP();
            session()->set('otp', $otp);
            $subject = $otp . " is your OTP";
            $this->email->setSubject($subject);
            $message = $this->generateMessage($reason, $otp);
            $this->email->setMessage($message);
            $this->email->send();
        }
    }

}