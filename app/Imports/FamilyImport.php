<?php

namespace App\Imports;

use App\Models\FamilyInformation;
use App\Models\PersonalInformation;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Row;

class FamilyImport implements OnEachRow, WithHeadingRow, WithChunkReading
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function onRow(Row $row)
    {
        //1 - Father
        //2 - Mother
        //3 - Brother
        //4 - Child
        //5 - Wife

        //familyInformations
        $row  = $row->toArray();
        $person = PersonalInformation::where(['external_file_number' => $row['exp']])->first();
        
        if ($person != null) {
            $familyInformation = [];
            //Father
            if(!empty($row['padre'])) {
                $familyInformation[] = new FamilyInformation([
                    'full_name' => $row["padre"],
                    'next_of_kins_id' => 1,
                    //'birth_date' => !empty($row['fechpadre']) ? $this->transformDate($row['fechpadre']) : "",
                    'address' => $row["dir"],
                    'same_address_as_marine' => false,
                    'family_status_id' => str_contains($row['padre'], 'DEAD') ? 2 : 1
                ]);
            }
            //Mother
            if(!empty($row['madre'])) {
                $familyInformation[] = new FamilyInformation([
                    'full_name' => $row["madre"],
                    'next_of_kins_id' => 2,
                    //'birth_date' => !empty($row['fechmadre']) ? $this->transformDate($row['fechmadre']) : "",
                    'address' => $row["dir1"],
                    'same_address_as_marine' => false,
                    'family_status_id' => str_contains($row['madre'], 'DEAD') ? 2 : 1
                ]);
            }
            //Wife
            if(!empty($row['esposa'])) {
                $familyInformation[] = new FamilyInformation([
                    'full_name' => $row["esposa"],
                    'next_of_kins_id' => 5,
                    //'birth_date' => !empty($row['fechesposa']) ? $this->transformDate($row['fechesposa']) : "",
                    'address' => $row["dir2"],
                    'same_address_as_marine' => false,
                    'family_status_id' => str_contains($row['esposa'], 'DEAD') ? 2 : 1
                ]);
            }
            //Child
            if(!empty($row['hijo1'])) {
                $familyInformation[] = new FamilyInformation([
                    'full_name' => $row["hijo1"],
                    'next_of_kins_id' => 4,
                    //'birth_date' => !empty($row['fech1']) ? $this->transformDate($row['fech1']) : "",
                    'address' => $row["dir3"],
                    'same_address_as_marine' => false,
                    'family_status_id' => str_contains($row['hijo1'], 'DEAD') ? 2 : 1
                ]);
            }
            //Child
            if(!empty($row['hijo2'])) {
                $familyInformation[] = new FamilyInformation([
                    'full_name' => $row["hijo2"],
                    'next_of_kins_id' => 4,
                    //'birth_date' => !empty($row['fech2']) ? $this->transformDate($row['fech2']) : "",
                    'address' => $row["dir4"],
                    'same_address_as_marine' => false,
                    'family_status_id' => str_contains($row['hijo2'], 'DEAD') ? 2 : 1
                ]);
            }
            //Child
            if(!empty($row['hijo3'])) {
                $familyInformation[] = new FamilyInformation([
                    'full_name' => $row["hijo3"],
                    'next_of_kins_id' => 4,
                    //'birth_date' => !empty($row['fech3']) ? $this->transformDate($row['fech3']) : "",
                    'address' => $row["dir5"],
                    'same_address_as_marine' => false,
                    'family_status_id' => str_contains($row['hijo3'], 'DEAD') ? 2 : 1
                ]);
            }
            //Child
            if(!empty($row['hijo4'])) {
                $familyInformation[] = new FamilyInformation([
                    'full_name' => $row["hijo4"],
                    'next_of_kins_id' => 4,
                    //'birth_date' => !empty($row['fech4']) ? $this->transformDate($row['fech4']) : "",
                    'address' => $row["dir6"],
                    'same_address_as_marine' => false,
                    'family_status_id' => str_contains($row['hijo4'], 'DEAD') ? 2 : 1
                ]);
            }
            //Child
            if(!empty($row['hijo5'])) {
                $familyInformation[] = new FamilyInformation([
                    'full_name' => $row["hijo5"],
                    'next_of_kins_id' => 4,
                    //'birth_date' => !empty($row['fech5']) ? $this->transformDate($row['fech5']) : "",
                    'address' => $row["dir7"],
                    'same_address_as_marine' => false,
                    'family_status_id' => str_contains($row['hijo5'], 'DEAD') ? 2 : 1
                ]);
            }

            if(!empty($familyInformation)) {
                $person->familyInformations()->saveMany($familyInformation);
            }
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
            try {
                return \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value);
                //return \Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value));
            } catch (\ErrorException $e) {
                return \Carbon\Carbon::createFromFormat($format, $value);
            }
        } catch (\Throwable $th) {
           return "";
        }
        
    }
}
