<?php

namespace App\Models;

use CodeIgniter\Model;

class CreateAccount extends Model
{
    protected $db;


    public function __construct()
    {
        $this->db = db_connect();
    }
    public function index($fn, $mn, $ln, $em, $pass)
    {
        // Prepare the Query
        $pQuery = $this->db->prepare(static function ($db) {
            return $db->table('liuser')->insert([
                'role'    => 'user',
                'fn'   => 'b',
                'mn' => 'c',
                'ln' => 'd',
                'email' => 'e',
                'pass' => 'f',
            ]);
        });
        $role = "user";
        // Run the Query
        $results = $pQuery->execute($role, $fn, $mn, $ln, $em, $pass);
        return true;
    }
    public function isExisting($user)
    {
        // Check if email already exist 
        $query = $this->db->table('liuser')->select('*')->where('email', $user)->get();
        
        $result = $query->getResult();

        if (!empty($result)) {
            return true;
        }
        return false;
    }
}
