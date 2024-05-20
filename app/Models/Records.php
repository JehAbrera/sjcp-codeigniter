<?php

namespace App\Models;

use CodeIgniter\Model;

class Records extends Model
{
    protected $table = '';

    // If no name given in records view call this function 
    public function queryAll($value)
    {
        $this->setTb($value);

        $this->builder()
            ->select('*')
            ->orderBy('date', 'DESC')
            ->orderBy('time', 'DESC');

        return $this;
    }

    // If name is given call this //
    public function queryName($value, $name)
    {
        $this->setTb($value);

        $this->builder()
            ->select('*')
            ->orderBy('date', 'DESC')
            ->orderBy('time', 'DESC');

        return $this;
    }

    protected function setTb($value)
    {
        if ($value == 'Baptism') {
            $this->table = 'recbap';
        } elseif ($value == 'Confirmation') {
            $this->table = 'recconf';
        } elseif ($value == 'Wedding') {
            $this->table = 'recwed';
        } elseif ($value == 'Funeral Mass') {
            $this->table = 'recfun';
        }
    }
}
