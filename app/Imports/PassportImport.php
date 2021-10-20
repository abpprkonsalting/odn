<?php

namespace App\Imports;

use App\Models\Passport;
use App\Models\PersonalInformation;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Row;

class PassportImport implements OnEachRow, WithHeadingRow, WithChunkReading
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function onRow(Row $row)
    {
        $row  = $row->toArray();
        $person = PersonalInformation::where(['external_file_number' => $row['exp']])->first();
        
        if($person != null && !empty($row['passnro'])) {
            Passport::create([
                'expedition_date' => $this->transformDate($row['fec_exp'])->format("d-m-Y"),
                'expiry_date' => $this->transformDate($row['fec_ven'])->format("d-m-Y"),
                'extension_date' => $this->transformDate($row['fec_pro'])->format("d-m-Y"),
                'no_passport' => $row['passnro'],
                'passport_group' => $row['grupo'],
                'personal_informations_id' => $person->id
            ]);
        }
    }

    public function chunkSize(): int
    {
        return 100;
    }

    /**
     * Transform a date value into a Carbon object.
     *
     * @return \Carbon\Carbon|null
     */
    public function transformDate($value, $format = 'Y-m-d')
    {
        try {
            return \Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value));
        } catch (\ErrorException $e) {
            return \Carbon\Carbon::createFromFormat($format, $value);
        }
    }
}
