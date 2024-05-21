<?php

namespace App\Models;

use CodeIgniter\Model;

class GetReservation extends Model
{
    protected $table = '';

    public function queryAll($status, $email)
    {
        $this->setAlleventsTbl();

        $this->builder()
         ->select('*')
         ->where('email', $email)
         ->where('status', $status);

        return $this;
    }
    
    public function getDetails($tbl, $id)
    {
        $query = $this->db->table($tbl)
         ->select('*')
         ->where('forID', $id)
         ->get();

        $result = $query->getResultArray();
        return $result;
    }

    protected function setAlleventsTbl()
    {
       $this->table = 'allevents';
    }
}
