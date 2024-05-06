<?php

namespace App\Controllers;

use App\Models\UpdateProfile;

class Profile extends BaseController {
    
    protected $helpers = ['form'];
    protected $profile;
    public function __construct()
    {
        $this->profile = new UpdateProfile();
    }
    public function index() {
        if (!session()->has('profileMode')) {
            session()->set('profileMode', 'view');
        }
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
        if ($this->request->getMethod() === 'POST') {
            $fn = $this->request->getPost('userfn');
            $mn = $this->request->getPost('usermn');
            $ln = $this->request->getPost('userln');

            if($this->profile->isEqual([$fn, $mn, $ln])) {
                session()->setFlashdata('editErr', "Details are the same with previous user information.");
            } else {
                if ($this->profile->updateProfile($fn, $mn, $ln)) {
                    session()->setFlashdata('profUpdated', "Profile successfully updated!");
                    session()->set('profileMode', 'view');
                } else {
                    session()->setFlashdata('editErr', "Profile update failed, please try again later");
                }
            }
        } else {
            session()->set('profileMode', 'edit');
        }
        return redirect()->to('/user/profile');
    }
    public function editPass() {
        if ($this->request->getMethod() === 'POST') {
            session()->set('profileMode', 'view');
        } else {
            session()->set('profileMode', 'change');
        }
        return redirect()->to('/user/profile');
    }
    public function deleteAcc() {
        if ($this->request->getMethod() === 'POST') {
            session()->set('profileMode', 'view');
        } else {
            session()->set('profileMode', 'delete');
        }
        return redirect()->to('/user/profile');
    }
}