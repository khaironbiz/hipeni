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
        Schema::create('organisasi_profesis', function (Blueprint $table) {
            $table->id();
            $table->integer('id_profesi');
            $table->string('nama_op',255)->unique();
            $table->string('slug_op',255)->unique();
            $table->string('singkatan',255)->unique();
            $table->string('pimpinan',255);
            $table->string('alamat',255);
            $table->string('email',255)->unique();
            $table->string('telp',255);
            $table->string('hp',255)->unique();
            $table->string('web',255);
            $table->integer('created_by');
            $table->softDeletesTz($column = 'deleted_at', $precision = 0);
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
        Schema::dropIfExists('organisasi_profesis');
    }
};
