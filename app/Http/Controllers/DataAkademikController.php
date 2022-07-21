<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataAkademikSiswa;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class DataAkademikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataakademik = DataAkademikSiswa::where('user_id', Auth::user()->id)->first();
        return view('user.dataakademik.index', compact('dataakademik'));
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
            'nisn' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'asal_sekolah' => 'required',
            'nilai_mtk' => 'required',
            'nilai_bindo' => 'required',
            'nilai_big' => 'required',
            'foto' => 'required|max:500000',
            'alamat' => 'required'
        ]);
        if (isset($request->foto)) {
            $extention = $request->foto->extension();
            $file_name = time() . '.' . $extention;
            $txt = "storage/foto_siswa/". $file_name;
            $request->foto->storeAs('public/foto_siswa', $file_name);
        } else {
            $txt = null;
        }
         DataAkademikSiswa::create([
            'user_id' => Auth::user()->id,
            'nisn' => $request->nisn,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'asal_sekolah' => $request->asal_sekolah,
            'nilai_mtk' => $request->nilai_mtk,
            'no_telp' => $request->no_telp,
            'nilai_bindo' => $request->nilai_bindo,
            'nilai_big' => $request->nilai_big,
            'nilai_rata_rata' => ($request->nilai_bindo + $request->nilai_mtk + $request->nilai_big)/3,
            'foto' => $txt,
            'alamat' => $request->alamat,
            'status' => 0,
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
        $dataakademik = DataAkademikSiswa::findOrfail($id);
        return view('admin.pendaftaran.index', compact('dataakademik'));
    }
    public function printpdf($id)
    {
        $dataakademik = DataAkademikSiswa::where('id',$id)->first();
        return view('admin.pendaftaran.cetak', compact('dataakademik'));
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
        $request->validate([
            'nisn' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'asal_sekolah' => 'required',
            'nilai_mtk' => 'required',
            'nilai_bindo' => 'required',
            'nilai_big' => 'required',
            'foto' => 'required',
            'alamat' => 'reqired'
        ]);
        if (isset($request->foto)) {
            $extention = $request->foto->extension();
            $file_name = time() . '.' . $extention;
            $txt = "storage/foto_siswa/". $file_name;
            $request->foto->storeAs('public/foto_siswa', $file_name);
        } else {
            $txt = null;
        }
        $dataakademik = DataAkademikSiswa::findOrfail($id);
            $dataakademik->foto = $txt;
            $dataakademik->alamat = $request->alamat;
            $dataakademik->save();

        Alert::success('Success', 'Informasi Pendafataran Berhasil Diinput!');
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
        // $dataakadmemik = DataAkademikSiswa::where('user_id', Auth::user()->id)->delete();
        // {
        $dataakadmemik = DataAkademikSiswa::where('id', $id)->delete();
        Alert::warning('Warning', 'Data Akademik Siswa Berhasil Dihapus!');
        return redirect()->back();
    }

    public function approve($id)
    {
        $dataakademik = DataAkademikSiswa::findOrfail($id);
        $dataakademik->update([
            'status' => '1',
        ]);
        Alert::success('Success', 'Siswa Berhasil Diterima!');
        return redirect()->back();
    }
}
