<?php

namespace App\Repositories;

use App\Models\LicenseEndorsement;
use App\Repositories\BaseRepository;

/**
 * Class LicenseEndorsementRepository
 * @package App\Repositories
 * @version December 2, 2020, 3:37 pm UTC
*/

class LicenseEndorsementRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'number',
        'issue_date',
        'expiry_date',
        'personal_informations_id',
        'countries_id',
        'license_endorsement_types_id',
        'license_endorsement_names_id'
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
        return LicenseEndorsement::class;
    }
}
