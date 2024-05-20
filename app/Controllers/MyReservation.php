<?php

namespace App\Controllers;

use App\Models\GetReservation;

class MyReservation extends BaseController{

    protected $helpers = ['form'];
    protected $getres, $pager;
    public function __construct()
    {
        // Add objects at constructor //
        $this->getres = new \App\Models\GetReservation();
        $this->pager = \Config\Services::pager();
    }

    public function index()
    {
        $data = array();
        $reserv = $this->getres->queryAll("Pending", "sampleDOCUMENT@gmail.com")->paginate(10);
        $data = [
            'title' => 'My Reservation',
            'type' => 'Pending',
            'class' =>$this->forClass("Pending"),
            'reservations' => $reserv,
            'pager' => $this->getres->pager,
        ];
        return view('templates/navbar', $data) . view('templates/header', $data) . view('user/myreservation', $data) . view('templates/footer');

    }

    public function getStatus()
    {
        $status = $this->request->getPost('status');
        $email = "sampleDOCUMENT@gmail.com";
        $reserv = $this->getres->queryAll($status, $email)->paginate(10);
        $data = [
            'title' => 'My Reservation',
            'type' => $status,
            'class' => $this->forClass($status),
            'reservations' => $reserv,
            'pager' => $this->getres->pager,
        ];

        return view('templates/navbar', $data) . view('templates/header', $data) . view('user/myreservation', $data) . view('templates/footer');
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