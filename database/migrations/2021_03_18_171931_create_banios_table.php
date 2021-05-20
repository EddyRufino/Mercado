<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBaniosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banios', function (Blueprint $table) {
            $table->id();
            $table->string('num_correlativo');
            $table->date('fecha');
            $table->integer('tipo_servicio');
            $table->string('monto_taza')->nullable();
            $table->string('monto_ducha')->nullable();
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
        Schema::dropIfExists('banios');
    }
}
