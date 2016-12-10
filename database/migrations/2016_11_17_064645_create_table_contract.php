<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableContract extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('contract_number',100)->unique();
            $table->date('date');
            $table->string('vendor_name',200);
            $table->string('vendor_email',150);
            $table->text('vendor_address')->nullable();
            $table->text('job_description');
            $table->string('location',150)->nullable();
            $table->decimal('value',15,2);
            
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->integer('deleted_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adendums');
        Schema::dropIfExists('skko');
        Schema::dropIfExists('contracts');
    }
}
