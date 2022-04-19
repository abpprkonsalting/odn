<?php

namespace App\Imports;

use App\Models\Company;
use App\Models\Flag;

use App\Models\Vessel;
use App\Models\VesselType;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Row;

class VesselImport implements OnEachRow, WithHeadingRow, WithChunkReading
{
    /**
    * @param Collection $collection
    */
    public function onRow(Row $row)
    {
        $key = explode("/", $row['key']);

        if(isset($key[1])) {

            $company = Company::where('code', $key[0])->first();

            if($company != null) {
                $flag = Flag::where('name', $row['flag'])->first();
                $vesselType = VesselType::where('title' , $row['type'])->first();
                

                Vessel::create([
                    'gross_tank' => $row['arqbruto'],
                    'omi_number' => is_numeric($row['numomi']) ? $row['numomi'] : null,
                    'companies_id' => $company->id,
                    'code' => $row['key'],
                    'name' => $row['descrip'],
                    'sign_on_date' => $this->transformDate($row['fec_alt']),
                    'sign_off_date' => $this->transformDate($row['fec_baj']),
                    'active' => $row['status'] == 'A' ? true : false,
                    'dwt' => $row['dwt'],
                    'engine' => $row['engine'],
                    'flags_id' => $flag != null ? $flag->id : null,
                    'vessel_type_id' => $vesselType->id,
                    'machine_type' => $row['tipomaq']
                ]);
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
