<?php

namespace App\Controllers;

use CodeIgniter\Exceptions\PageNotFoundException;

class Home extends BaseController
{

    public function index(): string
    {
        $data['title'] = "Home";
        return view('templates/navbar', $data) . view('templates/header', $data) . view('user/home') . view('templates/footer');
    }
    public function user($page)
    {
        if ($page == "logout") {
            if (session()->has('isLogged')) {
                session()->remove('isLogged');
                return redirect()->to('/home');
            } elseif (session()->has('adminLog')) {
                session()->remove('adminLog');
                return redirect()->to('/admin/login');
            } else {
                return redirect()->to('/home');
            }
        }
        if (!is_file(APPPATH . 'Views/user/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            throw new PageNotFoundException($page);
        }
        $data['title'] = ucfirst($page);
        return view('templates/navbar', $data) . view('templates/header', $data) . view('user/' . $page) . view('templates/footer');
    }
    protected function setMessage($page)
    {
    }
}
