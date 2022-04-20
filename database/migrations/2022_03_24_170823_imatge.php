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
        Schema::create('imatges', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ID_pacient_associat');
            $table->date('data_pujada');
            $table->string('comentaris_metge');
            $table->integer('percentatge_malignitat');
            $table->string('diagnostic');
            $table->binary('mascara');
            
            
            $table->rememberToken();
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
        Schema::dropIfExists('imatges');
    }
};
