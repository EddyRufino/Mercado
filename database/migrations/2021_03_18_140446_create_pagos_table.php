<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->string('num_operacion')->nullable();
            $table->string('monto_remodelacion')->nullable();
            $table->string('monto_constancia')->nullable();
            $table->string('monto_agua')->nullable();
            $table->string('monto_sisa');
            $table->foreignId('puesto_id')->constrained('puestos');
            $table->foreignId('tipo_id')->constrained('tipos');
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
        Schema::dropIfExists('pagos');
    }
}
