<?php

namespace App\Http\Controllers\Admin;
use App\Models\InformasiPendaftaran;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class InformasiPendaftaranController extends Controller
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
            'tahun_ajaran' => 'required',
            'deskripsi' => 'required',
            'kuota' => 'required',
            'kkm' => 'required',
            'gambar' => 'required',
            'link_youtube' => 'required'
        ]);

        InformasiPendaftaran::create([
            'tahun_ajaran' => $request->tahun_ajaran,
            'deskripsi' => $request->deskripsi,
            'status' => 'dibuka',
            'kuota' => $request->kuota,
            'kkm' => $request->kkm,
            'gambar' => $request->gambar,
            'link_youtube' => $request->link_youtube,
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
        $informasi = InformasiPendaftaran::findOrfail($id);
        return view('admin.informasi.detail',compact('informasi') );
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
        $informasi = InformasiPendaftaran::findOrfail($id);
        $informasi->tahun_ajaran = $request->tahun_ajaran;
        $informasi->deskripsi = $request->deskripsi;
        $informasi->status = $request->status;
        $informasi->kuota = $request->kuota;
        $informasi->kkm = $request->kkm;
        $informasi->gambar = $request->gambar;
        $informasi->link_youtube = $request->link_youtube;
        $informasi->save();
        Alert::info('Info', 'Informasi Pendafataran Berhasil Diedit!');
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
        $informasi = InformasiPendaftaran::where('id', $id)->delete();
        Alert::warning('Warining', 'Informasi Pendafataran Berhasil Dihapus!');
        return redirect()->back();
    }
}
