<?php

namespace App\Models;

use CodeIgniter\Model;

class SetReservation extends Model
{
    protected $db;

    public function __construct()
    {
        $this->db = db_connect();
    }

    public function setinAllevents(){
        
    }
}

?>