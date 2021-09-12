<?php

namespace App\Imports;

use App\Models\Country;
use App\Models\Course;
use App\Models\CourseNumber;
use App\Models\PersonalInformation;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Row;

class CourseImport implements OnEachRow, WithHeadingRow, WithChunkReading
{
    /**
    * @param Collection $collection
    */
    public function onRow(Row $row)
    {
        $row  = $row->toArray();

        $person = PersonalInformation::where(['external_file_number' => $row['exp']])->first();
        
        if($person != null) {
            $course = CourseNumber::where(['code' => $row['curso']])->first();
            $country = Country::where(['name' => $row['lugar_expedicion']])->first();

            $course = Course::create([
                'personal_informations_id' => $person->id,
                'course_numbers_id' => $course != null ? $course->id : 1,
                'country_id' => $country != null ? $country->id : 26, //26 -> CUBA
                'start_date' => $this->transformDate($row['fecini'])->format("d-m-Y"),
                'end_date' => $this->transformDate($row['fecter'])->format("d-m-Y"),
                'certificate_number' => $row['numcertificado'],
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
