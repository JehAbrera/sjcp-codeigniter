<?php

namespace App\Models;

use CodeIgniter\Model;

class FaqsCont extends Model {

    protected $table = 'faqscont';
    protected $primaryKey = 'id';
    protected $allowedFields = ['question', 'answer'];

}