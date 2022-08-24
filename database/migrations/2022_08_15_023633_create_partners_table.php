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
        Schema::create('partners', function (Blueprint $table) {
            $table->id();
            $table->string('nama_partner');
            $table->string('singkatan');
            $table->integer('id_pj');
            $table->string('nama_pj');
            $table->string('email');
            $table->string('hp');
            $table->string('website');
            $table->string('nomor_sk');
            $table->date('tanggal_sk');
            $table->date('valid_to');
            $table->string('slug');
            $table->string('logo');
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
        Schema::dropIfExists('partners');
    }
};
