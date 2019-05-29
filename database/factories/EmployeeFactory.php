<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Employee;
use Faker\Generator as Faker;

$factory->define(Employee::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'company_id' => function(){
        return factory(App\Company::class)->create()->id;
        },
        'email' => $faker->email,
        'phone' => $faker->phoneNumber,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
    ];
});
