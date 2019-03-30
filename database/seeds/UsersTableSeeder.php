<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Usuario con el rol editor
        $editor = User::create([
            'name' => 'editor',
            'email' => 'editor@correo.com',
            'password' => bcrypt('123')
        ]);

        $editor->assignRole('editor');

        // Usuario con el rol moderador
        $moderador = User::create([
            'name' => 'moderador',
            'email' => 'moderador@correo.com',
            'password' => bcrypt('123')
        ]);

        $moderador->assignRole('moderador');

        // Usuario con el rol super-admin
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@correo.com',
            'password' => bcrypt('123')
        ]);

        $admin->assignRole('super-admin');
    }
}
