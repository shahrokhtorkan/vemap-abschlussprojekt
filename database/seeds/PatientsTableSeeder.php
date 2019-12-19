<?php

use App\Patient;
use App\User;
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
        foreach (range(1,35) as $index) {
            DB::table('patients')->insert([
                'firstname' => $faker->firstName,
                'lastname' => $faker->unique()->lastName,
                'svnr' => $faker->numerify('##########'),
                'email' => $faker->unique()->safeEmail,
                'address' => $faker->streetAddress,
                'plz' => $faker->postcode,
                'city' => $faker->cityName,
                'country' => 'Österreich',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }

        $user = User::findOrFail(2);
        $patient = Patient::findOrFail(1);
        $user->patient()->save($patient);
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
