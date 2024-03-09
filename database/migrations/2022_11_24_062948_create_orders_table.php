<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->integer('item')->nullable();
            $table->integer('brand')->nullable();
            $table->string('item_code')->nullable();
            $table->string('amount_in')->nullable();
            $table->integer('amount_status')->nullable();
            $table->integer('total_bill')->nullable();
            $table->integer('pending_amount')->nullable();
            $table->integer('advance_amount')->nullable();
            $table->string('transfer_account')->nullable();
            $table->string('date')->nullable();
            $table->string('title')->nullable();
            $table->string('remarks')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
