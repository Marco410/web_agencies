<?php

namespace Database\Seeders;

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name'=> 'Admin']);
        $role2 = Role::create(['name'=> 'Manager']);
        $role3 = Role::create(['name'=> 'Suscriptor']);

        Permission::create(['name' => 'admin.home'])->syncRoles([$role1,$role2]);

        Permission::create(['name' => 'admin.users'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.agencies'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'admin.agencies.add'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.agencies.edit'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'admin.agencies.delete'])->syncRoles([$role1,$role2]);

        Permission::create(['name' => 'admin.brands'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'admin.brands.add'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.brands.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.brands.delete'])->syncRoles([$role1]);

        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'apellido_p' => 'Autonavega',
            'password' =>bcrypt('1234567890'),
        ])->assignRole('Admin');

        User::create([
            'name' => 'Jose',
            'email' => 'jose@gmail.com',
            'apellido_p' => 'Perez',
            'password' =>bcrypt('1234567890'),
        ])->assignRole('Suscriptor');

    }
}
