<?php

namespace App\Models;

use CodeIgniter\Model;

class SetReservation extends Model
{
    protected $db;

    public function __construct()
    {
        $this->db = db_connect();
    }

    public function setinAllevents($refN, $name, $email, $apDate, $apTime, $evDate, $evTSt, $evTEd, $type, $status){

         // Prepare the Query
         $pQuery = $this->db->prepare(static function ($db) {
            return $db->table('allevents')->insert([
                'id'    => '1',
                'refN'   => 'b',
                'name' => 'c',
                'email' => 'd',
                'apDate' => 'e',
                'apTime' => 'f',
                'evDate' => 'f',
                'evTSt' => 'f',
                'evTEd' => 'f',
                'type' => 'f',
                'status' => 'f',
                'reason' => 'd'
            ]);
        });
        // Run the Query
        $results = $pQuery->execute('', $refN, $name, $email, $apDate, $apTime, $evDate, $evTSt, $evTEd, $type, $status, '');
        return true;
    }

    public function setinWedDet($forId, $evDate, $evTSt, $evTEd, $gln, $gfn, $gmn, $gcn, $gdob, $gpob, $gadd, $gfather, $gmother, $grelig, $gid, $gpsa, $gcen, $gbapcert, $gconcert, $bln, $bfn, $bmn, $bcn, $bdob, $bpob, $badd, $bfather, $bmother, $brelig, $bid, $bpsa, $bcen, $bbapcert, $bconcert, $cml)
    {
        // Prepare the Query
        $pQuery = $this->db->prepare(static function ($db) {
            return $db->table('weddet')->insert([
                'wedID' => '1',
                'forID' => 'b',
                'date' => 'c',
                'tSt' => 'd',
                'tEd' => 'e',
                'gFn' => 'f',
                'gMn' => 'f',
                'gLn' => 'f',
                'gNum' => 'f',
                'gDob' => 'f',
                'gPob' => 'f',
                'gAddr' => 'd',
                'gFat' => 'f',
                'gMot' => 'f',
                'gRel' => 'f',
                'gID' => 'f',
                'gPSA' => 'f',
                'gCEN' => 'f',
                'gBapC' => 'd',
                'gConC' => 'd',
                'bFn' => 'f',
                'bMn' => 'f',
                'bLn' => 'f',
                'bNum' => 'f',
                'bDob' => 'f',
                'bPob' => 'f',
                'bAddr' => 'd',
                'bFat' => 'f',
                'bMot' => 'f',
                'bRel' => 'f',
                'bID' => 'f',
                'bPSA' => 'f',
                'bCEN' => 'f',
                'bBapC' => 'd',
                'bConC' => 'd',
                'coupCont' => 'd'
            ]);
        });
        // Run the Query
        $results = $pQuery->execute('', $forId, $evDate, $evTSt, $evTEd, $gln, $gfn, $gmn, $gcn, $gdob, $gpob, $gadd, $gfather, $gmother, $grelig, $gid, $gpsa, $gcen, $gbapcert, $gconcert, $bln, $bfn, $bmn, $bcn, $bdob, $bpob, $badd, $bfather, $bmother, $brelig, $bid, $bpsa, $bcen, $bbapcert, $bconcert, $cml);
        return true;
    }

    public function setinBapDet($forId, $evDate, $evTSt, $evTEd, $fn, $mn, $ln, $gender, $dob, $pob, $add, $contact, $father, $fatherpob, $mother, $motherpob, $marriage, $gfather, $gfatherAdd, $gmother, $gmotherAdd)
    {
        // Prepare the Query
        $pQuery = $this->db->prepare(static function ($db) {
            return $db->table('bapdet')->insert([
                'bapID' => '1',
                'forID' => 'b',
                'date' => 'c',
                'tSt' => 'd',
                'tEd' => 'e',
                'fn' => 'f',
                'mn' => 'f',
                'ln' => 'f',
                'gender' => 'f',
                'dob' => 'f',
                'pob' => 'f',
                'addr' => 'f',
                'num' => 'd',
                'fatN' => 'f',
                'fatPob' => 'f',
                'motN' => 'f',
                'motPob' => 'f',
                'mgrTp' => 'f',
                'gfatN' => 'f',
                'gfatAd' => 'd',
                'gmotN' => 'd',
                'gmotAd' => 'f',
                'PSA' => 'f',
                'marCont' => 'f',
            ]);
        });
        // Run the Query
        $results = $pQuery->execute('', $forId, $evDate, $evTSt, $evTEd, $fn, $mn, $ln, $gender, $dob, $pob, $add, $contact, $father, $fatherpob, $mother, $motherpob, $marriage, $gfather, $gfatherAdd, $gmother, $gmotherAdd, '', '');
        return true;
    }

