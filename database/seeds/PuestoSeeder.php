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
        for ($i=1; $i <= 322 ; $i++) {
            DB::table('listas')->insert([
                'num_puesto' => "{$i}",
                'ubicacion' => 'I',
                'color' => '#5DD9F5'
            ]);
        }

        for ($i=323; $i <= 380; $i++) {
            DB::table('listas')->insert([
                'num_puesto' => "{$i}",
                'ubicacion' => 'G-I',
                'color' => '#49B3CB'
            ]);
        }

        for ($i=1; $i <= 76; $i++) {
            DB::table('listas')->insert([
                'num_puesto' => "{$i}",
                'ubicacion' => 'P',
                'color' => '#30BF3B'
            ]);
        }

        DB::table('listas')->insert([
            'num_puesto' => '1',
            'ubicacion' => 'L-E',
            'color' => '#F662BC'
        ]);

        DB::table('listas')->insert([
            'num_puesto' => '2',
            'ubicacion' => 'L-E',
            'color' => '#F662BC'
        ]);

        DB::table('listas')->insert([
            'num_puesto' => '3',
            'ubicacion' => 'L-P',
            'color' => '#088A68'
        ]);

        DB::table('listas')->insert([
            'num_puesto' => '4',
            'ubicacion' => 'L-I',
            'color' => '#0080FF'
        ]);

        DB::table('listas')->insert([
            'num_puesto' => '5',
            'ubicacion' => 'L-I',
            'color' => '#0080FF'
        ]);

        for ($i=77; $i <= 94; $i++) {
            DB::table('listas')->insert([
                'num_puesto' => "{$i}",
                'ubicacion' => 'MD-P',
                'color' => '#CD6B08'
            ]);
        }

        for ($i=1; $i <= 5; $i++) {
            DB::table('listas')->insert([
                'num_puesto' => "{$i}",
                'ubicacion' => 'L-E',
                'color' => '#F662BC'
            ]);
        }

        for ($i=1; $i <= 12; $i++) {
            DB::table('listas')->insert([
                'num_puesto' => "{$i}",
                'ubicacion' => 'A',
                'color' => '#F7D358'
            ]);
        }

        for ($i=1; $i <= 4; $i++) {
            DB::table('listas')->insert([
                'num_puesto' => "{$i}",
                'ubicacion' => 'k-P',
                'color' => '#BF00FF'
            ]);
        }

        for ($i=1; $i <= 11; $i++) {
            DB::table('listas')->insert([
                'num_puesto' => "{$i}",
                'ubicacion' => 'k-I',
                'color' => '#F6CED8'
            ]);
        }

        for ($i=1; $i <= 21; $i++) {
            DB::table('listas')->insert([
                'num_puesto' => "{$i}",
                'ubicacion' => 'T-E',
                'color' => '#812D00'
            ]);
        }

        // DB::table('puestos')->insert([
        //     // 'num_puesto' => '1 al 3',
        //     'cantidad_puesto' => '3',
        //     'medidas' => '12x5',
        //     'sisa' => '2',
        //     'sisa_diaria' => '6',
        //     'riesgo_exposicion' => 'Si',
        //     'list_id' => '',
        //     'ubicacion_id' => 1,
        //     'actividad_id' => 2,
        //     'user_id' => 1
        // ]);

        // DB::table('puestos')->insert([
        //     // 'num_puesto' => '4 al 6',
        //     'cantidad_puesto' => '3',
        //     'medidas' => '12x5',
        //     'sisa' => '2',
        //     'sisa_diaria' => '6',
        //     'riesgo_exposicion' => '',
        //     'list_id' => '',
        //     'ubicacion_id' => 2,
        //     'actividad_id' => 1,
        //     'user_id' => 2
        // ]);

        // DB::table('puestos')->insert([
        //     // 'num_puesto' => '6 al 10',
        //     'cantidad_puesto' => '4',
        //     'medidas' => '12x5',
        //     'sisa' => '0.50',
        //     'sisa_diaria' => '20',
        //     'riesgo_exposicion' => '',
        //     'list_id' => '',
        //     'ubicacion_id' => 3,
        //     'actividad_id' => 3,
        //     'user_id' => 3
        // ]);

        // DB::table('puestos')->insert([
        //     'num_puesto' => '10 al 11',
        //     'cantidad_puesto' => '2',
        //     'medidas' => '12x5',
        //     'sisa' => '2',
        //     'sisa_diaria' => '6',
        //     'riesgo_exposicion' => '',
        //     'ubicacion_id' => 2,
        //     'actividad_id' => 2,
        //     'user_id' => 4
        // ]);

        // DB::table('puestos')->insert([
        //     'num_puesto' => '12 al 13',
        //     'cantidad_puesto' => '2',
        //     'medidas' => '12x5',
        //     'sisa' => '2',
        //     'sisa_diaria' => '6',
        //     'riesgo_exposicion' => '',
        //     'ubicacion_id' => 2,
        //     'actividad_id' => 4,
        //     'user_id' => 5
        // ]);

        // DB::table('puestos')->insert([
        //     'num_puesto' => '14 al 17',
        //     'cantidad_puesto' => '4',
        //     'medidas' => '12x5',
        //     'sisa' => '2',
        //     'sisa_diaria' => '6',
        //     'riesgo_exposicion' => '',
        //     'ubicacion_id' => 1,
        //     'actividad_id' => 4,
        //     'user_id' => 6
        // ]);
    }
}
