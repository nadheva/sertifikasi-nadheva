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
        Schema::create('data_akademik_siswa', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('nisn');
            $table->integer('no_telp');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('asal_sekolah');
            $table->integer('nilai_mtk');
            $table->integer('nilai_bindo');
            $table->integer('nilai_big');
            $table->integer('nilai_rata_rata');
            $table->string('foto');
            $table->string('alamat');
            // $table->boolean('status_pendaftaran')->default(0);
            $table->enum('status', ['Diterima', 'Cadangan', 'Tidak Diterima'])->nullable();
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
        Schema::dropIfExists('data_akademik_siswa');
    }
};
