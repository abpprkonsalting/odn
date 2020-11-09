<?php

namespace App\Repositories;

use App\Models\CourseNumber;
use App\Repositories\BaseRepository;

/**
 * Class CourseNumberRepository
 * @package App\Repositories
 * @version November 6, 2020, 9:10 pm UTC
*/

class CourseNumberRepository extends BaseRepository
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
        return CourseNumber::class;
    }
}
