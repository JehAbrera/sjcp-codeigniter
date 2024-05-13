<?php

/*
*
* Profile.php handles decisions and request from the user profile page of views
* View, edit, and delete/archive user profile are the main functionalities provided for user in this controller
*
*/

namespace App\Controllers;

use App\Models\UpdateProfile;

class Profile extends BaseController
{

    protected $helpers = ['form'];
    protected $profile;
    public function __construct()
    {
        $this->profile = new UpdateProfile();
    }
    public function index()
    {
        // unset data from signup //
        $array = ['step', 'fn', 'mn', 'ln', 'email', 'pass'];
        session()->remove($array);

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

    /*
    *
    * Functions to return view mode of the profile page
    * Redirects calls the router to fetch a get request for the index function rendering the display page
    *
    */
    public function viewProfile()
    {
        session()->set('profileMode', 'view');
        return redirect()->to('/user/profile');
    }
    // Edit profile view //
    public function editProfile()
    {
        // Check for post request //
        // Post request are sent if changes in the profile details are trying to be saved //
        if ($this->request->getMethod() === 'POST') {
            // Retrieve inputs //
            // Capitalize inputs //
            $fn = ucwords(strval($this->request->getPost('userfn')));
            $mn = ucwords(strval($this->request->getPost('usermn')));
            $ln = ucwords(strval($this->request->getPost('userln')));

            // Check if inputs are the same as the save user info //
            // To add: input formatting and validation //
            if ($this->profile->isEqual([$fn, $mn, $ln])) {
                session()->setFlashdata('editErr', "Details are the same with previous user information.");
            } else {
                // If details are different, call update profile query //
                if ($this->profile->updateProfile($fn, $mn, $ln)) {
                    // If query is successful generate success message - set view mode to view //
                    session()->setFlashdata('profUpdated', "Profile successfully updated!");
                    session()->set('profileMode', 'view');
                } else {
                    // if query fails display error message //
                    session()->setFlashdata('editErr', "Profile update failed, please try again later");
                }
            }
        } else {
            // If request value is Get set view mode to edit to display edit screen //
            session()->set('profileMode', 'edit');
        }
        return redirect()->to('/user/profile');
    }
    public function editPass()
    {
        if ($this->request->getMethod() === 'POST') {
            $old = $this->request->getPost('oldpass');
            $new = $this->request->getPost('newpass');
            if (!$this->profile->validOld($old)) {
                session()->setFlashdata('passErr', "Old password does not match.");
            } else {
                if (!$this->profile->validNew($new)) {
                    session()->setFlashdata('passErr', "New password cannot be the same as the old password.");
                } else {
                    if ($this->profile->changePass($new)) {
                        session()->remove('isLogged');
                        return redirect()->to('/home');
                    } else {
                        session()->getFlashdata('passErr', "Password update failed, please try again later");
                    }
                }
            }
        } else {
            session()->set('profileMode', 'change');
        }
        return redirect()->to('/user/profile');
    }
    public function deleteAcc()
    {
        if ($this->request->getMethod() === 'POST') {
            session()->set('profileMode', 'view');
        } else {
            session()->set('profileMode', 'delete');
        }
        return redirect()->to('/user/profile');
    }
}
