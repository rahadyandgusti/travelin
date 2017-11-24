<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWisataTable extends Migration
{
    protected $table = 'wisata';
    protected $foreignTable = [
        [
            'table' => 'cities',
            'localId' => 'city_id',
            'foreignId' => 'id',
            'update' => 'cascade',
            'delete' => 'cascade'
        ]
    ];
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
            $table->string('image',200)->nullable();
            $table->integer('created_id')->nullable();
            $table->integer('updated_id')->nullable();
            $table->timestampsTz();
            foreach($this->foreignTable as $f){
                $table->integer($f['localId'])->unsigned();
                $table->foreign($f['localId'])
                    ->references($f['foreignId'])->on($f['table'])
                    ->onDelete($f['delete'])->onUpdate($f['update']);
            }
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
