<?php
// Redirect admin controller request in this page
namespace App\Controllers;

use CodeIgniter\Exceptions\PageNotFoundException;

class Admin extends BaseController {
    public function admin($page)
    {
        if (! is_file(APPPATH . 'Views/admin/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            throw new PageNotFoundException($page);
        }
        $data['title'] = ucfirst($page);
        return view('templates/navadmin', $data) . view('admin/' . $page, $data);
    }
}