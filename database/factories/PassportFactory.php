<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Passport;
use Faker\Generator as Faker;

$factory->define(Passport::class, function (Faker $faker) {

    return [
        'personal_informations_id' => $faker->randomDigitNotNull,
        'expedition_date' => $faker->word,
        'expiry_date' => $faker->word,
        'extension_date' => $faker->word,
        'no_passport' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
