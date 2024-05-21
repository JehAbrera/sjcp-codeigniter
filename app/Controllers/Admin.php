<?php
// Redirect admin controller request in this page
namespace App\Controllers;

use CodeIgniter\Exceptions\PageNotFoundException;
use App\Models\Count;

class Admin extends BaseController
{
    protected $count, $pager, $records, $getres;

    public function __construct()
    {
        $this->records = new \App\Models\Records();
        $this->getres = new \App\Models\GetReservation();
        $this->count = new Count();
        $this->pager = \Config\Services::pager();
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

        return redirect()->to('/admin/records/' . $value .  '/' . $name);
    }

    //functions for admin reservation page
    public function getStatus($status)
    {
        $reserv = $this->getres->adminQueryAll($status)->paginate(50);
        foreach ($reserv as &$res) {
            $add = [];
            $tbl = $this->table($res['type']);
            $add = [
                'det' => $this->viewDetails($tbl, $res['id'])
            ];
            $res = array_merge($res, $add);
        }
        $data = [
            'title' => 'Reservation',
            'type' => $status,
            'reservations' => $reserv,
            'pager' => $this->getres->pager,
        ];

        return view('templates/navadmin', $data) . view('admin/reservation', $data);
    }

    public function viewDetails($tbl, $id)
    {
        $reserv = $this->getres->getDetails($tbl, $id);
        return $reserv;
    }

    public function table($type)
    {
        if ($type == "Wedding") {
            return $this->table = 'detwed';
        } else if ($type == "Baptism") {
            return $this->table = 'detbap';
        } else if ($type == "Funeral") {
            return $this->table = 'detfun';
        } else if ($type == "Mass Intention") {
            return $this->table = 'detmass';
        } else if ($type == "Funeral Mass/Blessing") {
            return $this->table = 'detbls';
        } else {
            return $this->table = 'detdocu';
        }
    }
}
