<?php 

namespace App\Controllers;

class Calendar extends BaseController{
    protected $helpers = ['form'];
    
    public function index() {
        // $data = [
        //     'title' => "calendar",
        //     'step' => 1
        // ];
        // return view('templates/navbar', $data) . view('user/calendar', $data) . view('templates/footer');
        $step = session()->get('step');
        if ($step === null || $step == 1) {
            $data = [
                'title' => "calendar",
                'step' => 1
            ];
        } elseif ($step == 2) {
            $data = [
                'title' => "calendar",
                'step' => session()->get('step')
            ];
        } elseif ($step == 3) {
            $data = [
                'title' => "calendar",
                'step' => session()->get('step')
            ];
        }
        return view('templates/navbar', $data) . view('user/calendar', $data) . view('templates/footer');
    }
    //function after clicking next button
    public function step1() {
        date_default_timezone_set('Asia/Manila');
        // $data = [
        //     'title' => "calendar",
        //     'step' => 2,
        //     'month' => date('F'),
        //     'year' => date('Y'),
        //     'day' => date('j'), 
        //     'event' => $this->request->getPost('selectEvent')
        // ];
        // return view('templates/navbar', $data) . view('user/calendar', $data) . view('templates/footer');
        session()->set('month', date('n')-1);
        session()->set('year', date('Y'));
        session()->set('day', date('j'));
        session()->set('event', $this->request->getPost('selectEvent'));

        session()->set('step', 2);
        return redirect()->to('/calendar/index');
    }
    //function after clicking day buttons in calendar
    public function step2() {
        if ($this->request->getPost('submit') == "Back") {
            session()->set('step', session()->get('step') - 1);
            return redirect()->to('/calendar/index');
        }

        session()->set('month', $this->request->getPost('month'));
        session()->set('year', $this->request->getPost('year'));
        session()->set('day', $this->request->getPost('day'));
        session()->set('step', 2);
        return redirect()->to('/calendar/index');
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