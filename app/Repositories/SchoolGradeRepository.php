<?php

namespace App\Repositories;

use App\Models\SchoolGrade;
use App\Repositories\BaseRepository;

/**
 * Class SchoolGradeRepository
 * @package App\Repositories
 * @version November 6, 2020, 8:50 pm UTC
*/

class SchoolGradeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'
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
        return SchoolGrade::class;
    }
}
