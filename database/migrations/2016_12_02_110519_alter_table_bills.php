<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableBills extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bills', function (Blueprint $table) {
            $table->string('purchasing_requisition_number',100)->nullable()->change();
            $table->string('purchasing_order_number',100)->nullable()->change();
            $table->string('service_entry_number',100)->nullable()->change();

            $table->dropColumn('syarat');

            $table->string('ppfa_number',100)->nullable()->change();
            $table->date('ppfa_date')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
