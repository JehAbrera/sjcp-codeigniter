<?php

namespace App\Models\Records;

use CodeIgniter\Model;

class Funeral extends Model
{
    protected $table = 'recfun';
    protected $primaryKey = 'id';
    protected $allowedFields = ['date', 'time', 'fn', 'mn', 'ln', 'gender', 'dDate', 'age', 'dCause', 'intDate', 'cem', 'infFn', 'infMn', 'infLn', 'num', 'addr', 'sacr', 'burial'];
}