<?php

namespace App\Repositories;

use App\Models\LicenseEndorsementType;
use App\Repositories\BaseRepository;

/**
 * Class LicenseEndorsementTypeRepository
 * @package App\Repositories
 * @version December 2, 2020, 1:59 pm UTC
*/

class LicenseEndorsementTypeRepository extends BaseRepository
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
        return LicenseEndorsementType::class;
    }
}
