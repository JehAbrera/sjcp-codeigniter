<?php

namespace App\Models\Records;

use CodeIgniter\Model;

class Baptism extends Model
{
    protected $table = 'recbap';
    protected $primaryKey = 'id';
    protected $allowedFields = ['date', 'time', 'fn', 'mn', 'ln', 'gender', 'dob', 'pob', 'addr', 'num', 'fatN', 'fatPob', 'motN', 'motPob', 'mrgTp', 'gFatN', 'gFatAd', 'gMotN', 'gMotAd'];

}
