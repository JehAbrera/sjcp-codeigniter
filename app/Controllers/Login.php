<?php 

namespace App\Controllers;

class Login extends BaseController {
    protected $helpers = ['form'];

    public function index() {
        $data = [
            'title' => "account",
            'mode' => "login",
        ];
        return view('user/account', $data);
    }
}