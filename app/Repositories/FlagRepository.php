<?php

namespace App\Repositories;

use App\Models\Flag;
use App\Repositories\BaseRepository;

/**
 * Class FlagRepository
 * @package App\Repositories
 * @version November 6, 2020, 9:35 pm UTC
*/

class FlagRepository extends BaseRepository
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
        return Flag::class;
    }
}
