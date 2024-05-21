<?php

namespace App\Models;

use CodeIgniter\Model;

class Announcement extends Model {

    protected $table = 'detannou';
    protected $primaryKey = 'id';
    protected $allowedFields = ['img', 'title', 'date', 'time', 'descr'];

}