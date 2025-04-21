<?php

namespace Database\Seeders;

use App\Models\Alimentacion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AlimentacionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Alimentacion::create([
            'id_vaca' => 1,
            'plan_alimenticio' => 'Debe comer Pasto con...',
            'fecha_inicio' => '2024-09-12',
            'fecha_fin' => '2025-11-01'
        ]);

        Alimentacion::create([
            'id_vaca' => 2,
            'plan_alimenticio' => 'Debe comer lechuga con...',
            'fecha_inicio' => '2024-12-12',
            'fecha_fin' => '2025-10-10'
        ]);

        Alimentacion::create([
            'id_vaca' => 3,
            'plan_alimenticio' => 'Debe tomar agua con...',
            'fecha_inicio' => '2025-11-01',
            'fecha_fin' => '2026-06-01'
        ]);
    }
}
