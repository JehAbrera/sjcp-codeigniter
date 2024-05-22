<?php

namespace App\Controllers;

use App\Models\GetReservation;

class MyReservation extends BaseController
{

    protected $helpers = ['form'];
    protected $getres, $pager, $updateres;

    public function __construct()
    {
        // Add objects at constructor //
        $this->getres = new \App\Models\GetReservation();
        $this->updateres = new \App\Models\UpdateReservation();
        $this->pager = \Config\Services::pager();
    }

    public function checkLogin(){
        if(!session()->get('isLogged') || !session()->has('isLogged')){
            return redirect()->to('/account/login')->with('SucMess', 'Please Login before accessing the page');
        } else {
            return redirect()->to('/myreservation/status/Pending');
        }
    }

    public function getStatus($status)
    {
        $email = session()->get('user');
        $reserv = $this->getres->queryAll($status, $email)->paginate(10);
        foreach ($reserv as &$res) {
            $add = [];
            $tbl = $this->table($res['type']);
            $add = [
                'det' => $this->viewDetails($tbl, $res['id'])
            ];
            $res = array_merge($res, $add);
        }
        $data = [
            'title' => 'My Reservation',
            'type' => $status,
            'class' => $this->forClass($status),
            'reservations' => $reserv,
            'pager' => $this->getres->pager,
        ];

        return view('templates/navbar', $data) . view('templates/header', $data) . view('user/myreservation', $data) . view('templates/footer');
    }

    public function cancelReserve()
    {
        $id = $this->request->getPost('id');
        $reason = $this->request->getPost('reason');
        $status = "Canceled";
        if ($reason == "Others") {
            $reason = $this->request->getPost('otherinput');
        }
        $this->updateres->updateReserv($id, $reason, $status);
        return redirect()->to('/myreservation/status/Canceled')->with('SucMess', 'Reservation successfully canceled your reservation');

    }

    public function viewDetails($tbl, $id)
    {
        $reserv = $this->getres->getDetails($tbl, $id);
        return $reserv;
    }

    public function forClass($status)
    {
        if ($status == "Pending") {
            $class = "text-yellow-400 ";
        } else if ($status == "Accepted") {
            $class = "text-blue-600";
        } else if ($status == "Completed") {
            $class = "text-green-400";
        } else if ($status == "Declined") {
            $class = "text-red-800";
        } else if ($status == "Canceled") {
            $class = "text-red-800";
        }
        return $class;
    }

    public function table($type)
    {
        if ($type == "Wedding") {
            return $this->table = 'detwed';
        } else if ($type == "Baptism") {
            return $this->table = 'detbap';
        } else if ($type == "Funeral Mass/Blessing") {
            return $this->table = 'detfun';
        } else if ($type == "Mass Intention") {
            return $this->table = 'detmass';
        } else if ($type == "Blessing") {
            return $this->table = 'detbls';
        } else {
            return $this->table = 'detdocu';
        }
    }

}

?>