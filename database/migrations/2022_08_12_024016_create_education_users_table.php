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
        Schema::create('education_users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('education_level_id');
            $table->string('program_studi');
            $table->string('institusi');
            $table->date('tahun_lulus');
            $table->string('nomor_ijazah')->nullable();
            $table->string('ttd_ijazah')->nullable();
            $table->boolean('pendidikan_terahir');
            $table->string('file_ijazah')->nullable();
            $table->integer('verified_by')->nullable();
            $table->string('slug');
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
        Schema::dropIfExists('education_users');
    }
};
