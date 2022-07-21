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
        Schema::create('informasi_pendaftaran', function (Blueprint $table) {
            $table->id();
            $table->string('tahun_ajaran');
            $table->text('deskripsi');
            $table->enum('status', ['Dibuka', 'Ditutup']);
            $table->integer('kuota');
            $table->double('kkm');
            $table->string('gambar');
            $table->string('link_youtube');
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
        Schema::dropIfExists('informasi_pendaftaran');
    }
};
