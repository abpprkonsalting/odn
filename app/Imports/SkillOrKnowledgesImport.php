<?php

namespace App\Imports;

use App\Models\SkillOrKnowledge;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SkillOrKnowledgesImport implements ToModel, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        return new SkillOrKnowledge([
            'name' => $row['descrp'],
            'code' => $row['orden']
        ]);
    }
}
