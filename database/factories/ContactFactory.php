<?php

use Faker\Generator as Faker;

$factory->define(App\Contact::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'phone' => $faker->phoneNumber,
        'address' => $faker->streetAddress,
        'country' => $faker->country,
        'city' => $faker->city,
        'state' => $faker->state,
        'postal' => $faker->postcode,
    ];
});
