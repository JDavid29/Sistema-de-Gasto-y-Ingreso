<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGastosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gastos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->text('descripcion');
            $table->text('fecha');
            $table->integer('monto');
            $table->string('usuario');//este usuario por q va a ser el email del usuario
            $table->timestamps();//TERMINAL php artisan migrate
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */

    //php artisan make:model gastos -m --por la terminal
    public function down()
    {
        Schema::dropIfExists('gastos');
    }
}
