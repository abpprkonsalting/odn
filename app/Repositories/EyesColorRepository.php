<?php

namespace App\Repositories;

use App\Models\EyesColor;
use App\Repositories\BaseRepository;

/**
 * Class EyesColorRepository
 * @package App\Repositories
 * @version November 6, 2020, 6:07 pm UTC
*/

class EyesColorRepository extends BaseRepository
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
        return EyesColor::class;
    }
}
