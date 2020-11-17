<?php

namespace App\Repositories;

use App\Models\FamilyInformation;
use App\Repositories\BaseRepository;

/**
 * Class FamilyInformationRepository
 * @package App\Repositories
 * @version November 15, 2020, 9:17 pm UTC
*/

class FamilyInformationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'personal_informations_id',
        'full_name',
        'next_of_kins_id',
        'birth_date',
        'family_status',
        'same_address_as_marine',
        'provinces_id',
        'municipalities_id',
        'phone_number',
        'address'
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
        return FamilyInformation::class;
    }
}
