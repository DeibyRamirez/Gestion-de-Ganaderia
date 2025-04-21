<?php

namespace Database\Seeders;

use App\Models\Venta;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VentasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Venta::create([
            'id_vendedor' => 3,
            'id_comprador' => 1,
            'producto' => 'leche',
            'cantidad' => 3 ,
            'precio' => 30000,
            'fecha_venta' => '2023-11-04'
        ]);

        Venta::create([
            'id_vendedor' => 3,
            'id_comprador' => 2,
            'producto' => 'leche',
            'cantidad' => 10 ,
            'precio' => 23000,
            'fecha_venta' => '2025-09-22'
        ]);

        Venta::create([
            'id_vendedor' => 3,
            'id_comprador' => 2,
            'producto' => 'carne',
            'cantidad' => 60 ,
            'precio' => 69000,
            'fecha_venta' => '2025-04-07'
        ]);
    }
}
