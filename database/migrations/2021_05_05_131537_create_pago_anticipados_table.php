<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagoAnticipadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pago_anticipados', function (Blueprint $table) {
            $table->id();
            $table->date('fecha'); // en que se registra el pago
            $table->date('fecha_anticipada'); // el día que pago antes
            $table->string('num_operacion')->nullable();
            $table->string('monto_deposito')->nullable();
            $table->date('fecha_deposito')->nullable();
            $table->string('num_recibo')->unique();
            $table->string('monto_agua_anticipada')->nullable();
            $table->string('monto_sisa_anticipada')->nullable();
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
        Schema::dropIfExists('pago_anticipados');
    }
}
