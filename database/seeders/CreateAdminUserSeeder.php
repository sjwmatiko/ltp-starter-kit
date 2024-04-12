<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userData = [
            'name' => 'Admin',
            'email' => 'admin@company.com',
            'username' => 'admin',
            'password' => 'admin123',
        ];

        $user = User::firstOrCreate(['email' => 'admin@company.com'], $userData);

        $role = Role::firstOrCreate(['name' => 'admin']);

        $user->assignRole([$role->id]);

        $permissions = Permission::pluck('id', 'id')->all();

        $role->syncPermissions($permissions);
    }
}
