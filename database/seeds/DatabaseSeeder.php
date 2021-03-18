<?php

use App\Actividad;
use App\Deuda;
use App\Pago;
use App\Ubicacion;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 6)->create();
        factory(Ubicacion::class, 10)->create();
        factory(Actividad::class, 10)->create();

        $this->call([
            RoleSeeder::class,
            AssignedRoleSeeder::class,
            TipoSeeder::class,
            PuestoSeeder::class,
        ]);

        factory(Pago::class, 20)->create();
        factory(Deuda::class, 20)->create();
    }
}
