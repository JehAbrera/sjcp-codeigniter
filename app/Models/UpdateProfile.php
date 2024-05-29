<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Libraries\Hash;

class UpdateProfile extends Model
{
    protected $db, $hash;

    public function __construct()
    {
        $this->db = db_connect();
        $this->hash = new Hash();
    }


    // View query //
    public function view()
    {
        $userInfo = [];
        $query = $this->db->table('liuser')
            ->select('*')
            ->where('email', session()->user)
            ->limit(1)
            ->get();

        // Retrieve the result
        $result = $query->getResult();

        if (!empty($result)) {
            array_push($userInfo, $result[0]->fn, $result[0]->mn, $result[0]->ln, $result[0]->email);
        }
        return $userInfo;
    }
    // Update query //
    public function updateProfile($fn, $mn, $ln)
    {
        $updateVal = [
            'fn' => $fn,
            'mn' => $mn,
            'ln' => $ln,
        ];
        $this->db->table('liuser')
            ->where('email', session()->user)
            ->update($updateVal);
        if ($this->db->affectedRows() > 0) {
            return true;
        }
        return false;
    }
    // Update for password only //
    public function changePass($pass)
    {
        $updateVal = [
            'pass' => $this->hash->hash($pass)
        ];
        $this->db->table('liuser')->where('email',session()->user)->update($updateVal);
        if ($this->db->affectedRows() > 0) {
            return true;
        }
        return false;
    }
    // Move account details to archive table //
    public function deleteAcc()
    {
        $userInfo = [];
        $query = $this->db->table('liuser')
        ->select('*')
        ->where('email', session()->user)
        ->limit(1)
        ->get();
        $result = $query->getResult();
        if (!empty($result)) 
        {
            array_push($userInfo, $result[0]->role, $result[0]->fn, $result[0]->mn, $result[0]->ln, $result[0]->email, $result[0]->pass);
        }
        $data = array
        (
            'role'    => strval($userInfo[0]),
            'fn'   => strval($userInfo[1]),
            'mn' => strval($userInfo[2]),
            'ln' => strval($userInfo[3]),
            'email' => strval($userInfo[4]),
            'pass' => strval($userInfo[5]),
        );
        $this->db->table('archacc')
            ->where('email', session()->user)
            ->limit(1)
            ->insert($data);
        $this -> db ->table('liuser') 
        -> where('email',session()->user)
        ->limit(1)
        -> delete();
        
    }

    // For update query - check if account change input is the same as save details //
    public function isEqual($data = [])
    {
        $old = $this->view();
        for ($i = 0; $i < count($data); $i++) {
            if ($data[$i] !== $old[$i]) {
                return false;
            }
        }
        return true;
    }
    // Some functions for password change //
    // Include checking if the old password is correct and if old and new password is not the same //
    // Check if old password is valid
    public function validOld($pass) {
        if ($this->getPass() == $this->hash->hash($pass)) {
            return true;
        }
        return false;
    }
    // Check if new password is same as the old
    public function validNew($pass) {
        if ($this->getPass() == $this->hash->hash($pass)) {
            return false;
        }
        return true;
    }
    // Reusable
    public function getPass() {
        $query = $this->db->table('liuser')
            ->select('pass')
            ->where('email', session()->user)
            ->limit(1)
            ->get();

        // Retrieve the result
        $result = $query->getRow();

        return $result->pass;
    }
}
