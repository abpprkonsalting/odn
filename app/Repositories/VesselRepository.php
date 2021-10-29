<?php

namespace App\Repositories;

use App\Models\Vessel;
use App\Repositories\BaseRepository;

/**
 * Class VesselRepository
 * @package App\Repositories
 * @version October 28, 2021, 4:57 pm UTC
*/

class VesselRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'code',
        'company_id',
        'active',
        'dtw',
        'engine',
        'vessel_type_id',
        'flags_id',
        'machine_type'
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
        return Vessel::class;
    }
}
