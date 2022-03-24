<?php

namespace App\Imports;

use App\Models\VesselType;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Row;

class VesselTypeImport implements ToModel, WithHeadingRow
{
    /**
    * @param Collection  $collection     
    */
    public function model(array $row)
    {
        return new VesselType([
            'title' => $row['type']
        ]);
    }
}
