<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;

class ManagerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Manager',
            'email' => 'manager@gmail.com',
            'password' => bcrypt('123123123'),
        ]);

        $role = Role::create(['name' => 'manager']);

        $role->givePermissionTo([
            'role-create',
            'role-edit',
            'role-delete',
            'product-list',
        ]);

        $user->assignRole([$role]); //assign user with role super admin
    }
}
