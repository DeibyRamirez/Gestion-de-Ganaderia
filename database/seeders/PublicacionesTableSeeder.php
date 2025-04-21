<?php

namespace Database\Seeders;

use App\Models\Publicacion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PublicacionesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Publicacion::create([
            'id_ganadero' => 1,
            'tipo_producto' => 'leche',
            'descripcion' => 'Vendo litros de leche procesada y lista para distribución',
            'cantidad' => 45,
            'precio' => 49,
            'estado' => 'disponible',
            'fecha' => '2025-01-01'

        ]);

        Publicacion::create([
            'id_ganadero' => 1,
            'tipo_producto' => 'leche',
            'descripcion' => 'Vendo litro de leche procesada (deslactosada) y lista para distribución',
            'cantidad' => 34,
            'precio' => 78,
            'estado' => 'disponible',
            'fecha' => '2020-09-12'

        ]);

        Publicacion::create([
            'id_ganadero' => 1,
            'tipo_producto' => 'carne',
            'descripcion' => 'Vendo carne de res por kilo y lista para distribución',
            'cantidad' => 10,
            'precio' => 23,
            'estado' => 'disponible',
            'fecha' => '2024-11-01'

        ]);
    }
}
