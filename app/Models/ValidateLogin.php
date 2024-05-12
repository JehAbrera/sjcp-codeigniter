<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Libraries\Hash;

class ValidateLogin extends Model
{

    protected $db;
    protected $hash;

    public function __construct()
    {
        $this->db = db_connect();
        $this->hash = new Hash();
    }
    public function index($user, $pass) 
    {   
        // Build the SELECT query using CodeIgniter's Query Builder
        $query = $this->db->table('liuser')->select('*')->where('email', $user)->where('pass', $this->hash->hash($pass))->get();

        // Retrieve the result
        $result = $query->getResult();

        // Check if any rows were returned
        if (!empty($result)) {
            return true;
        } else {
            // If no rows were returned, return null or handle the case as needed
            return false;
        }
    }
}
