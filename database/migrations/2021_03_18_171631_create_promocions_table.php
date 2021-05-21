<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromocionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promocions', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_empresa');
            $table->string('ruc');
            $table->date('fecha_inicio');
            $table->string('monto');
            $table->string('telefono')->nullable();
            $table->string('num_recibo')->unique();
            $table->string('num_operacion')->nullable();
            $table->string('monto_deposito')->nullable();
            $table->date('fecha_deposito')->nullable();
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
        Schema::dropIfExists('promocions');
    }
}
