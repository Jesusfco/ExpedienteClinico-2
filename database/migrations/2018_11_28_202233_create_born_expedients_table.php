<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBornExpedientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('born_expedients', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('edad_madre')->nullable();
            $table->integer('tipo_nacimiento');
            $table->integer('llanto_inmediato')->nullable();
            $table->integer('APGAR')->nullable();
            $table->text('malformaciones')->nullable();
            $table->boolean('sangre_criogena_cordon');
            $table->double('peso')->nullable();
            $table->integer('talla')->nullable();
            $table->text('complicaciones_embarazo')->nullable();
            $table->integer('no_embarazo')->nullable();
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
        Schema::dropIfExists('born_expedients');
    }
}
