<?php

namespace Database\Seeders;

use App\Models\VentaGanado;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VentasGanadoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        VentaGanado::create([
            'id_vaca' => 3,
            'id_vendedor' => 1,
            'id_comprador' => 1,
            'precio' => 1800,
            'fecha_venta' => now()
        ]);

        VentaGanado::create([
            'id_vaca' => 1,
            'id_vendedor' => 2,
            'id_comprador' => 3,
            'precio' => 2200,
            'fecha_venta' => now()
        ]);

        VentaGanado::create([
            'id_vaca' => 2,
            'id_vendedor' => 1,
            'id_comprador' => 2,
            'precio' => 4500,
            'fecha_venta' => now()
        ]);
    }
}
