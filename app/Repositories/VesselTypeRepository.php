<?php

namespace App\Repositories;

use App\Models\VesselType;
use App\Repositories\BaseRepository;

/**
 * Class VesselTypeRepository
 * @package App\Repositories
 * @version October 29, 2021, 12:10 pm UTC
*/

class VesselTypeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title'
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
        return VesselType::class;
    }
}
