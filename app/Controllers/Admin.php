<?php
// Redirect admin controller request in this page
namespace App\Controllers;

use CodeIgniter\Exceptions\PageNotFoundException;
use App\Models\Count;
use App\Models\Announcement;

class Admin extends BaseController
{
    protected $count, $pager, $records, $announce;

    public function __construct()
    {
        $this->records = new \App\Models\Records();
        $this->count = new Count();
        $this->pager = \Config\Services::pager();
        $this->announce = new Announcement();
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
    public function delItem() {
        $id = $this->request->getPost('id');

        $row = $this->announce->find($id);

        if ($row) {
            $file = $row['id'];

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
    public function editItem() {
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
