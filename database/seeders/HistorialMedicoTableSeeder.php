<?php

namespace Database\Seeders;

use App\Models\HistorialMedico;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HistorialMedicoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HistorialMedico::create([
            'id_vaca' => 1,
            'sintomas' => 'Nauseas, inchazon de ...',
            'diagnostico' => 'Desperto el 3 de abril con ..',
            'fecha_diagnostico' => '2024-04-22'
        ]);

        HistorialMedico::create([
            'id_vaca' => 2,
            'sintomas' => 'Dolor al pararce, creo que soo sus ...',
            'diagnostico' => 'Estuvo en un competicion de ...',
            'fecha_diagnostico' => '2022-04-23'
        ]);

        HistorialMedico::create([
            'id_vaca' => 3,
            'sintomas' => 'Golpe en la parte frontal del craneo ...',
            'diagnostico' => 'Fue sometida a una serie de golpes por causa de los fuertes climas ...',
            'fecha_diagnostico' => '2025-11-12'
        ]);
    }
}
