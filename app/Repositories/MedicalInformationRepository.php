<?php

namespace App\Repositories;

use App\Models\MedicalInformation;
use App\Repositories\BaseRepository;

/**
 * Class MedicalInformationRepository
 * @package App\Repositories
 * @version November 6, 2020, 9:13 pm UTC
*/

class MedicalInformationRepository extends BaseRepository
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
        return MedicalInformation::class;
    }
}
