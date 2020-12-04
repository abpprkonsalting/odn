<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ShoreExperiencie;
use Faker\Generator as Faker;

$factory->define(ShoreExperiencie::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'issue_date' => $faker->word,
        'expiry_date' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
