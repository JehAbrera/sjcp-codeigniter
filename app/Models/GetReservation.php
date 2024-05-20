<?php

namespace App\Models;

use CodeIgniter\Model;

class GetReservation extends Model
{
    public function __construct()
    {
        $this->db = db_connect();
    }

    public function queryAll($status, $email)
    {
         // Build the SELECT query using CodeIgniter's Query Builder
         $query = $this->db->table('allevents')
         ->select('*')
         ->where('email', $email)
         ->where('status', $status)
         ->get();


     // Retrieve the result
     $result = $query->getResultArray();
     return $result;
    }
}
