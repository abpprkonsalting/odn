<?php

namespace App\Imports;

use App\Models\OtherSkill;
use App\Models\PersonalInformation;
use App\Models\SkillOrKnowledge;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Row;

class OtherSkillsImport implements OnEachRow, WithHeadingRow, WithChunkReading
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function onRow(Row $row)
    {
        $row  = $row->toArray();
        $person = PersonalInformation::where(['external_file_number' => $row['conoexp']])->first();
        $skillOrKnowledge = SkillOrKnowledge::where(['code' => $row['conodesc']])->first();

        if($person != null && $skillOrKnowledge != null) {
            
            OtherSkill::create([
                'personal_informations_id' => $person->id,
                'skill_or_knowledge_id' => $skillOrKnowledge->id,
                'certificate' => $row['conotitulo'],
                'place_or_school' => $row['conolugar'],
                'knowledge_date' => $this->transformDate($row['conofecha'])->format("d-m-Y"),
                'empirical' => $row['conoemp'] == "SI" ? true : false,
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
