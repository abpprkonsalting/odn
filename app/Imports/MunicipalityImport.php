<?php

namespace App\Imports;

use App\Models\Municipality;
use App\Repositories\ProvinceRepository;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MunicipalityImport implements ToModel, WithHeadingRow
{
    
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $provinceRepository = new ProvinceRepository(app());
        $province = $provinceRepository->getProvinceByCode($row['provincia']);

        if($province == null) {
            return null;
        }

        return new Municipality([
            'name' => $row['descrip'],
            'code' => $row['cod'],
            'province_id' => $province->id,
        ]);
    }
}
