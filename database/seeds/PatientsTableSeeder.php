<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Carbon;

class PatientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('de_AT');
        foreach (range(1,30) as $index) {
            DB::table('patients')->insert([
                'firstname' => $faker->firstName,
                'lastname' => $faker->lastName,
                'svnr' => $faker->numerify('##########'),
                'email' => $faker->email,
                'address' => $faker->streetAddress,
                'plz' => $faker->postcode,
                'city' => $faker->cityName,
                'country' => 'Österreich',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patients');
    }
}
