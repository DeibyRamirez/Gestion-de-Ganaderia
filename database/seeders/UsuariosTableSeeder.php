<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Usuario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsuariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Deiby',
            'last_name' => 'Ramirez',
            'email' => 'deibyalejandroramirez13@gmail.com',
            'password' => '12345678',
            'telefono' => '3214567878',
            'direccion' => 'V. San Bernardino',
            'rol' => 'ganadero'
        ]);

        User::create([
            'name' => 'Alejandro',
            'last_name' => 'Galvis',
            'email' => 'alejandro@gmail.com',
            'password' => '87654321',
            'telefono' => '312414174',
            'direccion' => 'V. San Bernardino',
            'rol' => 'gestor'
        ]);

        User::create([
            'name' => 'The',
            'last_name' => 'Cheivz',
            'email' => 'thecheiviz13@gmail.com',
            'password' => '14252352',
            'telefono' => '3134152352',
            'direccion' => 'Cafe la Palma',
            'rol' => 'administrador'
        ]);
    }
}
