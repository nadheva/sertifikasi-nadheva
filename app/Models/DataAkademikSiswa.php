<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataAkademikSiswa extends Model
{
    use HasFactory;
    protected $table = 'data_akademik_siswa';
    protected $fillable = [
        'user_id',
        'nisn',
        'no_telp',
        'tempat_lahir',
        'tanggal_lahir',
        'asal_sekolah',
        'nilai_rata_rata',
        'nilai_mtk',
        'nilai_bindo',
        'nilai_big',
        'foto',
        'alamat',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
