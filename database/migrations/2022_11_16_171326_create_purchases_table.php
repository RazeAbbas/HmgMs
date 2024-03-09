<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->integer("supplier");
            $table->string("title");
            $table->string("order_date");
            $table->string("receive_date");
            $table->integer("status");
            $table->integer("total_bill");
            $table->integer("advance_payment")->nullable();
            $table->string("purchase_receipt_image")->nullable();
            $table->string("cargo_service")->nullable();
            $table->string("bilter_number")->nullable();
            $table->string("cargo_service_number")->nullable();
            $table->string("description")->nullable();
            $table->bigInteger("office_id");
            $table->bigInteger("company_id");
            $table->bigInteger("created_user");
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
        Schema::dropIfExists('purchases');
    }
}
