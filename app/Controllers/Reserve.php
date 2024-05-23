<?php

namespace App\Controllers;

use App\Models\SetReservation;
use App\Models\GetuserName;

class Reserve extends BaseController
{
    protected $helpers = ['form'];
    protected $setres, $getusername;
    public function __construct()
    {
        // Add objects at constructor //
        $this->setres = new SetReservation();
        $this->getusername = new GetuserName();
    }

    //to check if the user is logedin
    public function checkLogin(){
        if(!session()->get('isLogged') || !session()->has('isLogged')){
            return redirect()->to('/account/login')->with('SucMess', 'Please Login before accessing the page');
        } else {
            return redirect()->to('/calendar/index');
        }
    }

    public function index()
    {
        $data = array();
        $data = [
            'title' => "reserve",
        ];
        return view('templates/navbar', $data) . view('user/reserve', $data) . view('templates/forms/' . $this->checkEvent()) . view('templates/popup', $data) . view('templates/footer');

    }

    //gets the name in database using email
    public function setName($email){
        $result = $this->getusername->getName($email);
        $uname = $result[0]['ln'] . "," . $result[0]['fn'] . $result[0]['mn'];
        return $uname;
    }

    //to know what form file to open
    public function checkEvent()
    {
        $event = session()->get('event');
        if ($event == "Wedding") {
            $view = "wedding";
        } else if ($event == "Baptism") {
            $view = "baptism";
        } else if ($event == "Funeral Mass/Blessing") {
            $view = "funeral";
        } else if ($event == "Mass Intention") {
            $view = "massintention";
        } else if ($event == "Blessing") {
            $view = "blessing";
        } else if ($event == "Document Request"){
            $document = session()->get('document');
            if ($document == "Baptismal Certificate") {
                $view = "baptismalCert";
            } else if ($document == "Wedding Certificate") {
                $view = "weddingCert";
            } else if ($document == "Confirmation Certificate") {
                $view = "confirmationCert";
            } else if ($document == "Good Moral Certificate") {
                $view = "goodmoralCert";
            } else if ($document == "Permit and No Record") {
                $view = "permit";
            }
        }
        return $view;
    }

    //function when the back button is clicked
    public function back()
    {
        $event = session()->get('event');
        session()->set('step', session()->get('step') - 1);
        return redirect()->to('/calendar/index');
    }


