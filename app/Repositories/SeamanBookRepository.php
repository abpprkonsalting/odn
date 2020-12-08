<?php

namespace App\Repositories;

use App\Models\SeamanBook;
use App\Repositories\BaseRepository;

/**
 * Class SeamanBookRepository
 * @package App\Repositories
 * @version December 4, 2020, 6:06 pm UTC
*/

class SeamanBookRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'number',
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
        return SeamanBook::class;
    }
}
