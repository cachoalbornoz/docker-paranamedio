<?php

namespace Database\Seeders;

use App\Models\Municipio;
use Illuminate\Database\Seeder;

class MunicipioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Municipio::firstOrCreate([
            'nombre'       => 'Municipalidad de Parana',
            'contacto'     => 'Juan Carlos Garcia',
            'localidad_id' => 2548, // Parana
        ]);

        Municipio::firstOrCreate([
            'nombre'       => 'Municipalidad de La Paz',
            'contacto'     => 'Mariana Lopez',
            'localidad_id' => 2510, // La Paz
        ]);
    }
}
