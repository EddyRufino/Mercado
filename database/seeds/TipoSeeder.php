<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipos')->insert([
            'nombre' => 'Pago Sisa',
        ]);

        DB::table('tipos')->insert([
            'nombre' => 'Deuda Sisa',
        ]);

        DB::table('tipos')->insert([
            'nombre' => 'Pago Tramite',
        ]);

        DB::table('tipos')->insert([
            'nombre' => 'Pago Agua',
        ]);

        DB::table('tipos')->insert([
            'nombre' => 'Deuda Agua',
        ]);

        DB::table('tipos')->insert([
            'nombre' => 'Sisa Anticipada',
        ]);

        DB::table('tipos')->insert([
            'nombre' => 'Agua Anticipada',
        ]);

        // ***********
        DB::table('talonarios')->insert([
            'num_inicio' => '30200',
            'num_fin' => '30300',
            'tipo' => 1, // Sisa
            'num_inicio_correlativo' => '30199'
        ]);

        DB::table('talonarios')->insert([
            'num_inicio' => '17351', // Restale 1 cuando guardas
            'num_fin' => '17360',
            'tipo' => 2, // Taza
            'num_inicio_correlativo' => '17350'
        ]);

        DB::table('talonarios')->insert([
            'num_inicio' => '00200',
            'num_fin' => '00210',
            'tipo' => 3, // Ducha
            'num_inicio_correlativo' => '00199'
        ]);
    }
}
