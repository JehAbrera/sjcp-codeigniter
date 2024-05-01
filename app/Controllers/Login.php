<?php

namespace App\Controllers;

use App\Models\ValidateLogin;

class Login extends BaseController
{
    protected $helpers = ['form'];
    protected $valid;

    public function __construct() 
    {
        $this->valid = new ValidateLogin();
    }
    public function index()
    {
        // unset data from signup //
        $array = ['step', 'fn', 'mn', 'ln', 'email', 'pass'];
        session()->remove($array);

        $data = [
            'title' => "account",
            'mode' => "login",
        ];
        return view('templates/navbar', $data) . view('user/account', $data);
    }

    public function login() {
        $user = $this->request->getPost('email');
        $pass = $this->request->getPost('password');
        if ($this->valid->index($user,$pass)) {
            return redirect()->to('/home');
        }
        return redirect()->to('/account/login');
    }
}
