<?php

namespace App\Imports;

use App\Models\Company;
use App\Models\CompanyMission;
use App\Models\CompanyType;
use App\Models\Flag;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Row;

class CompanyImport implements OnEachRow, WithHeadingRow, WithChunkReading
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function onRow(Row $row)
    {
        $row  = $row->toArray();

        //dd($row);

        $companyType = CompanyType::where(['code' => $row['navtipo']])->first();
        $companyMission = CompanyMission::where(['title' => strtoupper($row['codnav'])])->first();
        $flag = Flag::where(['name' => $row['pais']])->first();
 
        Company::create([
            'company_name' => $row['compania'],
            'flags_id' => $flag != null ? $flag->id : 16,
            'code' => $row['codcomp'],
            'description' => $row['datos'],
            'phone' => $row['telefononaviera'],
            'fax' => $row['fax'],
            'email' => $row['imail'],
            'contact' => $row['contacto'],
            'company_type_id' => $companyType != null ? $companyType->id : 1,
            'company_mission_id' => $companyMission != null ? $companyMission->id : 1
        ]);
    }

    public function chunkSize(): int
    {
        return 100;
    }
}
