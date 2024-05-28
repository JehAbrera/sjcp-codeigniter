<?php

namespace App\Models;

use CodeIgniter\Model;

class UpdatePassword extends Model {

    protected $table = 'liuser';
    protected $primaryKey = 'email';
    protected $allowedFields = ['pass'];

}