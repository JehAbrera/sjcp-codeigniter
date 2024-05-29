<?php

namespace App\Controllers;

use CodeIgniter\Exceptions\PageNotFoundException;

class Home extends BaseController
{
    protected $records;
    public function __construct()
    {
        $this->records = new \App\Models\Records();
    }

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

        if ($page == 'faqs') {
            $addInf = [
                'faqs' => $this->records->getAnnouncements($page)->paginate(10)
            ];
            if ($page == 'success') {
                return view('user/' . $page);
            }
            $data['title'] = ucfirst($page);

            $data = array_merge($data, $addInf);
            return view('templates/navbar', $data) . view('templates/header', $data) . view('user/' . $page) . view('templates/footer');
        }

        if ($page == 'services') {
            $addInf = [
                'services' => $this->records->getAnnouncements($page)->paginate(10)
            ];
            if ($page == 'success') {
                return view('user/' . $page);
            }
            $data['title'] = ucfirst($page);

            $data = array_merge($data, $addInf);
            return view('templates/navbar', $data) . view('templates/header', $data) . view('user/' . $page) . view('templates/footer');
        }

        if ($page == 'about') {
            $addInf = [
                'about' => $this->records->getAnnouncements($page)->paginate(10),
                'employee' => $this->records->getAnnouncements('emp')->paginate(10)
            ];
            if ($page == 'success') {
                return view('user/' . $page);
            }
            $data['title'] = ucfirst($page);

            $data = array_merge($data, $addInf);
            return view('templates/navbar', $data) . view('templates/header', $data) . view('user/' . $page) . view('templates/footer');
        }

        $data['title'] = ucfirst($page);
        return view('templates/navbar', $data) . view('templates/header', $data) . view('user/' . $page) . view('templates/footer');
    }

    public function terms()
    {
        $data['title'] = "TermsandServices";
        return view('/user/termsandservices', $data);
    }
    protected function setMessage($page)
    {
    }
}
