<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentInformsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_informs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('payment_log_id')->nullable();
            // $table->string('user_id')->nullable();
            // $table->string('student_id');
            $table->string('timepicker')->nullable();
            $table->string('date')->nullable();
            // $table->string('bill_image');
            $table->string('bank_id')->nullable();
            $table->string('pm_status_id')->default(3);
            $table->string('imgInp')->nullable();
            $table->string('price')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment_informs');
    }
}
