<?php

namespace App\Models;

use CodeIgniter\Model;

class UpdateReservation extends Model
{
    protected $db, $hash;

    public function __construct()
    {
        $this->db = db_connect();
    }

    public function updateReserv($id, $reason, $status)
    {
        $builder = $this->db->table('allevents');
        $update = [
            'status' => $status,
            'reason' => $reason,
        ];
        
        $builder->where('id', $id);
        $check = $builder->update($update);

        return $check;
    } 
    
    public function acceptReserv($id, $status)
    {
        $builder = $this->db->table('allevents');
        $update = [
            'status' => $status,
        ];
        
        $builder->where('id', $id);
        $check = $builder->update($update);

        return $check;
    }
}
