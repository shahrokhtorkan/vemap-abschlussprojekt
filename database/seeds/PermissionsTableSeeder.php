<?php

use App\Document;
use App\Patient;
use App\Permission;
use App\User;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissionNames = [
            'login',
            'view-own-data',
            'admin-patient',
            'admin-calendar',
            'admin-document'
        ];

        foreach ($permissionNames as $permissionName) {
            $permission = new Permission();
            $permission->name = $permissionName;
            $permission->save();
        }

    }
}
