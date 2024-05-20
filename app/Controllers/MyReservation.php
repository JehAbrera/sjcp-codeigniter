<?php

namespace App\Controllers;

use App\Models\GetReservation;

class MyReservation extends BaseController{

    protected $helpers = ['form'];
    protected $getres;
    public function __construct()
    {
        // Add objects at constructor //
        $this->getres = new MyReservation();
    }

    public function index()
    {
        $data = array();
        $data = [
            'title' => "myreservation",
        ];
        return view('templates/navbar', $data) . view('user/myreservation', $data) . view('templates/popup', $data) . view('templates/footer');

    }

    public function getres()
    {

    }

}

?>