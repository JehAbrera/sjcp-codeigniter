<?php

namespace App\Models\Records;

use CodeIgniter\Model;

class Wedding extends Model
{
    // Model properties and methods go here
    protected $table = 'recwed';
    protected $primaryKey = 'id';
    protected $allowedFields = ['date', 'time', 'gFn', 'gMn', 'gLn', 'gNum', 'gDob', 'gPob', 'gAddr', 'gFat', 'gMot', 'gRel', 'bFn', 'bMn', 'bLn', 'bNum', 'bDob', 'bPob', 'bAddr', 'bFat', 'bMot', 'bRel'];
}