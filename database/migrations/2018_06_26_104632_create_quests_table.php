<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quests', function (Blueprint $table) {
            $table->increments('id');
            $table->string('savol');
             $table->integer('id_fan')->unsigned();
            $table->integer('kategoriya')->unsigned();
            $table->string('varianti_A');
            $table->string('varianti_B');
            $table->string('varianti_C');
            $table->string('varianti_D');
            $table->string('javob');
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
        Schema::dropIfExists('quests');
    }
}
