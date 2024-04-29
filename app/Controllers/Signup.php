<?php

namespace App\Controllers;


class Signup extends BaseController {
    protected $helpers = ['form'];


    public function index() {
        $data = [
            'title' => "account",
            'mode' => "signup",
            'step' => 1
        ];
        return view('user/account', $data);
    }
    public function step1() {
        $data = [
            'title' => "account",
            'mode' => "signup",
            'step' => 2
        ];
        return view('user/account', $data);
    }
    public function step2() {
        $data = [
            'title' => "account",
            'mode' => "signup",
            'step' => 3
        ];
        return view('user/account', $data);
    }
    public function step3() {
        $data['title'] = "Home";
        return view('templates/navbar', $data) . view('templates/header', $data) . view('user/home') . view('templates/footer');
    }
}