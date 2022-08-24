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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('gelar_depan',25)->nullable();
            $table->string('gelar_belakang',50)->nullable();
            $table->string('nama_depan',50);
            $table->string('nama_belakang',100);
            $table->string('nama_lengkap',200);
            $table->date('tgl_lahir');
            $table->string('jenis_kelamin', 25);
            $table->bigInteger('nik')->nullable();
            $table->bigInteger('nira')->nullable();
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('phone_cell', 25)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();;
            $table->string('foto')->nullable();;
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
};
