<?php

/*
*
* Validate email if existing in the users, 
send otp for confirmations, and and update password here
*
*/

namespace App\Controllers;

use App\Models\CreateAccount;
use App\Models\UpdatePassword;
use App\Libraries\Hash;
use App\Libraries\EmailSender;

class ForgotPass extends BaseController
{
    protected $helpers = ['form'];
    protected $email, $hash,  $create, $upass;

    public function __construct()
    {
        // Initialize the email service //
        // Add objects at constructor //
        $this->email = new EmailSender();
        $this->create = new CreateAccount();
        $this->hash = new Hash();
        $this->upass = new UpdatePassword();
    }

    
    public function index()
    {
        $step = session()->get('step');
        if ($step === null || $step == 1) {
            $data = [
                'title' => "Forgot Password",
                'step' => 1,
            ];
        } elseif ($step == 2) {
            $data = [
                'title' => "Forgot Password",
                'step' => session()->get('step'),
            ];
        } 
        return view('templates/navbar', $data) . view('user/forgotpass', $data);
    }

    // Step 1 //
    // heck email if existing and send otp //
    public function step1()
    {
        $mail = $this->request->getPost('email');
        
        if ($this->request->getPost('submit') == "Back") {
            return redirect()->to('/account/login');
        }

        //check email if existing and send otp
        if ($this->create->isExisting($mail)) {
            session()->set('email', $mail);
            // Call email sender library - declare purpose and target as parameters //
            $this->email->send('otp', 'Forget Password', $mail);
            session()->set('step', 2);
        } else {
            session()->setFlashdata('emailErr', "The email you entered is already in not existing.");
            session()->set('step', 1);
        }
        
        return redirect()->to('/forgotpass/index');
    }

       public function step2()
    {
        if ($this->request->getPost('submit') == "Back") {
            session()->set('step', session()->get('step') - 1);
            return redirect()->to('/forgotpass/index');
        } 
        $mail = session()->get('email');
        $otp = $this->request->getPost('otp');
        $pass = $this->request->getPost('pass');
        $conpass = $this->request->getPost('conpass');
        $hashed = $this->hash->hash($pass);
        if($otp == session()->get('otp')){
            session()->set('inputOtp', $otp);
            $value = ['pass' => $hashed];
            if($pass == $conpass){
                if($this->upass->update($mail, $value)){
                    session()->remove('step');
                    session()->remove('otp');
                    session()->remove('email');
                    return redirect()->to('/account/login')->with("SucMess", "Your password has been changed successfully. Please your new password to log in.");
                } else {
                    session()->remove('step');
                    session()->remove('otp');
                    session()->remove('email');
                    return redirect()->to('/account/login')->with("loginErr", "Failed to change you password. Please try again");
                }
            } else {
                session()->setFlashdata('passErr', "The password you entered is not correct.");
                return redirect()->to('/forgotpass/index');
            }
        } else {
            session()->setFlashdata('otpErr', "The email you entered is not correct.");
            return redirect()->to('/forgotpass/index');
        }
    }

    public function resendOtp(){
        // Call email sender library - declare purpose and target as parameters //
        $this->email->send('otp', 'Forget Password', session()->get('email'));
        session()->set('step', 2);
        return redirect()->to('/forgotpass/index');
    }
}
