<?php

namespace App\Repositories;

use App\Models\HairColor;
use App\Repositories\BaseRepository;

/**
 * Class HairColorRepository
 * @package App\Repositories
 * @version November 6, 2020, 8:30 pm UTC
*/

class HairColorRepository extends BaseRepository
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
        return HairColor::class;
    }
}
