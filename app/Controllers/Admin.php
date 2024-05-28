<?php
// Redirect admin controller request in this page
namespace App\Controllers;

use App\Models\FaqsCont;
use App\Models\ServicesCont;
use App\Models\AboutusCont;
use App\Models\Employee;
use CodeIgniter\Exceptions\PageNotFoundException;
use App\Models\Count;

use App\Libraries\EmailSender;
use App\Models\Announcement;
use CodeIgniter\I18n\Time;
use CodeIgniter\Database\Exceptions\DatabaseException;

class Admin extends BaseController
{
    protected $count, $pager, $records, $getres, $announce;
    protected $updateres, $email, $faqs, $services, $about, $employee;

    public function __construct()
    {
        $this->records = new \App\Models\Records();
        $this->getres = new \App\Models\GetReservation();
        $this->updateres = new \App\Models\UpdateReservation();
        $this->email = new EmailSender();
        $this->count = new Count();
        $this->pager = \Config\Services::pager();
        $this->announce = new Announcement();
        $this->faqs = new FaqsCont();
        $this->services = new ServicesCont();
        $this->about = new AboutusCont();
        $this->employee = new Employee();
    }

    public function admin($page)
    {
        if (!is_file(APPPATH . 'Views/admin/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            throw new PageNotFoundException($page);
        }
        $data = [
            'title' => ucfirst($page),
        ];
        $addInf = [];
        if ($page == 'login') {
            return view('admin/' . $page, $data);
        }
        // Set data values for dashboard //
        if ($page == 'dashboard') {
            // Call queries to retrieve data for display //
            $addInf = [
                'all' => $this->count->getCount('allevents', ['0000-00-00', date('Y-m-d')]),
                'week' => $this->count->getCount('allevents', [date('Y-m-d', strtotime('-7 days')), date('Y-m-d')]),
                'today' => $this->count->getCount('allevents', [date('Y-m-d'), date('Y-m-d')]),
                'bapM' => $this->count->getCount('recbap', ['gender', 'Male']),
                'bapF' => $this->count->getCount('recbap', ['gender', 'Female']),
                'conM' => $this->count->getCount('recconf', ['gender', 'Male']),
                'conF' => $this->count->getCount('recconf', ['gender', 'Male']),
                'wedS' => $this->count->getCount('recwed', [true]),
                'wedD' => $this->count->getCount('recwed', [false]),
                'current' => $this->count->getCurrent(),
                'upcoming' => $this->count->getUpcoming(),
            ];
        }
        if ($page == 'announcements') {
            $addInf = [
                'announcements' => $this->records->getAnnouncements($page)->paginate(10)
            ];
        }

        if ($page == 'faqs') {
            $addInf = [
                'faqs' => $this->records->getAnnouncements($page)->paginate(10)
            ];
        }

        if ($page == 'services') {
            $addInf = [
                'services' => $this->records->getAnnouncements($page)->paginate(10)
            ];
        }

        if ($page == 'about') {
            $addInf = [
                'about' => $this->records->getAnnouncements($page)->paginate(10)
            ];
        }

        $data = array_merge($data, $addInf);
        return view('templates/navadmin', $data) . view('admin/' . $page, $data);
    }

    // Functions for Records Page //
    public function viewRecords($value, $extra = null)
    {
        if (!empty($extra)) {
            $keyword = trim($extra);

            // Split the keyword into individual components (by spaces)
            $keywords = explode(' ', $keyword);

            // Fetch Name value
            $recs = $this->records->queryName($value, $keywords)->paginate(20);
        } else {
            // Fetch all data
            $recs = $this->records->queryAll($value)->paginate(20);
        }
        //$paginated = $recs->paginate(25, 'default');
        $data = [
            'title' => 'Records',
            'type' => $value,
            'records' => $recs,
            'pager' => $this->records->pager,
        ];
        return view('templates/navadmin', $data) . view('admin/records', $data);
    }

    public function getName($value)
    {
        $name = $this->request->getPost('name');

        return redirect()->to('/admin/records/' . $value . '/' . $name);
    }

    // Fetch add or edit record request 
    // Format strings before saving
    public function addRec($type)
    {
        switch ($type) {
            case 'Baptism':
                $record = new \App\Models\Records\Baptism();

                $values = [
                    'date' => $this->request->getPost('bapD'),
                    'time' => $this->request->getPost('bapT'),
                    'fn' => ucwords(strval($this->request->getPost('fn'))),
                    'mn' => ucwords(strval($this->request->getPost('mn'))),
                    'ln' => ucwords(strval($this->request->getPost('ln'))),
                    'gender' => ucwords(strval($this->request->getPost('gender'))),
                    'dob' => $this->request->getPost('bday'),
                    'pob' => ucfirst(strval($this->request->getPost('pob'))),
                    'addr' => ucfirst(strval($this->request->getPost('addr'))),
                    'num' => "+63" . $this->request->getPost('num'),
                    'fatN' => ucwords(strval($this->request->getPost('fatN'))),
                    'fatPob' => ucfirst(strval($this->request->getPost('fatPob'))),
                    'motN' => ucwords(strval($this->request->getPost('motN'))),
                    'motPob' => ucfirst(strval($this->request->getPost('motPob'))),
                    'mrgTp' => $this->request->getPost('mtype'),
                    'gFatN' => ucwords(strval($this->request->getPost('gfN'))),
                    'gFatAd' => ucfirst(strval($this->request->getPost('gfAdd'))),
                    'gMotN' => ucwords(strval($this->request->getPost('gmN'))),
                    'gMotAd' => ucfirst(strval($this->request->getPost('gmAdd'))),
                ];
                break;

            case 'Confirmation':
                $dob = strval($this->request->getPost('bday'));
                $bday = Time::parse($dob);
                $now = Time::now();
                $age = $bday->difference($now)->getYears();

                $values = [
                    'date' => strval($this->request->getPost('date')),
                    'time' => strval($this->request->getPost('time')),
                    'fn' => ucwords(strval($this->request->getPost('fn'))),
                    'mn' => ucwords(strval($this->request->getPost('mn'))),
                    'ln' => ucwords(strval($this->request->getPost('ln'))),
                    'gender' => ucwords(strval($this->request->getPost('gender'))),
                    'dob' => $this->request->getPost('bday'),
                    'age' => $age,
                    'pob' => ucfirst(strval($this->request->getPost('pob'))),
                    'plcBap' => ucfirst(strval($this->request->getPost('plcBap'))),
                    'datBap' => strval($this->request->getPost('datBap')),
                    'fatN' => ucwords(strval($this->request->getPost('fatN'))),
                    'motN' => ucwords(strval($this->request->getPost('motN'))),
                    'num' => "+63" . strval($this->request->getPost('num')),
                    'addr' => ucfirst(strval($this->request->getPost('addr'))),
                    'gFatN' => ucwords(strval($this->request->getPost('gFatN'))),
                    'gMotN' => ucwords(strval($this->request->getPost('gMotN'))),
                ];
                break;

            case 'Wedding':
                # code...
                break;

            case 'Funeral Mass':
                # code...
                break;
        }
        if ($record->save($values)) {
            return redirect()->to('/admin/records/' . $type)->with('recSuc', 'Record successfully added!');
        } else {
            return redirect()->to('/admin/records/' . $type)->with('recErr', 'Failed to add record!');
        }
    }
    public function editRec($type)
    {
        switch ($type) {
            case 'Baptism':
                $record = new \App\Models\Records\Baptism();

                $id = (int) $this->request->getPost('id');
                $values = [
                    'date' => strval($this->request->getPost('date')),
                    'time' => $this->request->getPost('time'),
                    'fn' => ucwords(strval($this->request->getPost('fn'))),
                    'mn' => ucwords(strval($this->request->getPost('mn'))),
                    'ln' => ucwords(strval($this->request->getPost('ln'))),
                    'gender' => ucwords(strval($this->request->getPost('gender'))),
                    'dob' => $this->request->getPost('bday'),
                    'pob' => ucfirst(strval($this->request->getPost('pob'))),
                    'addr' => ucfirst(strval($this->request->getPost('addr'))),
                    'num' => "+63" . strval($this->request->getPost('num')),
                    'fatN' => ucwords(strval($this->request->getPost('fatN'))),
                    'fatPob' => ucfirst(strval($this->request->getPost('fatPob'))),
                    'motN' => ucwords(strval($this->request->getPost('motN'))),
                    'motPob' => ucfirst(strval($this->request->getPost('motPob'))),
                    'mrgTp' => strval($this->request->getPost('mtype')),
                    'gFatN' => ucwords(strval($this->request->getPost('gfN'))),
                    'gFatAd' => ucfirst(strval($this->request->getPost('gfAdd'))),
                    'gMotN' => ucwords(strval($this->request->getPost('gmN'))),
                    'gMotAd' => ucfirst(strval($this->request->getPost('gmAdd'))),
                ];
                break;

            case 'Confirmation':
                $record = new \App\Models\Records\Confirmation();

                $dob = strval($this->request->getPost('bday'));
                $bday = Time::parse($dob);
                $now = Time::now();
                $age = $bday->difference($now)->getYears();

                $id = (int) $this->request->getPost('id');

                $values = [
                    'date' => strval($this->request->getPost('date')),
                    'time' => strval($this->request->getPost('time')),
                    'fn' => ucwords(strval($this->request->getPost('fn'))),
                    'mn' => ucwords(strval($this->request->getPost('mn'))),
                    'ln' => ucwords(strval($this->request->getPost('ln'))),
                    'gender' => ucwords(strval($this->request->getPost('gender'))),
                    'dob' => $this->request->getPost('bday'),
                    'age' => $age,
                    'pob' => ucfirst(strval($this->request->getPost('pob'))),
                    'plcBap' => ucfirst(strval($this->request->getPost('plcBap'))),
                    'datBap' => strval($this->request->getPost('datBap')),
                    'fatN' => ucwords(strval($this->request->getPost('fatN'))),
                    'motN' => ucwords(strval($this->request->getPost('motN'))),
                    'num' => "+63" . strval($this->request->getPost('num')),
                    'addr' => ucfirst(strval($this->request->getPost('addr'))),
                    'gFatN' => ucwords(strval($this->request->getPost('gFatN'))),
                    'gMotN' => ucwords(strval($this->request->getPost('gMotN'))),
                ];
                break;

            case 'Wedding':
                # code...
                break;

            case 'Funeral Mass':
                # code...
                break;
        }
        if ($record->update($id, $values)) {
            return redirect()->to('/admin/records/' . $type)->with('recSuc', 'Record successfully updated!');
        } else {
            return redirect()->to('/admin/records/' . $type)->with('recErr', 'Failed to update record!');
        }
    }


    //functions for admin reservation page
    public function getStatus($status, $order)
    {
        $reserv = $this->getres->adminQueryAll($status, $order)->paginate(50);
        foreach ($reserv as &$res) {
            $add = [];
            $add = [
                'det' => $this->viewDetails($res['type'], $res['id'])
            ];
            $res = array_merge($res, $add);
        }
        $data = [
            'title' => 'Reservation',
            'type' => $status,
            'reservations' => $reserv,
            'order' => $order,
            'pager' => $this->getres->pager,
        ];

        return view('templates/navadmin', $data) . view('admin/reservation', $data);
    }

    public function updateReserve()
    {
        $id = $this->request->getPost('id');
        $email = $this->request->getPost('email');
        $refn = $this->request->getPost('refn');
        if ($this->request->getPost('submit') == 'Approve') {
            $status = "Accepted";
            if ($this->updateres->acceptReserv($id, $status)) {
                //if the query is successfull

                // Call email sender library - declare purpose and target as parameters //
                $this->email->send('updateStat', 'Status', $email, $refn, 'Accepted');
                return redirect()->to('/admin/reservations/status/Accepted/ASC')->with('SucMess', 'Reservation successfully accepted!');
            }
        } else if ($this->request->getPost('submit') == 'Decline') {
            $reason = $this->request->getPost('reason');
            $status = "Declined";
            if ($reason == "Others") {
                $reason = $this->request->getPost('otherinput');
            }
            if ($this->updateres->updateReserv($id, $reason, $status)) {
                //if the query is successfull

                // Call email sender library - declare purpose and target as parameters //
                $this->email->send('updateStat', 'Status', $email, $refn, 'Declined', $reason);
                return redirect()->to('/admin/reservations/status/Declined/ASC')->with('SucMess', 'Reservation successfully declined!');
            }
        } else if ($this->request->getPost('submit') == 'Complete') {
            $event = $this->request->getPost('event');
            $status = "Completed";
            if ($this->updateres->acceptReserv($id, $status)) {
                //if the query is successfull
                // Call email sender library - declare purpose and target as parameters //
                $this->email->send('updateStat', 'Status', $email, $refn, 'Completed');

                //saving to records if wedding, baptism
                if($event == 'Wedding'){
                    $details =  $this->viewDetails($event, $id);
                    if($this->saveWed($details)){
                        return redirect()->to('/admin/reservations/status/Completed/ASC')->with('SucMess', 'Reservation successfully completed!');
                    } else {
                        return redirect()->to('/admin/reservations/status/Completed/ASC')->with('SucErr', 'Reservation not successfully completed!');
                    }
                } elseif($event == 'Baptism'){
                    $details =  $this->viewDetails($event, $id);
                    if($this->saveBap($details)){
                        return redirect()->to('/admin/reservations/status/Completed/ASC')->with('SucMess', 'Reservation successfully completed!');
                    } else {
                        return redirect()->to('/admin/reservations/status/Completed/ASC')->with('SucErr', 'Reservation not successfully completed!');
                    }
                } elseif($event == 'Funeral Mass/Blessing'){
                    $details =  $this->viewDetails($event, $id);
                    if($this->saveFun($details)){
                        return redirect()->to('/admin/reservations/status/Completed/ASC')->with('SucMess', 'Reservation successfully completed!');
                    } else {
                        return redirect()->to('/admin/reservations/status/Completed/ASC')->with('SucErr', 'Reservation not successfully completed!');
                    }
                } 
                return redirect()->to('/admin/reservations/status/Completed/ASC')->with('SucMess', 'Reservation successfully completed!');
            }
        }
    }

    //get details from database
    public function viewDetails($tbl, $id)
    {
        $reserv = $this->getres->getDetails($tbl, $id);
        return $reserv;
    }
    //saving the completed event
    public function saveBap($det){
        $recBap = new \App\Models\Records\Baptism();
        foreach($det as $details){
            $values = [
                'date' => $details['date'],
                'time' => $details['tSt'],
                'fn' => $details['fn'],
                'mn' => $details['mn'],
                'ln' => $details['ln'],
                'gender' => $details['gender'],
                'dob' => $details['dob'],
                'pob' => $details['pob'],
                'addr' => $details['addr'],
                'num' => $details['num'],
                'fatN' => $details['fatN'],
                'fatPob' => $details['fatPob'],
                'motN' => $details['motN'],
                'motPob' => $details['motPob'],
                'mrgTp' => $details['mrgTp'],
                'gFatN' => $details['gFatN'],
                'gFatAd' => $details['gFatAd'],
                'gMotN' => $details['gMotN'],
                'gMotAd' => $details['gMotAd'],
            ];
        }
        if($recBap->save($values)){
            return true;
        } else {
            return false;
        }
    }
    public function saveWed($det){
        $recWed = new \App\Models\Records\Wedding();
        foreach($det as $details){
            $values = [
                'date' => $details['date'],
                'time' => $details['tSt'],
                'gFn' => $details['gFn'],
                'gMn' => $details['gMn'],
                'gLn' => $details['gLn'],
                'gNum' => $details['gNum'],
                'gDob' => $details['gDob'],
                'gPob' => $details['gPob'],
                'gAddr' => $details['gAddr'],
                'gFat' => $details['gFat'],
                'gMot' => $details['gMot'],
                'gRel' => $details['gRel'],
                'bFn' => $details['bFn'],
                'bMn' => $details['bMn'],
                'bLn' => $details['bLn'],
                'bNum' => $details['bNum'],
                'bDob' => $details['bDob'],
                'bPob' => $details['bPob'],
                'bAddr' => $details['bAddr'],
                'bFat' => $details['bFat'],
                'bMot' => $details['bMot'],
                'bRel' => $details['bRel'],
            ];
        }
        if($recWed->save($values)){
            return true;
        } else {
            return false;
        }
    }

    public function saveFun($det){
        $recFun = new \App\Models\Records\Funeral();
        foreach($det as $details){
            $values = [
                'date' => $details['date'],
                'time' => $details['tSt'],
                'fn' => $details['fn'],
                'mn' => $details['mn'],
                'ln' => $details['ln'],
                'gender' => $details['gender'],
                'dDate' => $details['dDate'],
                'age' => $details['age'],
                'dCause' => $details['dCause'],
                'intDate' => $details['intDate'],
                'cem' => $details['cem'],
                'infFn' => $details['infFn'],
                'infMn' => $details['infMn'],
                'infLn' => $details['infLn'],
                'num' => $details['num'],
                'addr' => $details['addr'],
                'sacr' => $details['sacr'],
                'burial' => $details['burial'],
            ];
        }
        if($recFun->save($values)){
            return true;
        } else {
            return false;
        }
    }






    // Functions for faqs 
    public function addfaqItem()
    {
        $ques = ucfirst($this->request->getPost('question'));
        $ans = ucfirst($this->request->getPost('answer'));
        $data = [
            'question' => $ques,
            'answer' => $ans,
        ];
        if ($this->faqs->save($data)) {
            return redirect()->to('/admin/faqs')->with('faqsSuc', "Frequently Asked Question successfully created!");
        } else {
            return redirect()->to('/admin/faqs')->with('faqsErr', "Frequently Asked Question, please try again");
        }
    }
    // Delete an faqs
    public function delfaqItem() {
        $id = $this->request->getPost('id');

        $row = $this->faqs->find($id);

        if ($row) {
            $file = $row['id'];

            if (file_exists($file)) {
                unlink($file);
            }

            $this->faqs->delete($id);

            return redirect()->to('/admin/faqs')->with('faqsSuc', "Frequently Asked Question deleted successfully!");
        } else {
            return redirect()->to('/admin/faqs')->with('faqsErr', "Failed to delete Frequently Asked Question Item, please try again.");
        }
    }
    // Edit faqs
    public function editfaqItem() {
        $id = $this->request->getPost('id');
        $ques = ucfirst($this->request->getPost('question'));
        $ans = ucfirst($this->request->getPost('answer'));
        $data = [
            'question' => $ques,
            'answer' => $ans,
        ];
        if ($this->faqs->update($id, $data)) {
            return redirect()->to('/admin/faqs')->with('faqsSuc', "Frequently Asked Question successfully updated!");
        } else {
            return redirect()->to('/admin/faqs')->with('faqsErr', "Failed to update Frequently Asked Question Item, please try again");
        }
    }








    // Functions for services 
    public function addserveItem()
    {
        $name = $this->request->getPost('name');
        $img = $this->request->getFile('upload');
        $schedule = $this->request->getPost('schedule');
        $req = $this->request->getPost('req');
        $notes = $this->request->getPost('notes');
        if ($this->validateUpload($img)) {
            $image = $this->uploadserve($img);
            $data = [
                'img' => $image,
                'name' => $name,
                'schedule' => $schedule,
                'req' => $req,
                'notes' => $notes
            ];
            if ($this->services->save($data)) {
                return redirect()->to('/admin/services')->with('serveSuc', "Services successfully created!");
            } else {
                return redirect()->to('/admin/services')->with('serveSuc', "Failed to create services, please try again");
            }
        } else {
            return redirect()->to('/admin/services')->with('serveSuc', "Invalid format, please try again");
        }
    }
    // Set upload path for services
    public function uploadserve($file)
    {
        $filename = $file->getname();
        // Define the directory to save the file
        $uploadPath = 'images/services/';

        // Move the file to the upload directory
        $file->move($uploadPath);

        return $uploadPath . $filename;
    }
    // Delete an services
    public function delserveItem()
    {
        $id = $this->request->getPost('id');

        $row = $this->services->find($id);

        if ($row) {
            $file = $row['img'];

            if (file_exists($file)) {
                unlink($file);
            }

            $this->services->delete($id);

            return redirect()->to('/admin/services')->with('serveSuc', "Service deleted successfully!");
        } else {
            return redirect()->to('/admin/services')->with('serveErr', "Failed to delete service, please try again.");
        }
    }
    // Edit services
    public function editserveItem()
    {
        $id = $this->request->getPost('id');
        $name = $this->request->getPost('name');
        $img = $this->request->getFile('upload');
        $schedule = $this->request->getPost('schedule');
        $req = $this->request->getPost('req');
        $notes = $this->request->getPost('notes');
        if($img == ""){
            $data = [
                'name' => $name,
                'schedule' => $schedule,
                'req' => $req,
                'notes' => $notes
            ];
            if ($this->services->update($id, $data)) {
                return redirect()->to('/admin/services')->with('serveSuc', "Services successfully updated!");
            } else {
                return redirect()->to('/admin/services')->with('serveErr', "Failed to update services, please try again");
            }
        }
        if ($this->validateUpload($img)) {
            $image = $this->uploadserve($img);
            $data = [
                'img' => $image,
                'name' => $name,
                'schedule' => $schedule,
                'req' => $req,
                'notes' => $notes
            ];
            if ($this->services->update($id, $data)) {
                return redirect()->to('/admin/services')->with('serveSuc', "Services successfully updated!");
            } else {
                return redirect()->to('/admin/services')->with('serveErr', "Failed to update services, please try again");
            }
        } else {
            return redirect()->to('/admin/services')->with('serveErr', "Invalid format, please try again");
        }
    }













    // Functions for aboutus 
    public function addaboutItem()
    {
        $title = $this->request->getPost('title');
        $img = $this->request->getFile('upload');
        $des = $this->request->getPost('des');
        if ($this->validateUpload($img)) {
            $image = $this->uploadabout($img);
            $data = [
                'img' => $image,
                'title' => $title,
                'des' => $des,
            ];
            if ($this->about->save($data)) {
                return redirect()->to('/admin/about')->with('aboutSuc', "Content successfully created!");
            } else {
                return redirect()->to('/admin/about')->with('aboutErr', "Failed to create content, please try again");
            }
        } else {
            return redirect()->to('/admin/about')->with('aboutErr', "Invalid format, please try again");
        }
    }
    public function addemployeeItem()
    {
        $name = $this->request->getPost('name');
        $img = $this->request->getFile('upload');
        $role = $this->request->getPost('role');
        if ($this->validateUpload($img)) {
            $image = $this->uploadabout($img);
            $data = [
                'img' => $image,
                'name' => $name,
                'role' => $role,
            ];
            if ($this->employee->save($data)) {
                return redirect()->to('/admin/about')->with('aboutSuc', "Employee successfully added!");
            } else {
                return redirect()->to('/admin/about')->with('aboutErr', "Failed to add employee, please try again");
            }
        } else {
            return redirect()->to('/admin/about')->with('aboutErr', "Invalid format, please try again");
        }
    }
    // Set upload path for aboutus
    public function uploadabout($file)
    {
        $filename = $file->getname();
        // Define the directory to save the file
        $uploadPath = 'images/aboutus/';

        // Move the file to the upload directory
        $file->move($uploadPath);

        return $uploadPath . $filename;
    }
    // Delete an aboutus
    public function delaboutItem()
    {
        $id = $this->request->getPost('id');

        $row = $this->services->find($id);

        if ($row) {
            $file = $row['img'];

            if (file_exists($file)) {
                unlink($file);
            }

            $this->services->delete($id);

            return redirect()->to('/admin/aboutus')->with('serveSuc', "Service deleted successfully!");
        } else {
            return redirect()->to('/admin/aboutus')->with('serveErr', "Failed to delete service, please try again.");
        }
    }
    // Edit aboutus
    public function editaboutItem()
    {
        $id = $this->request->getPost('id');
        $name = $this->request->getPost('name');
        $img = $this->request->getFile('upload');
        $schedule = $this->request->getPost('schedule');
        $req = $this->request->getPost('req');
        $notes = $this->request->getPost('notes');
        if($img == ""){
            $data = [
                'name' => $name,
                'schedule' => $schedule,
                'req' => $req,
                'notes' => $notes
            ];
            if ($this->services->update($id, $data)) {
                return redirect()->to('/admin/aboutus')->with('serveSuc', "Services successfully updated!");
            } else {
                return redirect()->to('/admin/aboutus')->with('serveErr', "Failed to update services, please try again");
            }
        }
        if ($this->validateUpload($img)) {
            $image = $this->uploadserve($img);
            $data = [
                'img' => $image,
                'name' => $name,
                'schedule' => $schedule,
                'req' => $req,
                'notes' => $notes
            ];
            if ($this->services->update($id, $data)) {
                return redirect()->to('/admin/aboutus')->with('serveSuc', "Services successfully updated!");
            } else {
                return redirect()->to('/admin/aboutus')->with('serveErr', "Failed to update services, please try again");
            }
        } else {
            return redirect()->to('/admin/aboutus')->with('serveErr', "Invalid format, please try again");
        }
    }












    // Functions for announcements 
    public function addItem()
    {
        $title = $this->request->getPost('title');
        $img = $this->request->getFile('upload');
        $date = $this->request->getPost('date');
        $time = $this->request->getPost('time');
        $desc = $this->request->getPost('desc');
        if ($this->validateUpload($img)) {
            $image = $this->upload($img);
            $data = [
                'img' => $image,
                'title' => $title,
                'date' => $date,
                'time' => $time,
                'descr' => $desc
            ];
            if ($this->announce->save($data)) {
                return redirect()->to('/admin/announcements')->with('announceSuc', "Announcement successfully created!");
            } else {
                return redirect()->to('/admin/announcements')->with('announceErr', "Failed to create announcement, please try again");
            }
        } else {
            return redirect()->to('/admin/announcements')->with('announceErr', "Invalid format, please try again");
        }
    }
    // Validate for announcements 
    //function to validate the file type
    public function validateUpload($img)
    {
        if ($img->isValid() && !$img->hasMoved()) {
            $filetype = $img->getClientExtension();
            $types = ["jpg", "jpeg", "png"];

            return in_array($filetype, $types);
        }
        return false;
    }

    // Set upload path
    public function upload($file)
    {
        $filename = $file->getname();
        // Define the directory to save the file
        $uploadPath = 'images/announcements/';

        // Move the file to the upload directory
        $file->move($uploadPath);

        return $uploadPath . $filename;
    }

    // Delete an announcement
    public function delItem()
    {
        $id = $this->request->getPost('id');

        $row = $this->announce->find($id);

        if ($row) {
            $file = $row['img'];

            if (file_exists($file)) {
                unlink($file);
            }

            $this->announce->delete($id);

            return redirect()->to('/admin/announcements')->with('announceSuc', "Announcement deleted successfully!");
        } else {
            return redirect()->to('/admin/announcements')->with('announceErr', "Failed to delete announcement, please try again.");
        }
    }

    // Edit announcement
    public function editItem()
    {
        $id = $this->request->getPost('id');
        $title = $this->request->getPost('title');
        $img = $this->request->getFile('upload');
        $date = $this->request->getPost('date');
        $time = $this->request->getPost('time');
        $desc = $this->request->getPost('desc');
        if ($this->validateUpload($img)) {
            $image = $this->upload($img);
            $data = [
                'img' => $image,
                'title' => $title,
                'date' => $date,
                'time' => $time,
                'descr' => $desc
            ];
            if ($this->announce->update($id, $data)) {
                return redirect()->to('/admin/announcements')->with('announceSuc', "Announcement successfully updated!");
            } else {
                return redirect()->to('/admin/announcements')->with('announceErr', "Failed to update announcement, please try again");
            }
        } else {
            return redirect()->to('/admin/announcements')->with('announceErr', "Invalid format, please try again");
        }
    }
}
