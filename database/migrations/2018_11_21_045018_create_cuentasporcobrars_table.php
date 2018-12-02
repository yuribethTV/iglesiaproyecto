<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuentasporcobrarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuentasporcobrars', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha');
            $table->string('deudor');
            $table->string('concepto');
            $table->float('monto');
            $table->float('abono')->nullable();
            $table->date('fechadeabono')->nullable();
            $table->float('montototal');
            $table->softDeletes();
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
        Schema::dropIfExists('cuentasporcobrars');
    }
}
