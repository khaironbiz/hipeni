<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->integer('user_id')->default(0);
            $table->string('nama')->nullable();
            $table->string('email')->nullable();
            $table->string('hp', 25)->nullable();
            $table->string('invoice_id')->nullable();
            $table->string('channel')->nullable();;
            $table->integer('tagihan');
            $table->integer('ppn')->default(0);
            $table->integer('biaya')->default(0);
            $table->integer('komisi')->default(0);
            $table->integer('total')->default(0);
            $table->string('status')->nullable();
            $table->string('slug')->default(md5(uniqid()));
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
};
