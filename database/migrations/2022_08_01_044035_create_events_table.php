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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->integer('id_penyelenggara');
            $table->foreignId('training_id');
            $table->foreignId('education_level');
            $table->string('judul');
            $table->string('ringkasan');
            $table->text('isi');
            $table->date('date_publish');
            $table->integer('harga');
            $table->integer('kuota');
            $table->string('banner');
            $table->date('date_mulai');
            $table->date('date_selesai');
            $table->string('tempat');
            $table->foreignId('created_by');
            $table->integer('status');
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
        Schema::dropIfExists('events');
    }
};
