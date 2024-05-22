<?php

namespace App\Controllers;

use App\Models\CheckAvailableTime;

class Calendar extends BaseController
{
    protected $helpers = ['form'];
    protected $check;

    public function __construct()
    {
        $this->check = new CheckAvailableTime();
    }
    public function index()
    {
        $data = array();
        //session()->set('step', '1');
        $step = session()->get('step');
        if (!isset($step) || $step == "" || $step == 1) {
            $data = [
                'title' => "Calendar",
                'step' => 1
            ];
        } elseif ($step == 2) {
            $data = [
                'title' => "Calendar",
                'step' => session()->get('step')
            ];
        } elseif ($step == 3) {
            $data = [
                'title' => "Calendar",
                'step' => session()->get('step')
            ];
            return redirect()->to('/reserve/index');
        }
        return view('templates/navbar', $data) . view('user/calendar', $data) . view('templates/footer');
    }
    //function after clicking next button
    public function step1()
    {
        if ($this->request->getPost('selectEvent') == "Document Request") {
            session()->set('document', $this->request->getPost('selectDocument'));
        }
        session()->set('event', $this->request->getPost('selectEvent'));
        session()->set('step', 2);
        $this->step2();
        return redirect()->to('/calendar/index');
    }

    public function step2()
    {
        $event = session()->get('event');
        date_default_timezone_set('Asia/Manila');
        //setting the current date as chosen date to check available times
        session()->set('month', date('n') - 1);
        session()->set('year', date('Y'));
        session()->set('day', date('d'));
        $formated_date = date('Y-m-d');
        session()->set('date', $formated_date);
        //to check if the selected date is sunday or monday
        $dayofWeek = date_format(date_create($formated_date), 'l');
        $isClose = "false";
        if ($dayofWeek == "Monday") {
            if (session()->get('event') == "Mass Intention") {
                $isClose = "false";
            } else {
                $isClose = "true";
                $message = "Cannot reserve for this day";
            }
        } else if ($dayofWeek == "Sunday") {
            if (session()->get('event') == "Mass Intention" || session()->get('event') == "Document Request" || session()->get('event') == "Blessing") {
                $isClose = "false";
                $message = "1:30 PM - 5:00 PM";
            } else {
                $isClose = "true";
            }
        } else {
            if (session()->get('event') == "Wedding" || session()->get('event') == "Baptism" || session()->get('event') == "Funeral" || session()->get('event') == "Mass Intention") {
                //calling the funtion tocheck
                $data = $this->toCheck($formated_date);
                session()->set('count', count($data));

                session()->set('try', $this->printTime($data));
                $message = "sa calendar yung problema";
            } else {
                $message = "8:00 AM - 11:30 AM and 1:30 PM - 5:00 PM";
            }

        }
        //session()->set('message', $message);
        session()->set('isClose', $isClose);
        return redirect()->to('/calendar/index');
    }

    //function after clicking day buttons in calendar
    public function step3()
    {

        session()->set('month', $this->request->getPost('month'));
        session()->set('year', $this->request->getPost('year'));
        session()->set('day', $this->request->getPost('day'));
        $date = $this->request->getPost('year') . "-" . ($this->request->getPost('month') + 1) . "-" . $this->request->getPost('day');
        $formated_date = date('Y-m-d', strtotime($date));
        session()->set('date', $formated_date);
        //to check if the selected date is sunday or monday
        $dayofWeek = date_format(date_create($formated_date), 'l');
        $isClose = "false";
        $event = session()->get('event');
        if ($dayofWeek == "Monday") {
            if ($event == "Mass Intention") {
                $isClose = "false";
            } else {
                $isClose = "true";
                $message = "Cannot reserve for this day";
                session()->set('message', $message);
            }
        } else if ($dayofWeek == "Sunday") {
            if ($event == "Wedding Certificate" || $event == "Baptismal Certificate" || $event == "Confirmation Certificate" || $event == "Good Moral Certificate" || $event == "Banns and Permit" || $event == "Permit and No record") {
                $isClose = "false";
                $message = "8:00 AM - 12:00 NN";
                session()->set('message', $message);
            } else {
                $isClose = "true";
            }
        } else {
            if ($event == "Wedding" || $event == "Baptism" || $event == "Funeral" || $event == "Mass Intention") {
                //calling the funtion tocheck
                $data = $this->toCheck($formated_date);
                session()->set('count', count($data));
                session()->set('try', $this->printTime($data));
            } else {
                $message = "8:00 AM - 11:30 AM and 1:30 PM - 5:00 PM";
                session()->set('message', $message);
            }

        }
        session()->set('isClose', $isClose);

        return redirect()->to('/calendar/index');
    }

