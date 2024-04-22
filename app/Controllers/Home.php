<?php

namespace App\Controllers;
use CodeIgniter\Exceptions\PageNotFoundException;

class Home extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }
    public function view($page) : string 
    {
        if (! is_file(APPPATH . 'Views/user/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            throw new PageNotFoundException($page);
        }
        $data['title'] = ucfirst($page);
        return view('templates/navbar', $data) . view('templates/header', $data) . view('user/' . $page) . view('templates/footer');
    }
    public function admin($page) : string 
    {
        if (! is_file(APPPATH . 'Views/admin/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            throw new PageNotFoundException($page);
        }
        $data['title'] = ucfirst($page);
        return view('templates/navadmin', $data) . view('admin/' . $page, $data);
    }
}
