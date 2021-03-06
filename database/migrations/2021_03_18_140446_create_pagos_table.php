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
            $table->datetime('fecha'); // Fecha que pago
            $table->date('fecha_deuda')->nullable(); // Fecha deuda
            $table->string('num_operacion')->nullable();
            $table->string('monto_deposito')->nullable();
            $table->date('fecha_deposito')->nullable();
            $table->string('num_recibo');
            $table->string('cant_dia')->nullable();
            $table->string('monto_remodelacion')->nullable();
            $table->string('monto_constancia')->nullable();
            $table->string('monto_agua')->nullable();
            $table->string('monto_sisa')->nullable();
            $table->foreignId('puesto_id')->constrained('puestos')->onDelete('cascade');
            $table->foreignId('tipo_id')->constrained('tipos')->onDelete('cascade');
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
