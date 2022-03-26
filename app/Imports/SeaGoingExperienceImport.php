<?php

namespace App\Imports;

use App\Models\SeaGoingExperience;
use App\Models\PersonalInformation;
use App\Models\Rank;
use App\Models\Vessel;
use App\Models\Status;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Row;

class SeaGoingExperienceImport implements OnEachRow, WithHeadingRow, WithChunkReading
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
        
        if($person != null) {
            $rank = Rank::where(['code' => $row['cargo']])->first();
            $vessel = Vessel::where(['code' => $row['buque']])->first();
            $status = Status::where(['code' => $row['ubica']])->first();

            SeaGoingExperience::create([
                'personal_information_id' => $person != null ? $person->id : 1,
                'rank_id' => $rank != null ? $rank->id : 1,
                'vessel_id' =>$vessel != null ? $vessel->id : 1,
                'status_id' =>$status != null ? $status->id : 1,
                'start_date' => $this->transformDate($row['fecini']),
                'end_date' => $this->transformDate($row['fecter'])         
                

                
                
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
