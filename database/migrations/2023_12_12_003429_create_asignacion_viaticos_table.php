<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsignacionViaticosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignacion_viaticos', function (Blueprint $table) {
            $table->id();
            $table->string('num_pry')->nullable();
            $table->integer('monto')->nullable();
            $table->datetime('fecha_proyecto')->nullable();
            $table->string('dias_proyecto')->nullable();
            $table->foreignId('empleado_id')->nullable()->references('id')->on('empleado');
            $table->foreignId('tecnico_id')->nullable()->references('id')->on('tecnico');
            $table->foreignId('proyecto_id')->nullable()->references('id')->on('proyecto');
            $table->foreignId('distritos_id')->nullable()->references('id')->on('distritos');
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
        Schema::dropIfExists('asignacion_viaticos');
    }
}