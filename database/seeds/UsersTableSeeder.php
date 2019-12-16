<?php

use App\Document;
use App\Patient;
use App\Permission;
use App\Role;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            'Assistant' => [
                'email' => 'assistant@example.com',
                'password' => 'assistant',
                'roles' => ['assistant'],
            ],
            'Patient' => [
                'email' => 'patient@example.com',
                'password' => 'patient',
                'roles' => ['patient'],
            ],
            'Admin' => [
                'email' => 'admin@example.com',
                'password' => 'admin',
                'roles' => ['assistant'],
            ],
            'Test' => [
                'email' => 'test.patientproject@gmail.com',
                'password' => 'patient',
                'roles' => ['patient'],
            ],
            'Shahrokh' => [
                'email' => 'shahrokh@example.com',
                'password' => 'shahrokh',
                'roles' => ['assistant'],
            ],
            'Lubomir' => [
                'email' => 'lubomir@example.com',
                'password' => 'lubomir',
                'roles' => ['assistant'],
            ],
            'Adnan' => [
                'email' => 'adnan@example.com',
                'password' => 'adnan',
                'roles' => ['assistant'],
            ],
        ];

        foreach ($users as $userName => $userData) {
            $user = new User();
            $user->name = $userName;
            $user->email = $userData['email'];
            $user->password = Hash::make($userData['password']);
            if(array_key_exists('patient', $userData)) {
                $patient = Patient::where('svnr', $userData['patient'])->firstOrFail();
                $user->patient()->associate($patient);
            }
            $user->save();
            foreach ($userData['roles'] as $userRoleName) {
                $user->addRole($userRoleName);
            }
        }
    }
}
