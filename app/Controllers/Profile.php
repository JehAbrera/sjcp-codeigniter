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
            'info' => $this->profile->index(),
        ];
        return view('templates/navbar', $data) . view('user/profile', $data);
    }
}