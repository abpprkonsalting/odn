<?php

namespace App\Imports;

use App\Models\SeaGoingExperence;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SeaGoingExperenceImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new SeaGoingExperence([
            //

        ]);
    }
}
