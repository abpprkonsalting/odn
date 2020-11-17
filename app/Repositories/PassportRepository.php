<?php

namespace App\Repositories;

use App\Models\Passport;
use App\Repositories\BaseRepository;

/**
 * Class PassportRepository
 * @package App\Repositories
 * @version November 15, 2020, 8:22 pm UTC
*/

class PassportRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'personal_informations_id',
        'expedition_date',
        'expiry_date',
        'extension_date',
        'no_passport'
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
        return Passport::class;
    }
}
