<?php

namespace Database\Seeders;

use App\Models\Produccion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProduccionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Produccion::create([
            'id_vaca' => 1,
            'tipo_produccion' => 'carne',
            'cantidad' => 39.5,
            'fecha' => now()

        ]);

        Produccion::create([
            'id_vaca' => 2,
            'tipo_produccion' => 'leche',
            'cantidad' => 22.5,
            'fecha' => now()

        ]);

        Produccion::create([
            'id_vaca' => 1,
            'tipo_produccion' => 'leche',
            'cantidad' => 56.1,
            'fecha' => now()

        ]);
    }
}
