<?php

namespace App\Imports;

use App\Models\PersonalInformation;
use App\Models\SeamanBook;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Row;

class SeamanBookImport implements OnEachRow, WithHeadingRow, WithChunkReading
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function onRow(Row $row)
    {
        $row  = $row->toArray();
        $person = PersonalInformation::where(['external_file_number' => $row['sbexpdte']])->first();
        
        if($person != null && !empty($row['sbcontrol'])) {
            SeamanBook::create([
                'issue_date' => $this->transformDate($row['sbexpedido'])->format("d-m-Y"),
                'expiry_date' => $this->transformDate($row['sbvencimiento'])->format("d-m-Y"),
                'number' => $row['sbcontrol'],
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
