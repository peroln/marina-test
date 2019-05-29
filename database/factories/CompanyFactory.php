<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Company;
use Faker\Generator as Faker;

$factory->define(Company::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'email' => $faker->email,
        'logo' => $faker->imageUrl(100, 100),
        'website' => $faker->url,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
    ];
});
