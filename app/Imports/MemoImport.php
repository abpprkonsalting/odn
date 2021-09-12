<?php

namespace App\Imports;

use App\Models\Memo;
use App\Models\PersonalInformation;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Row;

class MemoImport implements OnEachRow, WithHeadingRow, WithChunkReading
{
    /**
    * @param Collection $collection
    */
    public function onRow(Row $row)
    {
        $row  = $row->toArray();
        $person = PersonalInformation::where(['external_file_number' => $row['exp']])->first();
        
        if($person != null) {
            Memo::create([
                'memo_date' => $this->transformDate($row['fec_nota'])->format("d-m-Y"),
                'note' => $row['nota'],
                'personal_informations_id' => $person->id
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
