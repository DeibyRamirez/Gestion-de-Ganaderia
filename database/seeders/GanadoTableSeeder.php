<?php

namespace Database\Seeders;

use App\Models\Ganado;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GanadoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ganado::create([
            
            'id_ganadero' => 1,
            'nombre' => 'Camada',
            'raza' => 'Holstein',
            'edad' => 3,
            'tipo' => 'carne',
            'fecha_nacimiento' => '2021-03-12'
        ]);

        Ganado::create([
            
            'id_ganadero' => 1,
            'nombre' => 'Macvac',
            'raza' => 'Holstein',
            'edad' => 5,
            'tipo' => 'carne',
            'fecha_nacimiento' => '2019-03-24'
        ]);

        Ganado::create([
            
            'id_ganadero' => 1,
            'nombre' => 'Sara',
            'raza' => 'Holstein',
            'edad' => 2,
            'tipo' => 'leche',
            'fecha_nacimiento' => '2020-07-11'
        ]);
    }
}
