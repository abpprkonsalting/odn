<?php

namespace App\Imports;

use App\Models\EyesColor;
use App\Models\HairColor;
use App\Models\Municipality;
use App\Models\OperationalInformation;
use App\Models\PersonalInformation;
use App\Models\PoliticalIntegration;
use App\Models\Province;
use App\Models\Rank;
use App\Models\SchoolGrade;
use App\Models\SkinColor;
use Maatwebsite\Excel\Row;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PersonImport implements OnEachRow, WithHeadingRow, WithChunkReading
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function onRow(Row $row)
    {
        //$rowIndex = $row->getIndex();
        $row  = $row->toArray();

        $municipality = Municipality::where(['code' => $row['municipio']])->first();

        $person = PersonalInformation::updateOrCreate(
            [
                'internal_file_number' => $row['exp']
            ],
            [
                'internal_file_number' => $row['exp'],
                'external_file_number' => $row['exp'],
                'full_name' => $row['nombre'],
                'id_number' => $row['cip'],
                'serial_number' => $row['cis'],
                'birthday' => $this->transformDate($row['fec_nac']), //Convertir a fecha
                'birthplace' => $row['lugar_nac'],
                'address' => $row['dir1'],
                'principal_phone' => $row['telefono_fijo'],
                'cell_phone' => $row['telefono_movil'],
                'secondary_phone' => $row['telefono'],
                'relevant_action' => $row['hechosrelev'],
                'sex' => $row['sexo'],
                'height' => !empty($row['talla']) ? floatval($row['talla']) * 100  : 0,
                'weight' => !empty($row['peso']) ? intval($row['peso']) : 0, //Convertir a entero
                'particular_sings' => $row['senas'], 
                'province_id' => $municipality->province_id, 
                'municipality_id' => $municipality->id, 
                'political_integration_id' => $this->getPoliticalIntegrationId($row['int_pol']),
                'eyes_color_id' => $this->getEyesColor($row['ojos']),
                'hair_color_id' => $this->getHairColorId($row['pelo']),
                'marital_status_id' => 1, //Default no selected
                'school_grade_id' => $this->getSchoolGradeId($row['escolaridad']), 
                'skin_color_id' => $this->getSkinColorId($row['piel'])
            ]
        );

        $personOperationalInformation = PersonalInformation::with('operationalInformation')->find($person->id);
        if($personOperationalInformation->operationalInformation === null) {
            $operationalInformation = new OperationalInformation();
            $operationalInformation->disponibility_date = $this->transformDate($row['fec_ing']);
            $operationalInformation->ranks_id = $this->getRankId($row['cargo']);
            $operationalInformation->statuses_id = $this->getStatusId($row['estatus']);
            $operationalInformation->description = $row['notas'];
            $personOperationalInformation->operationalInformation()->save($operationalInformation);
        } else {
            $personOperationalInformation->operationalInformation->update(
                [
                    'disponibility_date' => $this->transformDate($row['fec_ing']),
                    'ranks_id' => $this->getRankId($row['cargo']),
                    'statuses_id' => $this->getStatusId($row['estatus']),
                    'description' => $row['notas']
                ]
            );
        }
        /*echo "<pre>";
            print_r($operationalInformation);
            print_r([
                'internal_file_number' => $row['exp'],
                'external_file_number' => $row['exp'],
                'full_name' => $row['nombre'],
                'id_number' => $row['cip'],
                'serial_number' => $row['cis'],
                'birthday' => $this->transformDate($row['fec_nac']), //Convertir a fecha
                'birthplace' => $row['lugar_nac'],
                'address' => $row['dir1'],
                'principal_phone' => $row['telefono_fijo'],
                'cell_phone' => $row['telefono_movil'],
                'secondary_phone' => $row['telefono'],
                'relevant_action' => $row['hechosrelev'],
                'sex' => $row['sexo'],
                'height' => !empty($row['talla']) ? floatval($row['talla']) * 100  : 0,
                'weight' => !empty($row['peso']) ? intval($row['peso']) : 0, //Convertir a entero
                'particular_sings' => $row['senas'], 
                'province_id' => $municipality->province_id, 
                'municipality_id' => $municipality->id, 
                'political_integration_id' => $political_integration_id,
                'eyes_color_id' => $eyes_color_id,
                'hair_color_id' => $hair_color_id,
                'marital_status_id' => 1, //Default no selected
                'school_grade_id' => $school_grade_id, 
                'skin_color_id' => $skin_color_id
            ]);
        echo "</pre>";
        die;*/
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

    public function getEyesColor($eyes) 
    {
        $eyes_color_id = 1;
        if(!empty($eyes)) {
            $eyes_color_obj = EyesColor::firstOrCreate(
                ['name' => $eyes]
            );
            $eyes_color_id = $eyes_color_obj->id;
        }

        return $eyes_color_id;
    }

    public function getPoliticalIntegrationId($politicalIntegration) 
    {
        $political_integration_id = 1;
        if(!empty($politicalIntegration)) {
            $political_integration_obj = PoliticalIntegration::firstOrCreate(
                ['name' => $politicalIntegration],
                ['code' => $politicalIntegration]
            );
            $political_integration_id = $political_integration_obj->id;
        }

        return $political_integration_id;
    }

    public function getHairColorId($hairColor) 
    {
        $hair_color_id = 1;
        if(!empty($hairColor)) {
            $hair_color_obj = HairColor::firstOrCreate(
                ['name' => $hairColor]
            );
            $hair_color_id = $hair_color_obj->id;
        }

        return $hair_color_id;
    }

    public function getSkinColorId($skinColor) 
    {
        $skin_color_id = 1;
        if(!empty($skinColor)) {
            $skin_color_obj = SkinColor::firstOrCreate(
                ['name' => $skinColor]
            );
            $skin_color_id = $skin_color_obj->id;
        }

        return $skin_color_id;
    }

    public function getSchoolGradeId($schoolGrade) 
    {
        $school_grade_id = 3;
        $school_grade_obj = SchoolGrade::where(['code' => $schoolGrade])->first();
        if($school_grade_obj != null) {
            $school_grade_id = $school_grade_obj->id;
        }

        return $school_grade_id;
    }

    public function getRankId($rank) 
    {
        $ranks_id = 1;
        $rank_obj = Rank::where(['code' => $rank])->first();
        if($rank_obj != null) {
            $ranks_id = $rank_obj->id;
        }

        return $ranks_id;
    }

    public function getStatusId($status) 
    {
        $statuses_id = 1;
        $statuses_obj = Rank::where(['code' => $status])->first();
        if($statuses_obj != null) {
            $statuses_id = $statuses_obj->id;
        }

        return $statuses_id;
    }
}
