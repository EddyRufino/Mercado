<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePuestosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('puestos', function (Blueprint $table) {
            $table->id();
            $table->string('num_puesto');
            $table->integer('cantidad_puesto');
            $table->string('medidas');
            $table->string('sisa');
            $table->string('sisa_diaria'); // cantidad_puesto * sisa
            $table->string('riesgo_exposicion')->nullable();
            $table->foreignId('ubicacion_id')->constrained('ubicacions');
            $table->foreignId('actividad_id')->constrained('actividads');
            $table->foreignId('user_id')->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('puestos');
    }
}