    public function setinFunDet($forId, $evDate, $evTSt, $evTEd, $fn, $mn, $ln, $gender, $dod, $age, $cod, $doi, $cemetery, $ifn, $imn, $iln, $num, $add, $sacrament, $burial)
    {
        // Prepare the Query
        $pQuery = $this->db->prepare(static function ($db) {
            return $db->table('fundet')->insert([
                'funID' => '1',
                'forID' => 'b',
                'date' => 'c',
                'tSt' => 'd',
                'tEd' => 'e',
                'fn' => 'f',
                'mn' => 'f',
                'ln' => 'f',
                'gender' => 'f',
                'dDate' => 'f',
                'age' => 'f',
                'dCause' => 'f',
                'intDate' => 'd',
                'cem' => 'd',
                'infFn' => 'f',
                'infMn' => 'f',
                'infLn' => 'f',
                'num' => 'f',
                'addr' => 'f',
                'sacr' => 'f',
                'burial' => 'd',
                'dCert' => 'd',
            ]);
        });
        // Run the Query
        $results = $pQuery->execute('', $forId, $evDate, $evTSt, $evTEd, $fn, $mn, $ln, $gender, $dod, $age, $cod, $doi, $cemetery, $ifn, $imn, $iln, $num, $add, $sacrament, $burial, '');
        return true;
    }

    public function setinMassDet($forId, $num, $evDate, $evTSt, $purpose, $names)
    {
        // Prepare the Query
        $pQuery = $this->db->prepare(static function ($db) {
            return $db->table('mintdet')->insert([
                'mIntID' => '1',
                'forID' => 'b',
                'num' => 'c',
                'date' => 'd',
                'time' => 'e',
                'purpose' => 'f',
                'name' => 'f'
            ]);
        });
        // Run the Query
        $results = $pQuery->execute('', $forId, $num, $evDate, $evTSt, $purpose, $names);
        return true;
    }

    public function setinBlessdet($forId, $num, $evDate, $evTSt, $purpose, $add)
    {
        // Prepare the Query
        $pQuery = $this->db->prepare(static function ($db) {
            return $db->table('blsdet')->insert([
                'blsID' => '1',
                'forID' => 'b',
                'num' => 'c',
                'date' => 'd',
                'time' => 'e',
                'type' => 'f',
                'addr' => 'f'
            ]);
        });
        // Run the Query
        $results = $pQuery->execute('', $forId, $num, $evDate, $evTSt, $purpose, $add);
        return true;
    }

    public function setinDocudet($forId, $evDate, $type, $fn, $mn, $ln, $dob, $fatN, $motN, $num, $purp, $addr, $birthC, $brgyC, $kawanC)
    {
        // Prepare the Query
        $pQuery = $this->db->prepare(static function ($db) {
            return $db->table('docreqdet')->insert([
                'drID' => '1',
                'forID' => 'b',
                'date' => 'd',
                'type' => 'f',
                'fn' => 'e',
                'mn' => 'f',
                'ln' => 'f',
                'dob' => 'f',
                'fatN' => 'f',
                'motN' => 'f',
                'num' => 'f',
                'purp' => 'f',
                'addr' => 'f',
                'birthC' => 'f',
                'brgyC' => 'f',
                'kawanC' => 'f'
            ]);
        });
        // Run the Query
        $results = $pQuery->execute('', $forId, $evDate, $type, $fn, $mn, $ln, $dob, $fatN, $motN, $num, $purp, $addr, $birthC, $brgyC, $kawanC);
        return true;
    }


    public function getLastId(){
        // Build the SELECT query using CodeIgniter's Query Builder
        $query = $this->db->table('allevents')
            ->select('id')
            ->limit(1)
            ->orderBy('id',"DESC")
            ->get();
        // Retrieve the result
        $result = $query->getResultArray();
        return $result;
    }
}

?>