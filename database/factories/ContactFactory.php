<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Contact;
use Faker\Generator as Faker;

$factory->define(Contact::class, function (Faker $faker) {
    return [
        'name' => $faker->firstName,
        'user_id' => 1,
        'category_id' => $faker->numberBetween(1, 3)
    ];
});
