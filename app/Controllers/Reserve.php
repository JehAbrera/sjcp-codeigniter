<?php

namespace App\Controllers;

use App\Models\SetReservation;

class Reserve extends BaseController
{
    protected $helpers = ['form'];
    protected $setres;
    public function __construct()
    {
        // Add objects at constructor //
        $this->setres = new SetReservation();
    }

    public function index()
    {
        $data = array();
        $data = [
            'title' => "reserve",
        ];
        return view('templates/navbar', $data) . view('user/reserve', $data) . view('templates/forms/' . $this->checkEvent()) . view('templates/popup', $data) . view('templates/footer');

    }

    public function checkEvent()
    {
        $event = session()->get('event');
        if ($event == "Wedding") {
            $view = "wedding";
        } else if ($event == "Baptism") {
            $view = "baptism";
        } else if ($event == "Funeral") {
            $view = "funeral";
        } else if ($event == "Mass Intention") {
            $view = "massintention";
        } else if ($event == "Blessing") {
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

    public function resWedding()
    {
        if ($this->request->getPost('submit') == "submitform") {

            //event details
            $refN = "SJCP". $this->get_random_number();
            $name = "sampleWEDDING";
            $email = "sampleWEDDING@gmail.com";
            date_default_timezone_set('Asia/Manila');
            $apDate = date("Y-m-d");
            $apTime = date("H:i:s");
            $type = session()->get('event');
            $evDate = session()->get('date');
            $evTSt = session()->get('time');
            $evTEd = $this->getEndtime($evTSt, $type);
            $status = "Pending";
            
            //groom
            $gln = $this->request->getPost('groomln');
            $gfn = $this->request->getPost('groomfn');
            $gmn = $this->request->getPost('groommn');
            $gcn = "+63". $this->request->getPost('groomcontactNum');
            $gdob = $this->request->getPost('groomdob');
            $gpob = $this->request->getPost('groompob');
            $gadd = $this->request->getPost('groomaddress');
            $gfather = $this->request->getPost('groomfathern');
            $gmother = $this->request->getPost('groommothern');
            $grelig = $this->request->getPost('groomrelig');
            // $gid = $this->request->getPost('groomid');
            // $gpsa = $this->request->getPost('groompsa'); 
            // $gcen = $this->request->getPost('groomcenomar');
            // $gbapcert = $this->request->getPost('groombapcert');
            // $gconcert = $this->request->getPost('groomconcert');

            //bride
            $bln = $this->request->getPost('brideln');
            $bfn = $this->request->getPost('bridefn');
            $bmn = $this->request->getPost('bridemn');
            $bcn = "+63" . $this->request->getPost('bridecontactNum');
            $bdob = $this->request->getPost('bridedob');
            $bpob = $this->request->getPost('bridepob');
            $badd = $this->request->getPost('brideaddress');
            $bfather = $this->request->getPost('bridefathern');
            $bmother = $this->request->getPost('bridemothern');
            $brelig = $this->request->getPost('briderelig');
            // $bid = $this->request->getPost('brideid');
            // $bpsa = $this->request->getPost('bridepsa'); 
            // $bcen = $this->request->getPost('bridecenomar');
            // $bbapcert = $this->request->getPost('bridebapcert');
            // $bconcert = $this->request->getPost('brideconcert');

            // //for couple
            // $cml = $this->request->getPost('marriagel');

             //inserting values in allevent table
            if ($this->setres->setinAllevents($refN, $name, $email, $apDate, $apTime, $evDate, $evTSt, $evTEd, $type, $status)) 
            {
                //getting the id to save as foreign key in wedding details
                $getlastId = $this->setres->getLastId();
                $forId = $getlastId[0]['id'];
                if($this->setres->setinWedDet($forId, $evDate, $evTSt, $evTEd, $gln, $gfn, $gmn, $gcn, $gdob, $gpob, $gadd, $gfather, $gmother, $grelig, $bln, $bfn, $bmn, $bcn, $bdob, $bpob, $badd, $bfather, $bmother, $brelig))
                {
                    unset($_SESSION['step']);
                    return redirect()->to('/home');
                }
            }
        }
    }

    public function resBaptism()
    {
        if ($this->request->getPost('submit') == "submitform") {

            //event details fo allevents table
            $refN = "SJCP". $this->get_random_number();
            $name = "sampleBAPTISM";
            $email = "sampleBSPTISM@gmail.com";
            date_default_timezone_set('Asia/Manila');
            $apDate = date("Y-m-d");
            $apTime = date("H:i:s");
            $type = session()->get('event');
            $evDate = session()->get('date');
            $evTSt = session()->get('time');
            $evTEd = $this->getEndtime($evTSt, $type);
            $status = "Pending";
            
            //form details
            $ln = $this->request->getPost('lastName');
            $fn = $this->request->getPost('firstName');
            $mn = $this->request->getPost('midname');
            $gender = $this->request->getPost('gender');
            $dob = $this->request->getPost('dob');
            $pob = $this->request->getPost('pob');
            $add = $this->request->getPost('address');
            $father = $this->request->getPost('fatherName');
            $fatherpob = $this->request->getPost('fatherPob');
            $mother = $this->request->getPost('motherName');
            $motherpob = $this->request->getPost('motherPob');
            $contact = "+63" . $this->request->getPost('contactNum');
            $marriage = $this->request->getPost('marriage_type');
            $gfather = $this->request->getPost('godfatherName');
            $gfatherAdd = $this->request->getPost('godfatherAddress');
            $gmother = $this->request->getPost('godmotherName');
            $gmotherAdd = $this->request->getPost('godmotherAddress');
            // $psa = $this->request->getPost('psa'); 
            // $mc = $this->request->getPost('marriage_contract');

             //inserting values in allevent table
            if ($this->setres->setinAllevents($refN, $name, $email, $apDate, $apTime, $evDate, $evTSt, $evTEd, $type, $status)) 
            {
                //getting the id to save as foreign key in wedding details
                $getlastId = $this->setres->getLastId();
                $forId = $getlastId[0]['id'];
                if($this->setres->setinBapDet($forId, $evDate, $evTSt, $evTEd, $fn, $mn, $ln, $gender, $dob, $pob, $add, $contact, $father, $fatherpob, $mother, $motherpob, $marriage, $gfather, $gfatherAdd, $gmother, $gmotherAdd))
                {
                    unset($_SESSION['step']);
                    return redirect()->to('/home');
                }
            }
        }
    }

    public function resFuneral()
    {
        if ($this->request->getPost('submit') == "submitform") {

            //event details fo allevents table
            $refN = "SJCP". $this->get_random_number();
            $name = "sampleFUNERAL";
            $email = "sampleFUNERAL@gmail.com";
            date_default_timezone_set('Asia/Manila');
            $apDate = date("Y-m-d");
            $apTime = date("H:i:s");
            $type = session()->get('event');
            $evDate = session()->get('date');
            $evTSt = session()->get('time');
            $evTEd = "";
            $status = "Pending";
            
            //form details
            $ln = $this->request->getPost('lastName');
            $fn = $this->request->getPost('firstName');
            $mn = $this->request->getPost('midname');
            $gender = $this->request->getPost('gender');
            $dod = $this->request->getPost('dod');
            $age = $this->request->getPost('age');
            $cod = $this->request->getPost('cod');
            $doi = $this->request->getPost('doi');
            $cemetery = $this->request->getPost('cemetery');
            $ifn = $this->request->getPost('inffn');
            $imn = $this->request->getPost('infmn');
            $iln = $this->request->getPost('infln');
            $num = "+63" . $this->request->getPost('contactNum');
            $add = $this->request->getPost('address');
            $sacrament = $this->request->getPost('sacrament');
            $burial = $this->request->getPost('curt');
            // $dcert = $this->request->getPost('deathcert');
            
             //inserting values in allevent table
            if ($this->setres->setinAllevents($refN, $name, $email, $apDate, $apTime, $evDate, $evTSt, $evTEd, $type, $status)) 
            {
                //getting the id to save as foreign key in wedding details
                $getlastId = $this->setres->getLastId();
                $forId = $getlastId[0]['id'];
                if($this->setres->setinFunDet($forId, $evDate, $evTSt, $evTEd, $fn, $mn, $ln, $gender, $dod, $age, $cod, $doi, $cemetery, $ifn, $imn, $iln, $num, $add, $sacrament, $burial))
                {
                    unset($_SESSION['step']);
                    return redirect()->to('/home');
                }
            }
        }
    }

    public function resMassintention()
    {
        if ($this->request->getPost('submit') == "submitform") {

            //event details fo allevents table
            $refN = "SJCP". $this->get_random_number();
            $name = "sampleMASSINT";
            $email = "sampleMASSINT@gmail.com";
            date_default_timezone_set('Asia/Manila');
            $apDate = date("Y-m-d");
            $apTime = date("H:i:s");
            $type = session()->get('event');
            $evDate = session()->get('date');
            $evTSt = session()->get('time');
            $evTEd = "";
            $status = "Pending";
            
            //form details
            $num = "+63" . $this->request->getPost('contactNum');
            $purpose = $this->request->getPost('mass');
            $names = $this->request->getPost('names');
            
             //inserting values in allevent table
            if ($this->setres->setinAllevents($refN, $name, $email, $apDate, $apTime, $evDate, $evTSt, $evTEd, $type, $status)) 
            {
                //getting the id to save as foreign key in wedding details
                $getlastId = $this->setres->getLastId();
                $forId = $getlastId[0]['id'];
                if($this->setres->setinMassDet($forId, $num, $evDate, $evTSt, $purpose, $names))
                {
                    unset($_SESSION['step']);
                    return redirect()->to('/home');
                }
            }
        }
    }

    public function resBlessing()
    {
        if ($this->request->getPost('submit') == "submitform") {

            //event details fo allevents table
            $refN = "SJCP". $this->get_random_number();
            $name = "sampleBLESSING";
            $email = "sampleBLESSING@gmail.com";
            date_default_timezone_set('Asia/Manila');
            $apDate = date("Y-m-d");
            $apTime = date("H:i:s");
            $type = session()->get('event');
            $evDate = session()->get('date');
            $evTSt = session()->get('time');
            $evTEd = "";
            $status = "Pending";
            
            //form details
            $num = "+63" . $this->request->getPost('contactNum');
            $purpose = $this->request->getPost('bless');
            $add = $this->request->getPost('address');
            
             //inserting values in allevent table
            if ($this->setres->setinAllevents($refN, $name, $email, $apDate, $apTime, $evDate, $evTSt, $evTEd, $type, $status)) 
            {
                //getting the id to save as foreign key in wedding details
                $getlastId = $this->setres->getLastId();
                $forId = $getlastId[0]['id'];
                if($this->setres->setinBlessdet($forId, $num, $evDate, $evTSt, $purpose, $add))
                {
                    unset($_SESSION['step']);
                    return redirect()->to('/home');
                }
            }
        }
    }

    public function getEndtime($st, $event)
    {
        if ($event == 'Wedding') 
        {
            $start = ['09:00:00', '10:30:00', '14:00:00', '15:30:00'];
            $end = ['10:15:00', '11:45:00', '15:15:00', '16:45:00'];
        } 
        else if ($event == 'Baptism') 
        {
            $start = ['09:00:00', '10:00:00', '11:00:00', '14:00:00', '15:00:00'];
            $end = ['09:45:00', '10:45:00', '11:45:00', '14:45:00', '15:45:00'];
        } 
        
        for ($y = 0; $y < count($start); $y++) {
            if (strtotime($st) == strtotime($start[$y])) {
                $et = $end[$y];
            }
        }
        return $et;
    }

    public function get_random_number(){

        $rand2 = rand(10000000, 99999999);
        return $rand2;
    }
}

?>