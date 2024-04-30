<?php 

namespace App\Controllers;

class Calendar extends BaseController{
    protected $helpers = ['form'];
    
    public function index() {
        $data = [
            'title' => "calendar",
            'step' => 1
        ];
        return view('templates/navbar', $data) . view('user/calendar', $data) . view('templates/footer');
    }
    //function after clicking next button
    public function step1() {
        date_default_timezone_set('Asia/Manila');
        $data = [
            'title' => "calendar",
            'step' => 2,
            'month' => date('F'),
            'year' => date('Y'),
            'day' => date('j'),
            'event' => $this->request->getPost('selectEvent')
        ];
        return view('templates/navbar', $data) . view('user/calendar', $data) . view('templates/footer');
    }
    //function after clicking day buttons in calendar
    public function step2() {
        $data = [
            'title' => "calendar",
            'step' => 3,
            'event' => $this->request->getPost('event'),
            'month' => $this->request->getPost('month'),
            'year' => $this->request->getPost('year'),
            'day' => $this->request->getPost('day')
        ];
        return view('templates/navbar', $data) . view('user/calendar', $data) . view('templates/footer');
    }
    public function step3() {
        $data = [
            'title' => "calendar",
            'step' => 3,
            'event' => $this->request->getPost('event'),
            'day'=> $this->request->getPost('day')
        ];
        return view('templates/navbar', $data) . view('user/calendar', $data) . view('templates/footer');
    }
}
?>