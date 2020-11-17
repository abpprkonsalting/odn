<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Company;
use Faker\Generator as Faker;

$factory->define(Company::class, function (Faker $faker) {

    return [
        'personal_informations_id' => $faker->randomDigitNotNull,
        'company_name' => $faker->word,
        'current' => $faker->randomDigitNotNull,
        'vessel' => $faker->word,
        'sign_on_date' => $faker->word,
        'sign_off_date' => $faker->word,
        'dtw' => $faker->randomDigitNotNull,
        'gross_tonnage' => $faker->randomDigitNotNull,
        'engine_types_id' => $faker->randomDigitNotNull,
        'bph' => $faker->randomDigitNotNull,
        'power_kw' => $faker->randomDigitNotNull,
        'ranks_id' => $faker->randomDigitNotNull,
        'flags_id' => $faker->randomDigitNotNull,
        'total_salary' => $faker->word,
        'leave_pay' => $faker->word,
        'basic_salary' => $faker->word,
        'fix_over_time' => $faker->word,
        'contract_period' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
