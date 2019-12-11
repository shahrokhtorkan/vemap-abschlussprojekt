<?php

use App\Document;
use App\Patient;
use App\Permission;
use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleNames = [
            'patient',
            'assistant',
        ];

        foreach ($roleNames as $roleName) {
            $role = new Role();
            $role->name = $roleName;
            $role->save();
        }

        /* assign permissions and roles to variables for easier association: */

        $loginPermission = Permission::where('name','login')->first();
        $ownDataPermission = Permission::where('name', 'view-own-data')->first();
        $adminPatientPermission = Permission::where('name','admin-patient')->first();
        $adminCalendarPermission = Permission::where('name','admin-calendar')->first();
        $adminDocumentationPermission = Permission::where('name','admin-document')->first();

        $patientRole=Role::where('name', 'patient')->first();
        $assistantRole=Role::where('name', 'assistant')->first();

        /* associate permissions and roles: */

        $patientRole->permissions()->attach($loginPermission->id);
        $patientRole->permissions()->attach($ownDataPermission->id);

        $assistantRole->permissions()->attach($loginPermission->id);
        $assistantRole->permissions()->attach($adminPatientPermission->id);
        $assistantRole->permissions()->attach($adminCalendarPermission->id);
    }
}
