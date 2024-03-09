<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->integer('brand');
            $table->integer('item');
            $table->integer('purchase_id');
            $table->integer('per_price');
            $table->integer('qty');
            $table->string('date');
            $table->string('battery');
            $table->integer('storage_area');
            $table->integer('status');
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
        Schema::dropIfExists('stocks');
    }
}
