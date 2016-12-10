<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTabelForeignkey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('skko', function (Blueprint $table) {
            $table->unsignedInteger('id_unsur');
            
            $table->foreign('id_unsur')
              ->references('id')->on('unsur')
              ->onUpdate('cascade')
              ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('skko', function (Blueprint $table) {
            $table->dropForeign(['id_unsur']);
        });
    }
}
