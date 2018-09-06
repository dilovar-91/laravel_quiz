<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Quiz extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('savolho', function (Blueprint $table) {
            $table->increments('id_savol');
            $table->string('savol');
            $table->integer('id_fan')->unsigned();
            $table->integer('kategoriya')->unsigned();
            $table->string('varianti1');
            $table->string('varianti2');
            $table->string('varianti3');
            $table->string('varianti4');
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
        //
    }
}
