<?php

namespace App\Controllers;

use App\Models\GetReservation;

class MyReservation extends BaseController{

    protected $helpers = ['form'];
    protected $getres;
    public function __construct()
    {
        // Add objects at constructor //
        $this->getres = new GetReservation();
    }

    public function index()
    {
        //$data = array();
        $reserv = $this->getres->queryAll("Pending", "sampleWEDDING@gmail.com");
        $data = [
            'title' => 'My Reservation',
            'type' => 'Pending',
            'class' =>$this->forClass("Pending"),
            'reservations' => $reserv,
        ];
        return view('templates/navbar', $data) . view('templates/header', $data) . view('user/myreservation', $data) . view('templates/popup', $data) . view('templates/footer');

    }

    public function getStatus()
    {
        $status = $this->request->getPost('status');
        $email = "sampleWEDDING@gmail.com";
        $reserv = $this->getres->queryAll($status, $email);
        $data = [
            'title' => 'My Reservation',
            'type' => $status,
            'class' => $this->forClass($status),
            'reservations' => $reserv,
        ];

        return view('templates/navbar', $data) . view('templates/header', $data) . view('user/myreservation', $data) . view('templates/popup', $data) . view('templates/footer');
    }

    public function forClass($status){
        if($status == "Pending"){
            $class = "text-yellow-400 ";
        } else if($status == "Accepted"){
            $class = "text-blue-600";
        } else if($status == "Completed"){
            $class = "text-green-400";
        } else if($status == "Declined"){
            $class = "text-red-800";
        } else if($status == "Canceled"){
            $class = "text-red-800";
        }
        return $class;
    }

}

?>