<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableBillTerms extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill_terms', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_bill')->unsigned();
            $table->integer('id_term')->unsigned();
            $table->enum('status',['0','1']); // 0 - no , 1 - yes
            $table->text('description');

            $table->foreign('id_term')
              ->references('id')->on('terms')
              ->onUpdate('cascade')
              ->onDelete('cascade');
              
            $table->foreign('id_bill')
              ->references('id')->on('bills')
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
        Schema::dropIfExists('bill_terms');
    }
}
