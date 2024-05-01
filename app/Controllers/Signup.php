<?php

namespace App\Controllers;


class Signup extends BaseController
{
    protected $helpers = ['form'];
    public $email;

    public function __construct()
    {
        // Initialize the email service
        $this->email = \Config\Services::email();
    }
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
                'step' => 1
            ];
        } elseif ($step == 2) {
            $data = [
                'title' => "Account",
                'mode' => "signup",
                'step' => session()->get('step')
            ];
        } elseif ($step == 3) {
            $data = [
                'title' => "Account",
                'mode' => "signup",
                'step' => session()->get('step')
            ];
        }
        return view('templates/navbar', $data) . view('user/account', $data);
    }
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
    public function step2()
    {
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
        if ($this->request->getPost('submit') == "Back") {
            session()->set('step', session()->get('step') - 1);
            return redirect()->to('/account/signup');
        }
        session()->set('step', 3);
        return redirect()->to('/account/signup');
    }
    public function step3()
    {
        if ($this->request->getPost('submit') == "Back") {
            session()->set('step', session()->get('step') - 1);
            return redirect()->to('/account/signup');
        }
    }
}
