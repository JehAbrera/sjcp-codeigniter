<?php

namespace App\Models;

use CodeIgniter\Model;

class CheckAvailableTime extends Model
{

    protected $db;

    public function __construct()
    {
        $this->db = db_connect();
    }
    public function getTime($date) 
    {
        // Build the SELECT query using CodeIgniter's Query Builder
        $query = $this->db->table('allevents')
            ->select('evTSt')
            ->select('evTEd')
            ->where('evDate', $date)
            ->where('status', 'Accepted')
            ->get();


        // Retrieve the result
        $result = $query->getResultArray();
        return $result;
    }
}
?>