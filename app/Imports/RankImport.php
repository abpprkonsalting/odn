<?php

namespace App\Imports;

use App\Models\Rank;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class RankImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Rank([
            'name' => $row['descrip'],
            'code' => $row['cargo']
        ]);
    }
}
