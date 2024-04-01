<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscripciones', function (Blueprint $table) {
            $table->id(); // ID autoincremental como llave primaria

            // Llave foránea a la tabla 'alumnos'
            // Asumiendo que 'numeroDeControl' es la llave primaria en 'alumnos'
            $table->bigInteger('alumno_numeroDeControl')->unsigned();
            $table->foreign('alumno_numeroDeControl')->references('numeroDeControl')->on('alumnos')->onDelete('cascade');

            // Llave foránea a la tabla 'grupos'
            $table->string('grupo_clave');
            $table->foreign('grupo_clave')->references('clave')->on('grupos')->onDelete('cascade');

            $table->timestamps(); // Campos opcionales para la fecha de creación y actualización
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inscripcions');
    }
};
