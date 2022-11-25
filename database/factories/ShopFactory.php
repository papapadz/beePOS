<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Shop;
use Faker\Generator as Faker;

$factory->define(Shop::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'description' => $faker->text($maxNbChars = 50),
        'address' => $faker->address,
        'muncity_id' => 1,
        'num_employees' => 1,
        'business_type' => 1,
        'website' => 'fb.me/binarybee.solutions',
        'email' => $faker->email,
        'contact_no' => $faker->e164PhoneNumber,
    ];
});
