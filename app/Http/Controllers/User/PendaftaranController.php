<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Pendaftaran;
use App\Models\InformasiPendaftaran;
use App\Models\DataAkademikSiswa;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $informasi = InformasiPendaftaran::latest()->get();
        return view('admin.infromasi.index', compact('informasi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            // 'tahun_ajaran' => 'required',
            // 'deskripsi' => 'required',
            // 'kuota' => 'required',
            // 'kkm' => 'required',
            // 'gambar' => 'required',
            // 'link_youtube' => 'required'
        ]);
        $user = Auth::user();
        $dataakademik = DataAkademikSiswa::where('user_id', Auth::user()->id);
        Pendaftaran::create([
            'informasi_pendaftaran_id' => $request->informasi_pendaftaran_id,
            'user_id' => Auth::user()->id,
            'nilai_rata_rata' => $dataakademik->nilai_rata_rata,
            // 'tempat_lahir' => $request->tempat_lahir,
            // 'tanggal_lahir' => $request->tanggal_lahir,
            // 'asal_sekolah' => $request->asal_sekolah,
            // 'rata_rata_nilai_un' => $request->rata_rata_nilai_un,
            // 'rata_rata_nilai_un' => $request->foto,
        ]);
        Alert::success('Success', 'Informasi Pendafataran Berhasil Diinput!');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pendaftaran = Pendaftaran::findOrfail($id);
        $pendaftaran->status = $request->status;
        $pendaftaran->save();
        Alert::info('Info', 'Status Pendaftaran Berhasil Diubah!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pendaftaran = Pendaftaran::where('id', $id)->delete();
        return redirect()->back();
    }
}
