<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonalDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_datas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('phone')->nullable();
            $table->string('phone2')->nullable();
            $table->string('nacionality')->nullable();
            $table->integer('birthday')->nullable();
            $table->string('CURP')->nullable();
            $table->string('civil_status')->nullable();
            $table->string('religion')->nullable();                        
            $table->string('economic_level')->nullable();
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
        Schema::dropIfExists('personal_datas');
    }
}
