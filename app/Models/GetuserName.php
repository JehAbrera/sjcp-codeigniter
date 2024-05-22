<?php

namespace App\Models;

use CodeIgniter\Model;

class GetuserName extends Model
{

    public function getName($email){
        $query = $this->db->table('liuser')
        ->select('fn')
        ->select('mn')
        ->select('ln')
        ->where('email', $email)
        ->get();

       $result = $query->getResultArray();
       return $result;
    }

}