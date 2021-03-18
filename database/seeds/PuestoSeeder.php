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
            'num_puesto' => '1',
            'cantidad_puesto' => '3',
            'medidas' => '12x5',
            'sisa' => '2',
            'sisa_diaria' => '6',
            'riesgo_exposicion' => '',
            'ubicacion_id' => 1,
            'actividad_id' => 1,
            'user_id' => 1,
        ]);

        DB::table('puestos')->insert([
            'num_puesto' => '2',
            'cantidad_puesto' => '3',
            'medidas' => '12x5',
            'sisa' => '2',
            'sisa_diaria' => '6',
            'riesgo_exposicion' => '',
            'ubicacion_id' => 1,
            'actividad_id' => 1,
            'user_id' => 1,
        ]);

        DB::table('puestos')->insert([
            'num_puesto' => '3',
            'cantidad_puesto' => '3',
            'medidas' => '12x5',
            'sisa' => '2',
            'sisa_diaria' => '6',
            'riesgo_exposicion' => '',
            'ubicacion_id' => 1,
            'actividad_id' => 1,
            'user_id' => 1,
        ]);

        DB::table('puestos')->insert([
            'num_puesto' => '1',
            'cantidad_puesto' => '2',
            'medidas' => '12x5',
            'sisa' => '2',
            'sisa_diaria' => '6',
            'riesgo_exposicion' => '',
            'ubicacion_id' => 2,
            'actividad_id' => 2,
            'user_id' => 2,
        ]);

        DB::table('puestos')->insert([
            'num_puesto' => '2',
            'cantidad_puesto' => '2',
            'medidas' => '12x5',
            'sisa' => '2',
            'sisa_diaria' => '6',
            'riesgo_exposicion' => '',
            'ubicacion_id' => 2,
            'actividad_id' => 2,
            'user_id' => 2,
        ]);

        DB::table('puestos')->insert([
            'num_puesto' => '1',
            'cantidad_puesto' => '3',
            'medidas' => '12x5',
            'sisa' => '2',
            'sisa_diaria' => '6',
            'riesgo_exposicion' => '',
            'ubicacion_id' => 3,
            'actividad_id' => 3,
            'user_id' => 3,
        ]);

        DB::table('puestos')->insert([
            'num_puesto' => '2',
            'cantidad_puesto' => '3',
            'medidas' => '12x5',
            'sisa' => '2',
            'sisa_diaria' => '6',
            'riesgo_exposicion' => '',
            'ubicacion_id' => 3,
            'actividad_id' => 3,
            'user_id' => 3,
        ]);

        DB::table('puestos')->insert([
            'num_puesto' => '3',
            'cantidad_puesto' => '3',
            'medidas' => '12x5',
            'sisa' => '2',
            'sisa_diaria' => '6',
            'riesgo_exposicion' => '',
            'ubicacion_id' => 3,
            'actividad_id' => 3,
            'user_id' => 3,
        ]);

        DB::table('puestos')->insert([
            'num_puesto' => '1',
            'cantidad_puesto' => '1',
            'medidas' => '12x5',
            'sisa' => '2',
            'sisa_diaria' => '2',
            'riesgo_exposicion' => '',
            'ubicacion_id' => 3,
            'actividad_id' => 3,
            'user_id' => 4,
        ]);

        DB::table('puestos')->insert([
            'num_puesto' => '1',
            'cantidad_puesto' => '1',
            'medidas' => '12x5',
            'sisa' => '2',
            'sisa_diaria' => '3',
            'riesgo_exposicion' => '',
            'ubicacion_id' => 3,
            'actividad_id' => 3,
            'user_id' => 5,
        ]);

        DB::table('puestos')->insert([
            'num_puesto' => '1',
            'cantidad_puesto' => '4',
            'medidas' => '12x5',
            'sisa' => '2',
            'sisa_diaria' => '3',
            'riesgo_exposicion' => '',
            'ubicacion_id' => 3,
            'actividad_id' => 3,
            'user_id' => 6,
        ]);

        DB::table('puestos')->insert([
            'num_puesto' => '2',
            'cantidad_puesto' => '4',
            'medidas' => '12x5',
            'sisa' => '2',
            'sisa_diaria' => '3',
            'riesgo_exposicion' => '',
            'ubicacion_id' => 3,
            'actividad_id' => 3,
            'user_id' => 6,
        ]);

        DB::table('puestos')->insert([
            'num_puesto' => '3',
            'cantidad_puesto' => '4',
            'medidas' => '12x5',
            'sisa' => '2',
            'sisa_diaria' => '3',
            'riesgo_exposicion' => '',
            'ubicacion_id' => 3,
            'actividad_id' => 3,
            'user_id' => 6,
        ]);

        DB::table('puestos')->insert([
            'num_puesto' => '4',
            'cantidad_puesto' => '4',
            'medidas' => '12x5',
            'sisa' => '2',
            'sisa_diaria' => '3',
            'riesgo_exposicion' => '',
            'ubicacion_id' => 3,
            'actividad_id' => 3,
            'user_id' => 6,
        ]);
    }
}
