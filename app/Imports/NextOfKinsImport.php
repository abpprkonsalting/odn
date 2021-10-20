<?php

namespace App\Imports;

use App\Models\NextOfKin;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class NextOfKinsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new NextOfKin([
            // 'name' => $row['descrip'],
            // 'code' => $row['cod'],
            // 'province_id' => $province->id,
        ]);
    }
}
