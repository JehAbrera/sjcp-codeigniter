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

    public function adminQueryAll($status, $order)
    {
        $this->setAlleventsTbl();

        $this->builder()
         ->select('*')
         ->where('status', $status)
         ->orderBy('apDate', $order);

        return $this;
    }
    
    public function getDetails($tbl, $id)
    {
        $table = $this->seTbl($tbl);
        $query = $this->db->table($table)
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

    public function seTbl($type)
    {
        if ($type == "Wedding") {
            return $this->table = 'detwed';
        } else if ($type == "Baptism") {
            return $this->table = 'detbap';
        } else if ($type == "Funeral Mass/Blessing") {
            return $this->table = 'detfun';
        } else if ($type == "Mass Intention") {
            return $this->table = 'detmass';
        } else if ($type == "Blessing") {
            return $this->table = 'detbls';
        } else {
            return $this->table = 'detdocu';
        }
    }
}
