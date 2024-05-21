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


    /*
    *
    * Parameters to Pass
    * value = Registration, Forget Password, Status
    * extra = otp value or status value
    * reference = for status, pass reference number
    * $reason = leave blank for status changes with no reason, include if status has reason
    *
    */
    protected function generateMessage($value, $extra = null, $reference = null, $reason = null, ) : string {
        $msg = "";
        switch ($value) {
            case 'Registration':
                $msg = "To continue with your registration, please enter the OTP <b>$extra</b> to verify your email address. For your protection, please do not share this with anyone.<br><br>
                This is a system-generated email. Please do not reply to this email.<br><br>
                SJCP";
                break;
            case 'Forget Password':
                $msg = "To continue resetting your password, please enter the OTP <b>$extra</b> to verify your email address. For your protection, please do not share this with anyone.<br><br>
                This is a system-generated email. Please do not reply to this email.<br><br>
                SJCP";
                break;
            case 'Status':
                switch ($extra) {
                    case 'Pending':         // REPLACE $EXTRA WITH REFERENCE NUMBER VARIABLE
                        $msg = "Your reservation with the reference number <b>$reference</b> has been submitted and is currently pending for review. Please wait 1 to 2 days to get an update regarding your reservation.<br><br>
                        This is a system-generated email. Please do not reply to this email.<br><br>
                        SJCP";
                        break;
                    case 'Accepted':
                        $msg = "Your reservation with the reference number <b>$reference</b> has been approved. Please do not forget to submit any requirements related to your event to the church staff prior to your scheduled date. You may view the SJCP website for more details.<br><br>
                        This is a system-generated email. Please do not reply to this email.<br><br>
                        SJCP";
                        break;
                    case 'Completed':
                        $msg = "Your reservation with the reference number <b>$reference</b> has been completed. Thank you for scheduling your event with us!<br><br>
                        This is a system-generated email. Please do not reply to this email.<br><br>
                        SJCP";
                        break;
                    case ('Declined' || 'Canceled'):                            // REPLACE 2ND $EXTRA WITH STATUS; REPLACE 3RD $EXTRA WITH REASON
                        $msg = "Unfortunately, your reservation with the reference number <b>$reference</b> has been $extra due to the following reason: $reason.<br><br>
                        We apologize for the inconvenience. You may reschedule your reservation for a different date or time.<br><br>
                        This is a system-generated email. Please do not reply to this email.<br><br>
                        SJCP";
                        break;
                }
        }
        return $msg;
    }

    public function send($purpose, $value, $to, $reference = null, $status = null, $reason = null) {
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
        } else if($purpose == 'updateStat'){
            $subject = "Your Reservation has been " . $status;
            $this->email->setSubject($subject);
            if($status == "Accepted"){
                $message = $this->generateMessage($value, $status, $reference);
            } else {
                $message = $this->generateMessage($value, $status, $reference, $reason);
            }
            $this->email->setMessage($message);
            $this->email->send();
        }
    }

}