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
        Schema::create('webs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_web');
            $table->string('singkatan',255);
            $table->text('deskripsi')->nullable();
            $table->string('alamat')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('kota')->nullable();
            $table->string('kecamatan',25)->nullable();
            $table->string('kelurahan',25)->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('url')->nullable();
            $table->string('logo')->nullable();
            $table->string('status')->nullable();
            $table->string('key');
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
        Schema::dropIfExists('webs');
    }
};
