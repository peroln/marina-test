<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Employee;
use Faker\Generator as Faker;

$factory->define(Employee::class, function (Faker $faker) {
    return [
        'First name' => $faker->firstName,
        'last name' => $faker->lastName,
        'Company' => function(){
        return factory(App\Company::class)->create()->id;
        },
        'email' => $faker->email,
        'phone' => $faker->phoneNumber,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
    ];
});
