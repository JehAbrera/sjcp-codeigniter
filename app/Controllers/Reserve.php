<?php

namespace App\Controllers;

class Reserve extends BaseController
{
    protected $helpers = ['form'];

    public function index()
    {
        $data = array();
        $data = [
            'title' => "reserve",
        ];
        return view('templates/navbar', $data) . view('user/reserve', $data) . view('templates/forms/'.$this->checkEvent()) . view('templates/footer');

    }

    public function checkEvent()
    {
        $event = session()->get('event');
        if($event == "Wedding")
        {
            $view = "wedding";
        } 
        else if($event == "Baptism")
        {
            $view = "baptism";
        }
        else if($event == "Funeral")
        {
            $view = "funeral";
        }
        else if($event == "Mass Intention")
        {
            $view = "massintention";
        }
        else if($event == "Blessing")
        {
            $view = "blessing";
        }
        return $view;
    }

    public function back()
    {
        if ($this->request->getPost('submit') == "Back") {
            session()->set('step', session()->get('step') - 1);
            return redirect()->to('/calendar/index');
        }
    }
}

?>