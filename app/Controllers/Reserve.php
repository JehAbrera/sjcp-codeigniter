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
        } else if ($event == "Baptismal Certificate") {
            $view = "baptismalCert";
        } else if ($event == "Wedding Certificate") {
            $view = "weddingCert";
        } else if ($event == "Confirmation Certificate") {
            $view = "confirmationCert";
        } else if ($event == "Good Moral Certificate") {
            $view = "goodmoralCert";
        } else if ($event == "Permit and No Record") {
            $view = "permit";
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
            $refN = "SJCP" . $this->get_random_number();
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
            $gcn = "+63" . $this->request->getPost('groomcontactNum');
            $gdob = $this->request->getPost('groomdob');
            $gpob = $this->request->getPost('groompob');
            $gadd = $this->request->getPost('groomaddress');
            $gfather = $this->request->getPost('groomfathern');
            $gmother = $this->request->getPost('groommothern');
            $grelig = $this->request->getPost('groomrelig');
            $gid = $this->request->getFile('groomid')->getName();
            $gpsa = $this->request->getFile('groompsa')->getName(); 
            $gcen = $this->request->getFile('groomcenomar')->getName();
            $gbapcert = $this->request->getFile('groombapcert')->getName();
            $gconcert = $this->request->getFile('groomconcert')->getName();
            
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
            $bid = $this->request->getFile('brideid')->getName();
            $bpsa = $this->request->getFile('bridepsa')->getName(); 
            $bcen = $this->request->getFile('bridecenomar')->getName();
            $bbapcert = $this->request->getFile('bridebapcert')->getName();
            $bconcert = $this->request->getFile('brideconcert')->getName();

            //for couple
            $cml = $this->request->getFile('marriagel')->getName();

            //inserting values in allevent table
            if ($this->setres->setinAllevents($refN, $name, $email, $apDate, $apTime, $evDate, $evTSt, $evTEd, $type, $status)) {
                //getting the id to save as foreign key in wedding details
                $getlastId = $this->setres->getLastId();
                $forId = $getlastId[0]['id'];
                if ($this->setres->setinWedDet($forId, $evDate, $evTSt, $evTEd, $gln, $gfn, $gmn, $gcn, $gdob, $gpob, $gadd, $gfather, $gmother, $grelig, $gid, $gpsa, $gcen, $gbapcert, $gconcert, $bln, $bfn, $bmn, $bcn, $bdob, $bpob, $badd, $bfather, $bmother, $brelig, $bid, $bpsa, $bcen, $bbapcert, $bconcert, $cml)) {
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
            $refN = "SJCP" . $this->get_random_number();
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
            if ($this->setres->setinAllevents($refN, $name, $email, $apDate, $apTime, $evDate, $evTSt, $evTEd, $type, $status)) {
                //getting the id to save as foreign key in wedding details
                $getlastId = $this->setres->getLastId();
                $forId = $getlastId[0]['id'];
                if ($this->setres->setinBapDet($forId, $evDate, $evTSt, $evTEd, $fn, $mn, $ln, $gender, $dob, $pob, $add, $contact, $father, $fatherpob, $mother, $motherpob, $marriage, $gfather, $gfatherAdd, $gmother, $gmotherAdd)) {
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
            $refN = "SJCP" . $this->get_random_number();
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
            if ($this->setres->setinAllevents($refN, $name, $email, $apDate, $apTime, $evDate, $evTSt, $evTEd, $type, $status)) {
                //getting the id to save as foreign key in wedding details
                $getlastId = $this->setres->getLastId();
                $forId = $getlastId[0]['id'];
                if ($this->setres->setinFunDet($forId, $evDate, $evTSt, $evTEd, $fn, $mn, $ln, $gender, $dod, $age, $cod, $doi, $cemetery, $ifn, $imn, $iln, $num, $add, $sacrament, $burial)) {
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
            $refN = "SJCP" . $this->get_random_number();
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
            if ($this->setres->setinAllevents($refN, $name, $email, $apDate, $apTime, $evDate, $evTSt, $evTEd, $type, $status)) {
                //getting the id to save as foreign key in wedding details
                $getlastId = $this->setres->getLastId();
                $forId = $getlastId[0]['id'];
                if ($this->setres->setinMassDet($forId, $num, $evDate, $evTSt, $purpose, $names)) {
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
            $refN = "SJCP" . $this->get_random_number();
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
            if ($this->setres->setinAllevents($refN, $name, $email, $apDate, $apTime, $evDate, $evTSt, $evTEd, $type, $status)) {
                //getting the id to save as foreign key in wedding details
                $getlastId = $this->setres->getLastId();
                $forId = $getlastId[0]['id'];
                if ($this->setres->setinBlessdet($forId, $num, $evDate, $evTSt, $purpose, $add)) {
                    unset($_SESSION['step']);
                    return redirect()->to('/home');
                }
            }
        }
    }

    public function resDocument()
    {
        if ($this->request->getPost('submit') == "submitform") {

            //event details fo allevents table
            $refN = "SJCP" . $this->get_random_number();
            $name = "sampleDOCUMENT";
            $email = "sampleDOCUMENT@gmail.com";
            date_default_timezone_set('Asia/Manila');
            $apDate = date("Y-m-d");
            $apTime = date("H:i:s");
            $type = session()->get('event');
            $evDate = session()->get('date');
            $evTSt = "";
            $evTEd = "";
            $status = "Pending";

            //form details
            $fn = $this->request->getPost('firstName');
            $mn = $this->request->getPost('midname');
            $ln = $this->request->getPost('lastName');
            $dob = $this->request->getPost('dob');
            $fatN = $this->request->getPost('fatherName');
            $motN = $this->request->getPost('motherName');
            $num = "+63" . $this->request->getPost('contactNum');
            $purp = $this->request->getPost('purp');
            $addr = "";
            //$birthC = $this->request->getFile('psa');
            // $birthCert = $birthC->getRandomName();
            // $birthC->move(WRITEPATH . 'uploads/', $birthCert);   
            $birthCert = $this->request->getFile('psa')->getname();
            // $birthC = "";
            $brgyC = " ";
            $kawanC =" ";
            if ($type == "Good Moral Certificate") {
                $brgyC = $this->request->getFile('barangay')->getname();
                $kawanC = $this->request->getFile('kawan')->getname();
            }

            //inserting values in allevent table
            if ($this->setres->setinAllevents($refN, $name, $email, $apDate, $apTime, $evDate, $evTSt, $evTEd, $type, $status)) {
                //getting the id to save as foreign key in wedding details
                $getlastId = $this->setres->getLastId();
                $forId = $getlastId[0]['id'];

                //inserting values in allevent table
                if ($type == "Good Moral Certificate") {
                    $this->setres->setinDocudet($forId, $evDate, $type, $fn, $mn, $ln, $dob, $fatN, $motN, $num, $purp, $addr, $birthCert, $brgyC, $kawanC);
                } else {
                    $this->setres->setinDocudet($forId, $evDate, $type, $fn, $mn, $ln, $dob, $fatN, $motN, $num, $purp, $addr, $birthCert, $brgyC, $kawanC);
                }
                unset($_SESSION['step']);
                return redirect()->to('/home');
            }
        }
    }


    public function getEndtime($st, $event)
    {
        if ($event == 'Wedding') {
            $start = ['09:00:00', '10:30:00', '14:00:00', '15:30:00'];
            $end = ['10:15:00', '11:45:00', '15:15:00', '16:45:00'];
        } else if ($event == 'Baptism') {
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


    public function get_random_number()
    {

        $rand2 = rand(10000000, 99999999);
        return $rand2;
    }
}

?>