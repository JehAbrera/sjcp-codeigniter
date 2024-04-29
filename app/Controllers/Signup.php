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
        $data = [
            'title' => "account",
            'mode' => "signup",
            'step' => 1
        ];
        return view('templates/navbar', $data) . view('user/account', $data);
    }
    public function step1()
    {
        $fn = $this->request->getPost('fn');
        $mn = $this->request->getPost('mn');
        $ln = $this->request->getPost('ln');
        $data = [
            'title' => "account",
            'mode' => "signup",
            'step' => 2,
            'fn' => $fn,
            'mn' => $mn,
            'ln' => $ln,
        ];
        return view('templates/navbar', $data) . view('user/account', $data);
    }
    public function step2()
    {
        $mail = $this->request->getPost('email');
        $subject = "Signup OTP";
        $message = "your otp is 123456";
        $this->email->setTo($mail);
        $this->email->setFrom('stjohn.automatedmail@gmail.com', 'Me');
        $this->email->setSubject($subject);
        $this->email->setMessage($message);
        if (!$this->email->send()) {
            return view('admin/dashboard');
        }

        $data = [
            'title' => "account",
            'mode' => "signup",
            'step' => 3
        ];
        return view('templates/navbar', $data) . view('user/account', $data);
    }
    public function step3()
    {
        $data['title'] = "Home";
        return view('templates/navbar', $data) . view('templates/header', $data) . view('user/home');
    }
}
