<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UsersTableCreate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('event');
            $table->string('surname');
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->string('password');
            $table->string('education');
            $table->string('file')->nullable();
            $table->string('note')->nullable();
            $table->string('ip_adress')->nullable();
            $table->rememberToken();
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
