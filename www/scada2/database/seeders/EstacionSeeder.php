<?php

namespace Database\Seeders;

use App\Models\Estacion;
use Illuminate\Database\Seeder;

class EstacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Estacion::firstOrCreate([
            'nombre'       => '300 Viviendas',
            'direccion'    => 'Don Bosco y Gdor Maya',
            'latitud'      => '-31.744826',
            'longitud'     => '-60.455839',
            'foto'         => null,
            'foto_mapa'    => null,
            'es_bombeo'    => true,
            'es_cloacal'   => false,
            'es_defensa'   => false,
            'municipio_id' => 1,
        ]);

        Estacion::firstOrCreate([
            'nombre'       => 'Anacleto Medina',
            'direccion'    => 'Costanera Oeste y San Antonio María Gianelli',
            'latitud'      => '-31.744826',
            'longitud'     => '-60.455839',
            'foto'         => null,
            'foto_mapa'    => null,
            'es_bombeo'    => true,
            'es_cloacal'   => false,
            'es_defensa'   => false,
            'municipio_id' => 1,
        ]);
    }
}
