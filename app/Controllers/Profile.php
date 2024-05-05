<?php

namespace App\Controllers;

use App\Models\UpdateProfile;

class Profile extends BaseController {
    
    protected $profile;
    public function __construct()
    {
        $this->profile = new UpdateProfile();
    }
    public function index() {
        $data = [
            'title' => "Profile",
            'info' => $this->profile->view(),
            'mode' => session()->profileMode,
        ];
        return view('templates/navbar', $data) . view('user/profile', $data);
    }
    public function viewProfile() {
        session()->set('profileMode', 'view');
        return redirect()->to('/user/profile');
    }
    public function editProfile() {
        session()->set('profileMode', 'edit');
        return redirect()->to('/user/profile');
    }
    public function editPass() {
        session()->set('profileMode', 'change');
        return redirect()->to('/user/profile');
    }
    public function deleteAcc() {

    }
}