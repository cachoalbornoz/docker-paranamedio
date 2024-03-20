<?php

namespace Database\Seeders;

use App\Models\Localidad;
use Illuminate\Database\Seeder;

class LocalidadSeeder extends Seeder
{
    public function run()
    {
        $path           = (public_path('import/localidades_pais.csv'));
        $file           = fopen($path, 'r');
        $importData_arr = [];
        $i              = 0;

        while (($filedata = fgetcsv($file, 0, ';')) !== false) {
            $num = count($filedata);
            for ($c = 0; $c < $num; $c++) {
                $importData_arr[$i][] = $filedata[$c];
            }
            $i++;
        }
        fclose($file);

        foreach ($importData_arr as $importData) {

            Localidad::firstOrCreate([
                'id'           => $importData[0],
                'nombre'       => $importData[1],
                'departamento' => $importData[2],
                'provincia'    => $importData[3],
            ]);
        }
    }
}
