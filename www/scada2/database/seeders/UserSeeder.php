<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'username'     => 'Administrador',
            'nombre'       => 'Sr',
            'apellido'     => 'administrador',
            'email'        => 'administrador@gmail.com',
            'password'     => bcrypt('password'),
            'municipio_id' => null,
        ]);

        $role = Role::create(['name' => 'Administrador']);
        $role = Role::create(['name' => 'Ejecutor']);
        $role = Role::create(['name' => 'Monitorista']);

        $permissions = Permission::pluck('id', 'id')->all();
        $role->syncPermissions($permissions);
        $user->assignRole([1]);

        $user = User::create([
            'username'     => 'Ejecutor',
            'nombre'       => 'Sr',
            'apellido'     => 'ejecutor',
            'email'        => 'ejecutor@gmail.com',
            'password'     => bcrypt('password'),
            'municipio_id' => 1,
        ]);

        $user->assignRole([2]);

    }
}
