<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableBills extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_payment_plan')->unsigned();
            $table->integer('id_contract')->unsigned();
            $table->integer('id_adendum')->unsigned();
            
            $table->string('payment_request_number',100);
            $table->date('payment_request_date');
            $table->integer('payment_request_month_start');
            $table->integer('payment_request_year_start');
            $table->integer('payment_request_month_end');
            $table->integer('payment_request_year_end');
            $table->decimal('payment_request_value',15,2);

            $table->string('handover_number',100);
            $table->date('handover_date');
            $table->integer('handover_month_start');
            $table->integer('handover_year_start');
            $table->integer('handover_month_end');
            $table->integer('handover_year_end');
            $table->decimal('handover_payment',15,2);
            
            $table->string('purchasing_requisition_number',100);
            $table->string('purchasing_order_number',100);
            $table->string('service_entry_number',100);

            $table->text('syarat');

            $table->string('ppfa_number',100);
            $table->date('ppfa_date');

            $table->enum('status',['0','1','2','3','4','5','6','7'])->default('0');
            /*
            ** status
            0 - begin
            1 - permohonan pembayaran sudah diisi
            2 - BA Serah Terima sudah diisi - diambil oleh logum (monitoring tagihan)
            3 - purchasing requitition sudah diisi
            4 - purchasing order sudah diisi
            5 - service entry sudah diisi - diambil keuangan (tagihan) -> belum valid
            6 - valid
            7 - PPFA sudah diisi - selesai
            */ 
            
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            // $table->integer('deleted_by')->nullable();
            $table->timestamps();
            // $table->softDeletes();

            $table->foreign('id_payment_plan')
              ->references('id')->on('payment_plans')
              ->onUpdate('cascade')
              ->onDelete('cascade');

            $table->foreign('id_contract')
              ->references('id')->on('contracts')
              ->onUpdate('cascade')
              ->onDelete('cascade');

            $table->foreign('id_adendum')
              ->references('id')->on('adendums')
              ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bills');
    }
}
