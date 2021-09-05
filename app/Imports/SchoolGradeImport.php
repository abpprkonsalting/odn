<?php

namespace App\Imports;

use App\Models\SchoolGrade;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SchoolGradeImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new SchoolGrade([
            'name' => $row['descrip'],
            'code' => $row['cod']
        ]);
    }
}
