<?php

namespace App\Http\Controllers;
use App\Models\InformasiPendaftaran;
use App\Models\Pendaftaran;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class InformasiController extends Controller
{
    public function index()
    {
        $informasi = InformasiPendaftaran::latest()->get();
        return view('admin.informasi.index', compact('informasi'));
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
        if (isset($request->gambar)) {
            $extention = $request->gambar->extension();
            $file_name = time() . '.' . $extention;
            $txt = "storage/informasi/". $file_name;
            $request->gambar->storeAs('public/informasi', $file_name);
        } else {
            $txt = null;
        }
        InformasiPendaftaran::create([
            'tahun_ajaran' => $request->tahun_ajaran,
            'deskripsi' => $request->deskripsi,
            'status' => 'Dibuka',
            'kuota' => $request->kuota,
            'kkm' => $request->kkm,
            'gambar' => $txt,
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
        // $informasi = InformasiPendaftaran::findOrfail($id);
        // return view('admin.informasi.detail',compact('informasi') );
        $informasi = Pendaftaran::where('id', $id)->orderBy('nilai_rata_rata', 'desc')->get();
        return view('admin.pendaftaran.index', compact('pendaftaran'));
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
        $informasi->link_youtube = $request->link_youtube;
        if (isset($request->gambar)) {
            $extention = $request->gambar->extension();
            $file_name = time() . '.' . $extention;
            $txt = "storage/informasi/". $file_name;
            $request->gambar->storeAs('public/informasi', $file_name);
            $informasi->gambar = $txt;
        } else {
            $txt = null;
        }
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
