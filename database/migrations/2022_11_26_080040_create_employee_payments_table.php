<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_payments', function (Blueprint $table) {
            $table->id();
            $table->string('year');
            $table->string('month');
            $table->string('date');
            $table->string('amount');
            $table->string('note')->nullable();
            $table->integer('employee_id');
            $table->integer('office_id');
            $table->integer('company_id');
            $table->integer('created_user');
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
        Schema::dropIfExists('employee_payments');
    }
}
