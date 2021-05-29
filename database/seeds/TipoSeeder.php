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
            'nombre' => 'Pago',
        ]);

        DB::table('tipos')->insert([
            'nombre' => 'Deuda',
        ]);

        DB::table('tipos')->insert([
            'nombre' => 'Tramite',
        ]);

        DB::table('tipos')->insert([
            'nombre' => 'Servicio',
        ]);

        DB::table('tipos')->insert([
            'nombre' => 'Pago Anticipado',
        ]);

        // ***********
        DB::table('talonarios')->insert([
            'num_inicio' => '17351', // Restale 1 cuando guardas
            'num_fin' => '17360',
            'tipo' => 2, // Taza
            'num_inicio_correlativo' => '17351'
        ]);

        DB::table('talonarios')->insert([
            'num_inicio' => '00200',
            'num_fin' => '00210',
            'tipo' => 3, // Ducha
            'num_inicio_correlativo' => '00200'
        ]);
    }
}
