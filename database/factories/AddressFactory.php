<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Address;
use Faker\Generator as Faker;

$factory->define(Address::class, function (Faker $faker) {
    return [
        'zip_code' => $faker->postcode,
        'street' => $faker->streetName,
        'number' => $faker->buildingNumber,
        'district' => $faker->cityPrefix,
        'city' => $faker->city,
        'uf' => $faker->stateAbbr,
    ];
});
