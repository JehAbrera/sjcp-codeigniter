<?php

namespace App\Models;

use CodeIgniter\Model;

class UpdateProfile extends Model
{
    protected $db;

    public function __construct()
    {
        $this->db = db_connect();
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
    public function changePass()
    {
    }
    // Move account details to archive table //
    public function deleteAcc()
    {
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
}
