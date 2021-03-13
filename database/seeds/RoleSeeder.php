<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'Administrador',
            'display_name' => 'admin',
            'description' => 'Soy un administrador'
        ]);

        DB::table('roles')->insert([
            'name' => 'Secretaria',
            'display_name' => 'secretaria',
            'description' => 'Soy una secreataria'
        ]);

        DB::table('roles')->insert([
            'name' => 'Cobrador',
            'display_name' => 'cobrador',
            'description' => 'Soy un cobrador'
        ]);
    }
}
