<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Course;
use Faker\Generator as Faker;

$factory->define(Course::class, function (Faker $faker) {

    return [
        'personal_informations_id' => $faker->randomDigitNotNull,
        'course_numbers_id' => $faker->randomDigitNotNull,
        'country_id' => $faker->randomDigitNotNull,
        'issue_date' => $faker->word,
        'certificate_number' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