    public function step4()
    {
        $time = $this->request->getPost('avTime');
        session()->set('time', $time);
        session()->set('step', 3);
        
        if(!session()->get('isLogged') || !session()->has('isLogged')){
            return redirect()->to('/account/login')->with('SucMess', 'Please Login before accessing the page');
        } else {
            return redirect()->to('/calendar/index');
        }
    }

    //to check the avaibale time for specific date
    public function toCheck($formated_date)
    {
        $data = $this->check->getTime($formated_date);
        //session()->set('result', $data[0]['evTSt']);
        $count = count($this->check->getTime($formated_date));
        $day = date_format(date_create($formated_date), 'l');
        //session()->set('count', $count);
        if (session()->get('event') == 'Wedding') {
            $ST = ['09:00:00', '10:30:00', '14:00:00', '15:30:00'];
            $ET = ['10:15:00', '11:45:00', '15:15:00', '16:45:00'];
        } else if (session()->get('event') == 'Baptism') {
            $ST = ['09:00:00', '10:00:00', '11:00:00', '14:00:00', '15:00:00'];
            $ET = ['09:45:00', '10:45:00', '11:45:00', '14:45:00', '15:45:00'];
        } else if (session()->get('event') == 'Funeral') {
            $ST = ['08:00:00', '13:00:00'];
        } else if (session()->get('event') == 'Mass Intention') {
            if ($day == "Sunday") {
                $ST = ['06:00:00', '17:00:00', '18:10:00', '19:15:00'];
            } else if ($day == "Saturday") {
                $ST = ['06:00:00', '07:30:00', '09:00:00', '16:30:00', '17:00:00', '18:00:00'];
            } else {
                $ST = ['18:00:00'];
            }
        }


        $avtime = $ST;
        $break = false;
        //para alisin yung time taken or naapektuhan ng event ng iba
        if (session()->get('event') != 'Mass Intention' && session()->get('event') != 'Funeral') {
            for ($x = 0; $x < count($ST); $x++) {
                for ($y = 0; $y < $count; $y++) {
                    if (strtotime($ST[$x]) == strtotime($data[$y]['evTSt'])) { //kapag magkaparehas yung start time
                        unset($avtime[$x]);
                        break;
                    } else if (strtotime($ST[$x]) == strtotime($data[$y]['evTEd'])) { //kapag magkaparehas yung start time
                        unset($avtime[$x]);
                        break;
                    } else if (strtotime($ST[$x]) > strtotime($data[$y]['evTSt']) && strtotime($ST[$x]) < strtotime($data[$y]['evTEd'])) {
                        unset($avtime[$x]);
                        break;
                    } else if (strtotime($ET[$x]) > strtotime($data[$y]['evTSt']) && strtotime($ET[$x]) < strtotime($data[$y]['evTEd'])) {
                        unset($avtime[$x]);
                        break;
                    } else {

                    }
                }
            }
        }
        return $avtime;
    }

    public function back()
    {
        $event = session()->get('event');
        if ($this->request->getPost('submit') == "Back") {
            session()->set('step', session()->get('step') - 1);
            return redirect()->to('/calendar/index');
        }
    }

    public function printTime($data)
    {
        $result = "";
        foreach ($data as $row) {
            $result .= $row . ",";
        }
        return $result;
    }

}
?>