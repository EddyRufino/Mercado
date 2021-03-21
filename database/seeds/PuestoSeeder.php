<?php

use Illuminate\Database\Seeder;

class PuestoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('puestos')->insert([
            'num_puesto' => '1 al 3',
            'cantidad_puesto' => '3',
            'medidas' => '12x5',
            'sisa' => '2',
            'sisa_diaria' => '6',
            'riesgo_exposicion' => 'Si',
            'ubicacion_id' => 1,
            'actividad_id' => 2,
            'user_id' => 1
        ]);

        DB::table('puestos')->insert([
            'num_puesto' => '4 al 6',
            'cantidad_puesto' => '3',
            'medidas' => '12x5',
            'sisa' => '2',
            'sisa_diaria' => '6',
            'riesgo_exposicion' => '',
            'ubicacion_id' => 2,
            'actividad_id' => 1,
            'user_id' => 2
        ]);

        DB::table('puestos')->insert([
            'num_puesto' => '6 al 10',
            'cantidad_puesto' => '4',
            'medidas' => '12x5',
            'sisa' => '0.50',
            'sisa_diaria' => '20',
            'riesgo_exposicion' => '',
            'ubicacion_id' => 3,
            'actividad_id' => 3,
            'user_id' => 3
        ]);

        DB::table('puestos')->insert([
            'num_puesto' => '10 al 11',
            'cantidad_puesto' => '2',
            'medidas' => '12x5',
            'sisa' => '2',
            'sisa_diaria' => '6',
            'riesgo_exposicion' => '',
            'ubicacion_id' => 2,
            'actividad_id' => 2,
            'user_id' => 4
        ]);

        DB::table('puestos')->insert([
            'num_puesto' => '12 al 13',
            'cantidad_puesto' => '2',
            'medidas' => '12x5',
            'sisa' => '2',
            'sisa_diaria' => '6',
            'riesgo_exposicion' => '',
            'ubicacion_id' => 2,
            'actividad_id' => 4,
            'user_id' => 5
        ]);

        DB::table('puestos')->insert([
            'num_puesto' => '14 al 17',
            'cantidad_puesto' => '4',
            'medidas' => '12x5',
            'sisa' => '2',
            'sisa_diaria' => '6',
            'riesgo_exposicion' => '',
            'ubicacion_id' => 1,
            'actividad_id' => 4,
            'user_id' => 6
        ]);
    }
}
