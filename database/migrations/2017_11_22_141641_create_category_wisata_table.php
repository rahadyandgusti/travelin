<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryWisataTable extends Migration
{
    protected $table = 'category_wisata';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',200);
            $table->text('description')->nullable();
            $table->integer('created_id')->nullable();
            $table->integer('updated_id')->nullable();
            $table->enum('status', ['active','inactive'])->default('active');
            $table->timestampsTz();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->table);
    }
}
