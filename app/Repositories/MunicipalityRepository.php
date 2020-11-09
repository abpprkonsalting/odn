<?php

namespace App\Repositories;

use App\Models\Municipality;
use App\Repositories\BaseRepository;

/**
 * Class MunicipalityRepository
 * @package App\Repositories
 * @version November 6, 2020, 5:59 pm UTC
*/

class MunicipalityRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'province_id',
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
        return Municipality::class;
    }
}
