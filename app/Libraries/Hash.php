<?php

namespace App\Libraries;

class Hash {

    // Hash passwords here //
    public function hash($value) {
        return hash('sha256', $value);
    }
    
}