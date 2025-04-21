<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(UsuariosTableSeeder::class);
        $this->call(GanadoTableSeeder::class);
        $this->call(AlimentacionTableSeeder::class);
        $this->call(HistorialMedicoTableSeeder::class);
        $this->call(TratamientosTableSeeder::class);
        $this->call(VentasTableSeeder::class);
        $this->call(PublicacionesTableSeeder::class);
        $this->call(ReportesTableSeeder::class);
        $this->call(ProduccionTableSeeder::class);
        $this->call(VentasGanadoTableSeeder::class);
    }
}
