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
    }
}