    //funtion to save details per event starts here
    public function resWedding()
    {
        if ($this->request->getPost('submit') == "submitform") {

            //event details
            $refN = "SJCP" . $this->get_random_number();
            $email = session()->get('user');
            $name = $this->setName($email);
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
            $grid = $this->request->getFile('groomid');
            $grpsa = $this->request->getFile('groompsa');
            $grcen = $this->request->getFile('groomcenomar');
            $grbapcert = $this->request->getFile('groombapcert');
            $grconcert = $this->request->getFile('groomconcert');
            //to upload the files
            $gid = $this->upload($name, $grid);
            $gpsa = $this->upload($name, $grpsa);
            $gcen = $this->upload($name, $grcen);
            $gbapcert = $this->upload($name, $grbapcert);
            $gconcert = $this->upload($name, $grconcert);

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
            $brid = $this->request->getFile('brideid');
            $brpsa = $this->request->getFile('bridepsa');
            $brcen = $this->request->getFile('bridecenomar');
            $brbapcert = $this->request->getFile('bridebapcert');
            $brconcert = $this->request->getFile('brideconcert');
            //to upload the files
            $bid = $this->upload($name, $brid);
            $bpsa = $this->upload($name, $brpsa);
            $bcen = $this->upload($name, $brcen);
            $bbapcert = $this->upload($name, $brbapcert);
            $bconcert = $this->upload($name, $brconcert);

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
            $email = session()->get('user');
            $name = $this->setName($email);
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
            $psa = $this->request->getFile('psa');
            $mc = $this->request->getFile('marriage_contract');
            $psacert = $this->upload($name, $psa);
            $mccert = $this->upload($name, $mc);

            //inserting values in allevent table
            if ($this->setres->setinAllevents($refN, $name, $email, $apDate, $apTime, $evDate, $evTSt, $evTEd, $type, $status)) {
                //getting the id to save as foreign key in wedding details
                $getlastId = $this->setres->getLastId();
                $forId = $getlastId[0]['id'];
                if ($this->setres->setinBapDet($forId, $evDate, $evTSt, $evTEd, $fn, $mn, $ln, $gender, $dob, $pob, $add, $contact, $father, $fatherpob, $mother, $motherpob, $marriage, $gfather, $gfatherAdd, $gmother, $gmotherAdd, $psacert, $mccert)) {
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
            $email = session()->get('user');
            $name = $this->setName($email);
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
            $dcert = $this->request->getFile('deathcert');
            $deathcert = $this->upload($name, $dcert);

            //inserting values in allevent table
            if ($this->setres->setinAllevents($refN, $name, $email, $apDate, $apTime, $evDate, $evTSt, $evTEd, $type, $status)) {
                //getting the id to save as foreign key in wedding details
                $getlastId = $this->setres->getLastId();
                $forId = $getlastId[0]['id'];
                if ($this->setres->setinFunDet($forId, $evDate, $evTSt, $evTEd, $fn, $mn, $ln, $gender, $dod, $age, $cod, $doi, $cemetery, $ifn, $imn, $iln, $num, $add, $sacrament, $burial, $deathcert)) {
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
            $email = session()->get('user');
            $name = $this->setName($email);
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
                    unset($_SESSION['message']);
                    unset($_SESSION['isClose']);
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
            $email = session()->get('user');
            $name = $this->setName($email);
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
            $email = session()->get('user');
            $name = $this->setName($email);
            date_default_timezone_set('Asia/Manila');
            $apDate = date("Y-m-d");
            $apTime = date("H:i:s");
            $type = session()->get('event');
            $evDate = session()->get('date');
            $evTSt = "";
            $evTEd = "";
            $status = "Pending";

            //form details
            $docu = session()->get('document');
            $fn = $this->request->getPost('firstName');
            $mn = $this->request->getPost('midname');
            $ln = $this->request->getPost('lastName');
            $dob = $this->request->getPost('dob');
            $fatN = $this->request->getPost('fatherName');
            $motN = $this->request->getPost('motherName');
            $num = "+63" . $this->request->getPost('contactNum');
            $purp = $this->request->getPost('purp');
            $addr = "";
            $birthC = $this->request->getFile('psa');
            $birthCert = $this->upload($name, $birthC);
            $brgyCert = " ";
            $kawanCert = " ";
            if ($docu == "Good Moral Certificate") {
                $brgyC = $this->request->getFile('barangay');
                $brgyCert = $this->upload($name, $brgyC);
                $kawanC = $this->request->getFile('kawan');
                $kawanCert = $this->upload($name, $kawanC);
            }

            //inserting values in allevent table
            if ($this->setres->setinAllevents($refN, $name, $email, $apDate, $apTime, $evDate, $evTSt, $evTEd, $type, $status)) {
                //getting the id to save as foreign key in document details
                $getlastId = $this->setres->getLastId();
                $forId = $getlastId[0]['id'];

                //inserting values in detdocu table
                $this->setres->setinDocudet($forId, $evDate, $docu, $fn, $mn, $ln, $dob, $fatN, $motN, $num, $purp, $addr, $birthCert, $brgyCert, $kawanCert);
                unset($_SESSION['step']);
                return redirect()->to('/myreservation/status/Pending')->with('SucMess', 'Your request has been submitted.');
            }
        }
    }

    //function to upload the file in local directory
    public function upload($name, $file)
    {
        if ($this->validateUpload($file)) {
            $filename = $file->getname();
            // Define the directory to save the file
            $uploadPath = 'images/user/' . $name . '/';

            // Move the file to the upload directory
            $file->move($uploadPath);

            return $uploadPath . $filename;
        }
    }

    //function to validate the file type
    public function validateUpload($file)
    {
        $filetype = $file->getClientExtension();
        $types = ["jpg", "jpeg", "png"];

        for ($a = 0; $a < count($types); $a++) {
            if ($filetype == $types[$a]) {
                return true;
            }
        }
        return false;
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