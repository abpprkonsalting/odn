<?php

namespace App\Imports;

use App\Models\Flag;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class FlagsImport implements ToModel, WithHeadingRow
{
    /**
    * @param Collection  $collection     
    */
    public function model(array $row)
    {
        return new Flag([
            'name' => $row['pais']
            
        ]);
    
    }
}