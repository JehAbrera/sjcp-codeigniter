<?php

namespace App\Models;

use CodeIgniter\Model;

class UpdateProfile extends Model {
    protected $db;

    public function __construct()
    {
        $this->db = db_connect();
    }

    public function index() {
        $userInfo = [];
        $query = $this->db->table('liuser')
            ->select('*')
            ->where('email', session()->user)
            ->limit(1)
            ->get();

        // Retrieve the result
        $result = $query->getResult();

        if (!empty($result)) {
            array_push($userInfo, $result[0]->fn, $result[0]->mn, $result[0]->ln, $result[0]->email);
        }
        return $userInfo;
    }
}