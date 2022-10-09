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
        Schema::create('accreditations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id');
            $table->foreignId('organisasi_profesi_id');
            $table->integer('peserta');
            $table->integer('pembicara');
            $table->integer('moderator');
            $table->integer('panitia');
            $table->string('no_skp');
            $table->date('tgl_skp');
            $table->string('keterangan')->nullable();
            $table->foreignId('created_by');
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
        Schema::dropIfExists('accreditations');
    }
};
