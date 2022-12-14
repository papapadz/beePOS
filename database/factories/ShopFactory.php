<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Shop;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Shop::class, function (Faker $faker) {

    $shop_name = $faker->company;

    $pass1 = preg_replace('/[#$%^&*()+=\-\[\]\';,.\/{}|":<>?~\\\\]/',"",$shop_name);
    $pass2 = preg_replace('[ ]',"_",$pass1);
    $shop_code = Str::camel(strtolower($pass2));
    return [
        'name' => $shop_name,
        'description' => $faker->text($maxNbChars = 50),
        'address' => $faker->address,
        'muncity_id' => 1,
        'num_employees' => 1,
        'business_type' => 1,
        'website' => 'fb.me/binarybee.solutions',
        'email' => $faker->email,
        'contact_no' => $faker->e164PhoneNumber,
        'shop_code' => $shop_code,
        'shop_logo' => $faker->imageUrl($width = 640, $height = 480)
    ];
});
