<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\LicenseEndorsement;
use Faker\Generator as Faker;

$factory->define(LicenseEndorsement::class, function (Faker $faker) {

    return [
        'number' => $faker->randomDigitNotNull,
        'issue_date' => $faker->word,
        'expiry_date' => $faker->word,
        'personal_informations_id' => $faker->randomDigitNotNull,
        'countries_id' => $faker->randomDigitNotNull,
        'license_endorsement_types_id' => $faker->randomDigitNotNull,
        'license_endorsement_names_id' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
