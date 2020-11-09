<?php

namespace App\Repositories;

use App\Models\MaritalStatus;
use App\Repositories\BaseRepository;

/**
 * Class MaritalStatusRepository
 * @package App\Repositories
 * @version November 6, 2020, 8:44 pm UTC
*/

class MaritalStatusRepository extends BaseRepository
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
        return MaritalStatus::class;
    }
}
