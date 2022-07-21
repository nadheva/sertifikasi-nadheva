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
        Schema::create('pendaftaran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('informasi_pendaftaran_id')->constrained('informasi_pendaftaran')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('nilai_rata_rata');
            // $table->string('tempat_lahir');
            // $table->date('tanggal_lahir');
            // $table->string('asal_sekolah');
            // $table->double('rata_rata_nilai_un');
            // $table->string('foto');
            // $table->string('alamat');
            $table->enum('status', ['Diterima', 'Cadangan', 'Tidak Diterima'])->nullable();
            // $table->string('scan_ijazah');
            // $table->string('scan_nilai_un');
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
        Schema::dropIfExists('pendaftaran');
    }
};
