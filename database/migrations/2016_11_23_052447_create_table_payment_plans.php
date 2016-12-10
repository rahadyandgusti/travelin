<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePaymentPlans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_plans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_skko')->unsigned();
            $table->string('job_description',255);
            $table->decimal('week1',15,2)->nullable();
            $table->decimal('week2',15,2)->nullable();
            $table->decimal('week3',15,2)->nullable();
            $table->decimal('week4',15,2)->nullable();
            $table->decimal('week5',15,2)->nullable();
            $table->decimal('total',15,2)->nullable();
            $table->integer('month');
            $table->integer('year');
            
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->integer('deleted_by')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_skko')
              ->references('id')->on('skko')
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
        Schema::dropIfExists('payment_plans');
    }
}
