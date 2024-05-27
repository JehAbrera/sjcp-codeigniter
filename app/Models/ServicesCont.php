<?php

namespace App\Models;

use CodeIgniter\Model;

class ServicesCont extends Model {

    protected $table = 'servecont';
    protected $primaryKey = 'id';
    protected $allowedFields = ['img', 'name', 'schedule', 'req', 'notes'];

}