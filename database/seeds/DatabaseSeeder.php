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
        DB::table('users')->insert([
            'name' => 'Elna Beier',
            'apellido' => 'Nolan',
            'email' => 'admin_mercado@gmail.com',
            'direccion' => 'NN',
            'telefono' => '555',
            'dni' => '777',
            'email_verified_at' => '2021-06-02 19:27:43',
            'password' => '$2y$10$KJe6N5xSW5YB1/OYZMko6e2KxdDKypikkYxVNfT2z0CZcqP7a7mcC',
            'remember_token' => 'T6QgOmTqvt8CJ0RiPwSNhCVc1qcj0dhdCjaG5HU6ba9C6xHi4Rv2cjlyoMO5'
        ]);

        DB::table('users')->insert([
            'name' => 'Elna Beier',
            'apellido' => 'Nolan',
            'email' => 'secretaria_mercado@gmail.com',
            'direccion' => 'NN',
            'telefono' => '555',
            'dni' => '777',
            'email_verified_at' => '2021-06-02 19:27:43',
            'password' => '$2y$10$KJe6N5xSW5YB1/OYZMko6e2KxdDKypikkYxVNfT2z0CZcqP7a7mcC',
            'remember_token' => '0hGug8nrSx'
        ]);

        DB::table('users')->insert([
            'name' => 'Elna Beier',
            'apellido' => 'Nolan',
            'email' => 'comeciante_mercado@gmail.com',
            'direccion' => 'NN',
            'telefono' => '555',
            'dni' => '777',
            'email_verified_at' => '2021-06-02 19:27:43',
            'password' => '$2y$10$KJe6N5xSW5YB1/OYZMko6e2KxdDKypikkYxVNfT2z0CZcqP7a7mcC',
            'remember_token' => '4yzHFHRz8p'
        ]);

        DB::table('users')->insert([
            'name' => 'Elna Beier',
            'apellido' => 'Nolan',
            'email' => 'cobrador_mercado@gmail.com',
            'direccion' => 'NN',
            'telefono' => '555',
            'dni' => '777',
            'email_verified_at' => '2021-06-02 19:27:43',
            'password' => '$2y$10$KJe6N5xSW5YB1/OYZMko6e2KxdDKypikkYxVNfT2z0CZcqP7a7mcC',
            'remember_token' => 'MMnMftgtQ6'
        ]);

        DB::table('users')->insert([
            'name' => 'Elna Beier',
            'apellido' => 'Nolan',
            'email' => 'cwisoky@example.org',
            'direccion' => 'NN',
            'telefono' => '555',
            'dni' => '777',
            'email_verified_at' => '2021-06-02 19:27:43',
            'password' => '$2y$10$KJe6N5xSW5YB1/OYZMko6e2KxdDKypikkYxVNfT2z0CZcqP7a7mcC',
            'remember_token' => 'VBws6vqEny'
        ]);
        // factory(User::class, 6)->create();
        factory(Ubicacion::class, 5)->create();
        factory(Actividad::class, 10)->create();

        $this->call([
            RoleSeeder::class,
            AssignedRoleSeeder::class,
            TipoSeeder::class,
            PuestoSeeder::class,
        ]);

        // factory(Pago::class, 20)->create();
        // factory(Deuda::class, 20)->create();
    }
}
