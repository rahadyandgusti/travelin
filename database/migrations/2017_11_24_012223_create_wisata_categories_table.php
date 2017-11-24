<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWisataCategoriesTable extends Migration
{
    protected $table = 'wisata_categories';
    protected $foreignTable = [
        [
            'table' => 'wisata',
            'localId' => 'wisata_id',
            'foreignId' => 'id',
            'update' => 'cascade',
            'delete' => 'cascade'
        ],
        [
            'table' => 'category_wisata',
            'localId' => 'category_id',
            'foreignId' => 'id',
            'update' => 'cascade',
            'delete' => 'cascade'
        ],
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
