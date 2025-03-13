<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permisoAdmin = Permission::create(['name' => 'crear-usuarios-sistema']);
        $permisoProfe = Permission::create(['name' => 'administrar-tareas']);
        $permisoEstudi = Permission::create(['name' => 'ver-tareas']);
        $roleAdmin = Role::create(['name' => 'admin']);
        $roleProfe = Role::create(['name' => 'profesor']);
        $roleEstudi = Role::create(['name' => 'estudiante']);
        $roleAdmin->givePermissionTo($permisoAdmin);
        $roleProfe->givePermissionTo($permisoProfe);
        $roleEstudi->givePermissionTo($permisoEstudi);


        $user =User::create([
            'name'=> 'Julian Daza',
            'email'=> 'julian@gmail.com',
            'password'=> bcrypt('12345678'),
        ]);
        $user->assignRole('admin');

        $user =User::create([
            'name'=> 'Gomez',
            'email'=> 'gomez@gmail.com',
            'password'=> bcrypt('12345678'),
        ]);
        $user->assignRole('profesor');

        $user =User::create([
            'name'=> 'Juan',
            'email'=> 'juan@gmail.com',
            'password'=> bcrypt('12345678'),
        ]);
        $user->assignRole('estudiante');

        $user =User::create([
            'name'=> 'Jose',
            'email'=> 'jose@gmail.com',
            'password'=> bcrypt('12345678'),
        ]);
        $user->assignRole('estudiante');

        $user =User::create([
            'name'=> 'Alberto',
            'email'=> 'alberto@gmail.com',
            'password'=> bcrypt('12345678'),
        ]);
        $user->assignRole('estudiante');

    }
}
