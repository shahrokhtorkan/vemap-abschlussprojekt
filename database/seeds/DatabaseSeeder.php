<?php

use Illuminate\Database\Seeder;
use App\Patient;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PermissionsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(PatientsTableSeeder::class);
        $this->call(DocumentsTableSeeder::class);
        $this->call(AppointmentsTableSeeder::class);
    }
}
