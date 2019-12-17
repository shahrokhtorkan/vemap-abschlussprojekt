<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Appointment;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Appointment::class, function (Faker $faker) {
    return [
        'status' => $faker->randomElement(['available', 'reserved', 'confirmed']),
        'begin' => $faker->dateTimeBetween('+0 days', '+01 hours'),
        'end' => $faker->dateTimeBetween('+0 days', '+02 hours'),
        'patient_id' => '1',
        'user_id' => '1',
    ];
});
