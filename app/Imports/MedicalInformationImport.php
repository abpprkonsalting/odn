<?php

namespace App\Imports;

use App\Models\PersonalInformation;
use App\Models\PersonalMedicalInformation;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Row;

class MedicalInformationImport implements OnEachRow, WithHeadingRow, WithChunkReading
{
     /**
    * @param Collection $collection
    */
    public function onRow(Row $row)
    {
        $row  = $row->toArray();
        $person = PersonalInformation::where(['external_file_number' => $row['expediente']])->first();
        
        if($person != null && ($row['fechinihapto'] != "" && $row['fechavencapto'] != "")) {
            PersonalMedicalInformation::create([
                'personal_informations_id' => $person->id,
                'medical_informations_id' => 1,
                'issue_date' => $this->transformDate($row['fechinihapto'])->format("d-m-Y"),
                'expiry_date' => $this->transformDate($row['fechavencapto'])->format("d-m-Y"),
            ]);
        }
        //
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
