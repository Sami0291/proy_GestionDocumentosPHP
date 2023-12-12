<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleControlGastosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_control_gastos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('control_gastos_id')->nullable()->references('id')->on('control_gastos');
            $table->string('num_comprobante')->nullable();
            $table->integer('costo_igv')->nullable();
            $table->datetime('fecha')->nullable();
            $table->string('proveedor')->nullable();
            $table->string('categoria_gastos')->nullable();
            $table->string('ruta_archivo')->nullable();
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
        Schema::dropIfExists('detalle_control_gastos');
    }
}