<?php

namespace App\Repositories;

use App\Models\SkinColor;
use App\Repositories\BaseRepository;

/**
 * Class SkinColorRepository
 * @package App\Repositories
 * @version November 17, 2020, 11:50 pm UTC
*/

class SkinColorRepository extends BaseRepository
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
        return SkinColor::class;
    }
}
