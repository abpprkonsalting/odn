<?php

namespace App\Repositories;

use App\Models\PersonalMedicalInformation;
use App\Repositories\BaseRepository;

/**
 * Class PersonalMedicalInformationRepository
 * @package App\Repositories
 * @version November 15, 2020, 7:44 pm UTC
*/

class PersonalMedicalInformationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'personal_informations_id',
        'medical_informations_id',
        'issue_date',
        'expiry_date'
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
        return PersonalMedicalInformation::class;
    }
}
