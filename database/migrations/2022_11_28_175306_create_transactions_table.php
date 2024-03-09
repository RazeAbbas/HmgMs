<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('date')->nullable();
            $table->string('bill_amount')->nullable();
            $table->string('received_amount')->nullable();
            $table->string('receipt_number')->nullable();
            $table->string('description')->nullable();
            $table->integer('item');
            $table->string('code');
            $table->integer('subdealer_id');
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
        Schema::dropIfExists('transactions');
    }
}
