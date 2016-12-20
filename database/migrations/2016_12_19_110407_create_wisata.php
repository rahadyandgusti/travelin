<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWisata extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wisata', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_city')->unsigned();
            $table->string('name',200);
            $table->text('description')->nullable();
            $table->string('image',200);
            $table->integer('created_id')->nullable();
            $table->integer('updated_id')->nullable();
            $table->timestamps();

            $table->foreign('id_city')
                ->references('id')->on('cities')
                ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('wisata', function (Blueprint $table) {
            $table->dropForeign(['id_city']);
        });
        Schema::dropIfExists('wisata');
    }
}
