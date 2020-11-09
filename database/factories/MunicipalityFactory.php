<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Municipality;
use Faker\Generator as Faker;

$factory->define(Municipality::class, function (Faker $faker) {

    return [
        'province_id' => $faker->randomDigitNotNull,
        'name' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
