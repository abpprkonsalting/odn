<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\FamilyInformation;
use Faker\Generator as Faker;

$factory->define(FamilyInformation::class, function (Faker $faker) {

    return [
        'personal_informations_id' => $faker->randomDigitNotNull,
        'full_name' => $faker->word,
        'next_of_kins_id' => $faker->randomDigitNotNull,
        'birth_date' => $faker->word,
        'family_status' => $faker->word,
        'same_address_as_marine' => $faker->randomDigitNotNull,
        'provinces_id' => $faker->randomDigitNotNull,
        'municipalities_id' => $faker->randomDigitNotNull,
        'phone_number' => $faker->word,
        'address' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
