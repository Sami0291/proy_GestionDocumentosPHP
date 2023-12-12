<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateControlGastosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('control_gastos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('empleado_id')->nullable()->references('id')->on('empleado');
            $table->foreignId('tecnico_id')->nullable()->references('id')->on('tecnico');
            $table->foreignId('estado_id')->nullable()->references('id')->on('estado');
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
        Schema::dropIfExists('control_gastos');
    }
}