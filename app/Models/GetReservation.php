<?php

namespace App\Models;

use CodeIgniter\Model;

class GetReservation extends Model
{
    protected $table = '';

    public function queryAll($status, $email)
    {
        $this->setTb();
        
        $this->builder()
         ->select('*')
         ->where('email', $email)
         ->where('status', $status);

        return $this;
    }   

    protected function setTb()
    {
       $this->table = 'allevents';
    }
}
