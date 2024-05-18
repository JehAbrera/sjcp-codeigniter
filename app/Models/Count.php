<?php

namespace App\Models;

use CodeIgniter\Model;

class Count extends Model {
    protected $db;
    public function __construct()
    {
        $this->db = db_connect();
    }

    // Return counts for graph values
    public function getCount ($table, $params = []) {
        if ($table == 'recwed' && !$params[0]) {
            return $this->db->table($table)->where("brel != grel")->countAllResults();
        } else if ($table == 'recwed' && $params[0]) {
            return $this->db->table($table)->where("brel = grel")->countAllResults();
        } else if ($table == 'allevents') {
            return $this->db->table($table)->where("apDate >= ", $params[0])->where("apDate <= ", $params[1])->countAllResults();
        } else {
            return $this->db->table($table)->where($params[0],$params[1])->countAllResults();
        }
    }

    // Query events for display in current and upcoming display

    public function getCurrent() {

    }

    public function getUpcoming() {

    }
}