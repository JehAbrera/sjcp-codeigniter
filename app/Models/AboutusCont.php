<?php

namespace App\Models;

use CodeIgniter\Model;

class AboutusCont extends Model {

    protected $table = 'aboutuscont';
    protected $primaryKey = 'id';
    protected $allowedFields = ['img', 'title', 'des'];

}