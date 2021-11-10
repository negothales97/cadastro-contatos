<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\PhoneNumber;
use Faker\Generator as Faker;

$factory->define(PhoneNumber::class, function (Faker $faker) {
    return [
        'number' => $faker->cellphoneNumber,
    ];
});
