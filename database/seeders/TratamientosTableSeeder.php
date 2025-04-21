<?php

namespace Database\Seeders;

use App\Models\Tratamiento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TratamientosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tratamiento::create([
            'id_gestor' => 2,
            'id_historial' => 1,
            'descripcion' => 'Frotar la piel del animal con ...',
            'fecha_tratamiento' => '2020-08-16'

        ]);

        Tratamiento::create([
            'id_gestor' => 2,
            'id_historial' => 2,
            'descripcion' => 'Desinflamar aplicando la pomada...',
            'fecha_tratamiento' => '2022-01-26'

        ]);

        Tratamiento::create([
            'id_gestor' => 2,
            'id_historial' => 1,
            'descripcion' => 'Controlar el sangrado con el uso de...',
            'fecha_tratamiento' => '2022-05-11'

        ]);
    }
}
