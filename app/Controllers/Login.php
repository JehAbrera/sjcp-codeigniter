<?php

/*
* Validate user login details
* If valid set logged in to true
*/

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
            'title' => "Account",
            'mode' => "login",
        ];
        return view('templates/navbar', $data) . view('user/account', $data);
    }

    public function login() {
        $user = $this->request->getPost('email');
        $pass = $this->request->getPost('password');
        if ($this->valid->index($user,$pass)) {
            session()->set('user', $user);
            session()->set('isLogged', true);
            return redirect()->to('/');
        }
        return redirect()->to('/account/login')->with('loginErr', "Invalid login details, make sure your details are correct!");
    }

    public function admin() {
        $user = $this->request->getPost('username');
        $pass = $this->request->getPost('password');
        if ($this->valid->index($user,$pass, 'liadmin')) {
            session()->set('adminLog', true);
            return redirect()->to('/admin/dashboard');
        }
        return redirect()->to('/admin/login')->with('loginErr', "Invalid login details, make sure your details are correct!");
    }
}
