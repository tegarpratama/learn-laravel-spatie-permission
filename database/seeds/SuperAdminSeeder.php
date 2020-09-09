<?php

use Illuminate\Database\Seeder;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Super Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123123123'),
        ]);

        $role = Role::create(['name' => 'super admin']); // create role super admin
        $permissions = Permission::pluck('id')->all(); //get all permission
        $role->syncPermissions($permissions); //sync super admin with all permission
        $user->assignRole([$role]); //assign user with role super admin
    }
}
