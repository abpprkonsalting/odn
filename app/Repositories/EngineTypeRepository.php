<?php

namespace App\Repositories;

use App\Models\EngineType;
use App\Repositories\BaseRepository;

/**
 * Class EngineTypeRepository
 * @package App\Repositories
 * @version November 6, 2020, 9:27 pm UTC
*/

class EngineTypeRepository extends BaseRepository
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
        return EngineType::class;
    }
}
