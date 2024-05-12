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
        $step = session()->get('step');
        if (!isset($step) || $step == "" || $step == 1) {
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
            return redirect()->to('/reserve/index');
        }
        return view('templates/navbar', $data) . view('user/calendar', $data) . view('templates/footer');
    }
    //function after clicking next button
    public function step1()
    {
        date_default_timezone_set('Asia/Manila');
        //setting the current date as chosen date to check available times
        session()->set('month', date('n') - 1);
        session()->set('year', date('Y'));
        session()->set('day', date('d'));
        session()->set('event', $this->request->getPost('selectEvent'));
        $formated_date = date('Y-m-d');
        session()->set('date', $formated_date);
        session()->set('step', 2);
        //to check if the selected date is sunday or monday
        $dayofWeek = date_format(date_create($formated_date), 'l');
        $isClose = "false";
        if ($dayofWeek == "Sunday" || $dayofWeek == "Monday") {
            $isClose = "true";
        } else {
            //calling the funtion tocheck
            $data = $this->toCheck($formated_date);
            session()->set('count', count($data));

            session()->set('try', $this->printTime($data));

        }
        session()->set('isClose', $isClose);

        return redirect()->to('/calendar/index');
    }
    //function after clicking day buttons in calendar
    public function step2()
    {
        if ($this->request->getPost('submit') == "Back") {
            session()->set('step', session()->get('step') - 1);
            return redirect()->to('/calendar/index');
        }

        session()->set('month', $this->request->getPost('month'));
        session()->set('year', $this->request->getPost('year'));
        session()->set('day', $this->request->getPost('day'));
        session()->set('step', 2);
        $date = $this->request->getPost('year') . "-" . ($this->request->getPost('month') + 1) . "-" . $this->request->getPost('day');
        $formated_date = date('Y-m-d', strtotime($date));
        session()->set('date', $formated_date);
        //to check if the selected date is sunday or monday
        $dayofWeek = date_format(date_create($formated_date), 'l');
        $isClose = "false";
        if ($dayofWeek == "Monday") {
            if (session()->get('event') == "Mass Intention") {
                $isClose = "false";
            } else {
                $isClose = "true";
            }
        } else if ($dayofWeek == "Sunday") {
            if (session()->get('event') == "Mass Intention" || session()->get('event') == "Document Request") {
                $isClose = "false";
            } else {
                $isClose = "true";
            }
        } else {
            //calling the funtion tocheck
            $data = $this->toCheck($formated_date);
            session()->set('count', count($data));

            session()->set('try', $this->printTime($data));

        }
        session()->set('isClose', $isClose);

        return redirect()->to('/calendar/index');
    }

    public function step3()
    {
        $time = $this->request->getPost('avTime');
        session()->set('time', $time);
        session()->set('step', 3);
        return redirect()->to('/calendar/index');
    }

    //to check the avaibale time for specific date
    public function toCheck($formated_date)
    {
        $data = $this->check->getTime($formated_date);
        //session()->set('result', $data[0]['evTSt']);
        $count = count($this->check->getTime($formated_date));
        $day = date_format(date_create($formated_date), 'l');
        //session()->set('count', $count);
        if (session()->get('event') == 'Wedding') 
        {
            $ST = ['09:00:00', '10:30:00', '14:00:00', '15:30:00'];
            $ET = ['10:15:00', '11:45:00', '15:15:00', '16:45:00'];
        } 
        else if (session()->get('event') == 'Baptism') 
        {
            $ST = ['09:00:00', '10:00:00', '11:00:00', '14:00:00', '15:00:00'];
            $ET = ['09:45:00', '10:45:00', '11:45:00', '14:45:00', '15:45:00'];
        } 
        else if (session()->get('event') == 'Funeral') 
        {
            $ST = ['08:00:00', '13:00:00'];
        } 
        else if (session()->get('event') == 'Mass Intention') 
        {
            if ($day == "Sunday") 
            {
                $ST = ['06:00:00', '17:00:00', '18:10:00', '19:15:00'];
            } 
            else if ($day == "Saturday") 
            {
                $ST = ['06:00:00', '07:30:00', '09:00:00', '16:30:00', '17:00:00', '18:00:00'];
            } 
            else 
            {
                $ST = ['18:00:00'];
            }
        }
        // else if (session()->get('event') == 'Document Request')
        // {
        //     if($day == 'Sunday')
        //     {

        //     }
        // }

        $avtime = $ST;
        $break = false;
        //para alisin yung time taken or naapektuhan ng event ng iba
        if (session()->get('event') != 'Mass Intention') 
        {
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