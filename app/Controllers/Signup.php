<?php

/*
*
* Signup.php handles the process of account creation
* Validate data, send otp for confirmations, and create accounts here
* For email configuration check 
*
*/

namespace App\Controllers;

use App\Models\CreateAccount;

class Signup extends BaseController
{
    protected $helpers = ['form'];
    public $email, $create;

    public function __construct()
    {
        // Initialize the email service //
        // Add objects at constructor //
        $this->email = \Config\Services::email();
        $this->create = new CreateAccount();
    }

    // Steps are the process of account creation, different steps collect different info //
    public function index()
    {
        $step = session()->get('step');
        if ($step === null || $step == 1) {
            $data = [
                'title' => "Account",
                'mode' => "signup",
                'fn' => session()->get('fn'),
                'mn' => session()->get('mn'),
                'ln' => session()->get('ln'),
                'step' => 1,
            ];
        } elseif ($step == 2) {
            $data = [
                'title' => "Account",
                'mode' => "signup",
                'step' => session()->get('step'),
            ];
        } elseif ($step == 3) {
            $data = [
                'title' => "Account",
                'mode' => "signup",
                'step' => session()->get('step'),
            ];
        }
        return view('templates/navbar', $data) . view('user/account', $data);
    }
    // Step 1 //
    // To add: input formatting //
    public function step1()
    {
        session()->set('fn', $this->request->getPost('fn'));
        session()->set('mn', $this->request->getPost('mn'));
        session()->set('ln', $this->request->getPost('ln'));
        if ($this->request->getPost('submit') == "Back") {
            session()->set('step', session()->get('step') - 1);
            return redirect()->to('/account/signup');
        }
        session()->set('step', 2);
        return redirect()->to('/account/signup');
    }

    // Step 2 collects the user email and password //
    // Valiadate email and send otp for confirmation //
    // To add: email validation for duplicate emails //
    public function step2()
    {
        if ($this->request->getPost('submit') == "Back") {
            session()->set('step', session()->get('step') - 1);
            return redirect()->to('/account/signup');
        }
        $mail = $this->request->getPost('email');
        $pass = $this->request->getPost('pass');
        session()->set('email', $mail);
        session()->set('pass', $pass);
        $subject = "Signup OTP";
        $message = "your otp is 123456";
        $this->email->setTo($mail);
        $this->email->setFrom('stjohn.automatedmail@gmail.com', 'Me');
        $this->email->setSubject($subject);
        $this->email->setMessage($message);
        $this->email->send();
        session()->set('step', 3);
        return redirect()->to('/account/signup');
    }

    // Step 3 //
    // Collect otp sent //
    // If otp is valid - create account - else - return an error //
    // To add: otp validation //
    public function step3()
    {
        if ($this->request->getPost('submit') == "Back") {
            session()->set('step', session()->get('step') - 1);
            return redirect()->to('/account/signup');
        }
        $fn = session()->get('fn');
        $mn = session()->get('mn');
        $ln = session()->get('ln');
        $em = session()->get('email');
        $pass = session()->get('pass');
        if ($this->create->index($fn, $mn, $ln, $em, $pass)) {
            $array = ['step', 'fn', 'mn', 'ln', 'email', 'pass'];
            session()->remove($array);
            return redirect()->to('/account/login');
        }
        return redirect()->to('/account/signup');
    }
}
