<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\SeamanBook;
use Faker\Generator as Faker;

$factory->define(SeamanBook::class, function (Faker $faker) {

    return [
        'number' => $faker->word,
        'issue_date' => $faker->word,
        'expiry_date' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
