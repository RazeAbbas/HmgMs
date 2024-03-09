<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->integer('company')->nullable();
            $table->integer('office')->nullable();
            $table->integer('employee')->nullable();
            $table->integer('roles')->nullable();
            $table->string('cnic')->nullable();
            $table->string('phone')->unique()->nullable();
            $table->string('city')->nullable();
            $table->string('address')->nullable();
            $table->integer('pay')->nullable();
            $table->string('check_in')->nullable();
            $table->string('rest')->nullable();
            $table->string('profile_image')->nullable();
            $table->string('cnic_front')->nullable();
            $table->string('cnic_back')->nullable();
            $table->string('police_verification')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
