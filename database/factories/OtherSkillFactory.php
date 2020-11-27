<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\OtherSkill;
use Faker\Generator as Faker;

$factory->define(OtherSkill::class, function (Faker $faker) {

    return [
        'personal_informations_id' => $faker->randomDigitNotNull,
        'skill_or_knowledge' => $faker->word,
        'place_or_school' => $faker->word,
        'knowledge_date' => $faker->word,
        'empirical' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
