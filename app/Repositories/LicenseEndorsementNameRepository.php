<?php

namespace App\Repositories;

use App\Models\LicenseEndorsementName;
use App\Repositories\BaseRepository;

/**
 * Class LicenseEndorsementNameRepository
 * @package App\Repositories
 * @version December 2, 2020, 3:01 pm UTC
*/

class LicenseEndorsementNameRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'license_endorsement_types_id'
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
        return LicenseEndorsementName::class;
    }
}
