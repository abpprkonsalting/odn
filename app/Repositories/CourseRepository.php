<?php

namespace App\Repositories;

use App\Models\Course;
use App\Repositories\BaseRepository;

/**
 * Class CourseRepository
 * @package App\Repositories
 * @version November 15, 2020, 7:14 pm UTC
*/

class CourseRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'personal_informations_id',
        'course_numbers_id',
        'country_id',
        'issue_date',
        'certificate_number'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Course::class;
    }
}
