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

        if ($value != 'Wedding') {
            $this->builder()
                ->select('*');

            $this->builder()
                ->groupStart();

            foreach ($name as $word) {
                $this->builder()
                    ->like('fn', $word, 'both')
                    ->orLike('mn', $word, 'both')
                    ->orLike('ln', $word, 'both');
            }

            $this->builder()
                ->groupEnd();

            $this->builder()
                ->orderBy('date', 'DESC')
                ->orderBy('time', 'DESC');
        } else {
            $this->builder()
                ->select('*');

            $this->builder()
                ->groupStart();

            foreach ($name as $word) {
                $this->builder()
                    ->like('gFn', $word, 'both')
                    ->orLike('gMn', $word, 'both')
                    ->orLike('gLn', $word, 'both')
                    ->orLike('bFn', $word, 'both')
                    ->orLike('bMn', $word, 'both')
                    ->orLike('bLn', $word, 'both');
            }

            $this->builder()
                ->groupEnd();
            $this->builder()
                ->orderBy('date', 'DESC')
                ->orderBy('time', 'DESC');
        }

        return $this;
    }

    public function getAnnouncements($value) {
        $this->setTb($value);

        $this->builder()
                ->select('*');

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
        } elseif ($value == 'announcements') {
            $this->table = 'detannou';
        }
    }
}
