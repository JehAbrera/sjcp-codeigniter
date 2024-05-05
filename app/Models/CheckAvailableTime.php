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

            //print_r($query);

        // Retrieve the result
        $result = $query->getResultArray();
        return $result;
         
        // // Check if any rows were returned
        // if (!empty($result)) {
        //     return true;
        // } else {
        //     // If no rows were returned, return null or handle the case as needed
        //     return false;
        // }
    }
}
?>