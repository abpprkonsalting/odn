<?php

namespace App\Repositories;

use App\Models\Memo;
use App\Repositories\BaseRepository;

/**
 * Class MemoRepository
 * @package App\Repositories
 * @version November 15, 2020, 6:39 pm UTC
*/

class MemoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'personal_informations_id',
        'note',
        'memo_date'
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
        return Memo::class;
    }
}
