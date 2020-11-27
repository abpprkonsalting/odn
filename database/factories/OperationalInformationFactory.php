<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\OperationalInformation;
use Faker\Generator as Faker;

$factory->define(OperationalInformation::class, function (Faker $faker) {

    return [
        'personal_information_id' => $faker->randomDigitNotNull,
        'disponibility_date' => $faker->word,
        'ranks_id' => $faker->randomDigitNotNull,
        'statuses_id' => $faker->randomDigitNotNull,
        'description' => $faker->text,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
