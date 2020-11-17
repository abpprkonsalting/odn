<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\PersonalMedicalInformation;
use Faker\Generator as Faker;

$factory->define(PersonalMedicalInformation::class, function (Faker $faker) {

    return [
        'personal_informations_id' => $faker->randomDigitNotNull,
        'medical_informations_id' => $faker->randomDigitNotNull,
        'issue_date' => $faker->word,
        'expiry_date' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
