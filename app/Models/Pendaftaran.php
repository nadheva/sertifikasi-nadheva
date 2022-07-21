<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;
    protected $table = ['pendaftaran'];
    protected $fillable = [
        'informasi_pendaftaran_id',
        'user_id',
        'nisn',
        'tempat_lahir',
        'tanggal_lahir',
        'asal_sekolah',
        'rata_rata_nilai_un',
        'foto',
        'alamat',
        'status_pendaftaran',
        'scan_ijazah',
        'scan_nilai_un'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function informasi_pendaftaran()
    {
        return $this->belongsTo(InformasiPendaftaran::class);
    }

}
