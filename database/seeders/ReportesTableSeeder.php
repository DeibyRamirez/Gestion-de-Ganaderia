<?php

namespace Database\Seeders;

use App\Models\Reporte;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReportesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Reporte::create([
            'id_gestor' => 3,
            'descripcion' => 'Estas ventas estan siendo  muy buenas este mes...',
            'fecha_reporte' => now()
        ]);

        Reporte::create([
            'id_gestor' => 3,
            'descripcion' => 'Estas ventas estan siendo  muy suaves este mes...',
            'fecha_reporte' => now()
        ]);

        Reporte::create([
            'id_gestor' => 3,
            'descripcion' => 'Las compras de ganado fueron exitosamente aceptadas, y ahora tenemos un nuevo socio para las ventas de este mes...',
            'fecha_reporte' => now()
        ]);
    }
}
