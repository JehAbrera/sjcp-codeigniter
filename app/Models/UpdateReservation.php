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

    public function cancelReserv($id, $reason)
    {
        $builder = $this->db->table('allevents');
        $update = [
            'status' => 'Canceled',
            'reason' => $reason,
        ];
        
        $builder->where('id', $id);
        $builder->update($update);
    }   
}
