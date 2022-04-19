<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Vessel;
use Faker\Generator as Faker;

$factory->define(Vessel::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'code' => $faker->word,
        'companies_id' => $faker->randomDigitNotNull,
        'gross_tank' => $faker->randomDigitNotNull,
        'omi_number' => $faker->randomDigitNotNull,
        'active' => $faker->randomDigitNotNull,
        'dtw' => $faker->randomDigitNotNull,
        'engine' => $faker->randomDigitNotNull,
        'vessel_type_id' => $faker->randomDigitNotNull,
        'flags_id' => $faker->randomDigitNotNull,
        'machine_type' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
