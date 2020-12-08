<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Visa;
use Faker\Generator as Faker;

$factory->define(Visa::class, function (Faker $faker) {

    return [
        'visa_types_id' => $faker->randomDigitNotNull,
        'issue_date' => $faker->word,
        'expiry_date' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
