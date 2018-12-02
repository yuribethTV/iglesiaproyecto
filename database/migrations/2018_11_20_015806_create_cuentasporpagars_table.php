<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuentasporpagarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuentasporpagars', function (Blueprint $table) {
            $table->increments('id');
            $table->string("proveedores");
            $table->float('numerodefactura');
            $table->float('montooriginal');
            $table->date('fechadefactura');
            $table->string('concepto');
            $table->date('fechadevencimiento');
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
        Schema::dropIfExists('cuentasporpagars');
    }
}
