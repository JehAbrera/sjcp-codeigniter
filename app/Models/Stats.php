<?php

namespace App\Models;

use Codeigniter\Model;

class Stats extends Model
{

    public function findCount($table, ?array $values = null, ?array $notValues = null)
    {
        $builder = $this->db
            ->table($table);

        if (!empty($values)) {
            foreach ($values as $column => $value) {
                $builder->where($column, $value);
            }
        }
        if (!empty($notValues)) {
            foreach ($notValues as $column => $value) {
                if (is_array($value)) {
                    $builder->whereNotIn($column, $value);
                } else {
                    $builder->where("{$column} !=", $value);
                }
            }
        }

        $builder->select('COUNT(*) as total');
        $query = $builder->get();
        $result = $query->getRow();
        return $result->total;
    }
}
