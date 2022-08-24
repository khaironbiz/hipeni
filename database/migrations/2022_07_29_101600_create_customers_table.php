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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('nik')->unique();
            $table->string('nama_depan',255);
            $table->string('nama_belakang',255);
            $table->date('tl');
            $table->char('jk', 2);
            $table->integer('status');
            $table->char('username', 50)->unique();
            $table->string('email',150)->unique();
            $table->string('hp',25)->unique();
            $table->string('alamat',500);
            $table->string('password');
            $table->string('foto');
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
        Schema::dropIfExists('customers');
    }
};
