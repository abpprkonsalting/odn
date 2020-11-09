<?php

namespace App\Repositories;

use App\Models\Languages;
use App\Repositories\BaseRepository;

/**
 * Class LanguagesRepository
 * @package App\Repositories
 * @version November 6, 2020, 9:50 pm UTC
*/

class LanguagesRepository extends BaseRepository
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
        return Languages::class;
    }
}
