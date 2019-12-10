<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Model;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'firstname' => $faker->firstName,
        'lastname' => $faker->lastName,
        'svnr' => $faker->unique()->svnr,
        'email' => $faker->email,
        'phone' => $faker->phone,
        'address' => $faker->address,
        'plz' => $faker->plz,
        'city' => $faker->city,
        'country' => $faker->country,
        'remember_token' => Str::random(10),
    ];
});
