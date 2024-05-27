<?php

namespace App\Models\Records;

use CodeIgniter\Model;

class Confirmation extends Model
{
    protected $table = 'recconf';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'date',
        'time',
        'fn',
        'mn',
        'ln',
        'gender',
        'dob',
        'age',
        'pob',
        'plcBap',
        'datBap',
        'fatN',
        'motN',
        'num',
        'addr',
        'gFatN',
        'gMotN',
    ];
}
