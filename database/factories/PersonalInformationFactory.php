<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\PersonalInformation;
use Faker\Generator as Faker;

$factory->define(PersonalInformation::class, function (Faker $faker) {

    return [
        'internal_file_number' => $faker->word,
        'external_file_number' => $faker->word,
        'full_name' => $faker->word,
        'id_number' => $faker->word,
        'serial_number' => $faker->word,
        'birthday' => $faker->word,
        'birthplace' => $faker->word,
        'province_id' => $faker->randomDigitNotNull,
        'municipality_id' => $faker->randomDigitNotNull,
        'address' => $faker->word,
        'political_integration_id' => $faker->word,
        'principal_phone' => $faker->word,
        'secondary_phone' => $faker->word,
        'cell_phone' => $faker->word,
        'relevant_action' => $faker->text,
        'skin_color' => $faker->word,
        'sex' => $faker->word,
        'eyes_color_id' => $faker->randomDigitNotNull,
        'hair_color_id' => $faker->randomDigitNotNull,
        'height' => $faker->word,
        'weight' => $faker->word,
        'particular_sings' => $faker->word,
        'email' => $faker->word,
        'marital_status_id' => $faker->randomDigitNotNull,
        'school_grade_id' => $faker->randomDigitNotNull,
        'avatar' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
