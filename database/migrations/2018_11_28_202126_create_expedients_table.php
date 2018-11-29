<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpedientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expedients', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('medic_id')->nullable();
            $table->double('weight')->nullable();
            $table->integer('height')->nullable();
            $table->string('blood_type');            
            $table->text('antecedentes_heredo_familiares')->nullable();
            $table->text('antecedentes_personales_patologicos')->nullable();
            $table->text('antecedentes_personales_no_patologicos')->nullable();
            $table->text('padecimientos_actuales')->nullable();    
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
        Schema::dropIfExists('expedients');
    }
}
