<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCity extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_province')->unsigned();
            $table->string('name',150);
            $table->text('description')->nullable();
            $table->string('logo',200);
            $table->string('slide',200);
            $table->integer('created_id')->nullable();
            $table->integer('updated_id')->nullable();
            $table->timestamps();

            $table->foreign('id_province')
                ->references('id')->on('provinces')
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
        // Schema::table('cities', function (Blueprint $table) {
        //     $table->dropForeign(['id_province']);
        // });
        Schema::dropIfExists('cities');
    }
}
