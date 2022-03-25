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
        $rank = Rank::where(['code' => $row['cargo']])->first();
        $vessel = Vessel::where(['code' => $row['buque']])->first();
        $status = Status::where(['code' => $row['ubica']])->first();

        if($person != null) {
            SeaGoingExperience::create([
                'personal_information_id' => $person->id,
                'rank_id' => $rank->id,
                'vessel_id' => $vessel->id,
                'statuse_id' => $status->id,
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
    public function transformDate($value, $format = 'd-m-y')
    {
        try {
            if(trim($value) != "**/**/**" && trim($value) != "") { 
                $fecha = \DateTime::createFromFormat($format, trim($value));
                if($fecha != false) {
                    return $fecha->format('Y-m-d');
                }
            }
        } catch (\ErrorException $e) {
            
        }
        
        return "";
    }
        
      
            

      
    
}
