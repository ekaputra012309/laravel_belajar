<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PegawaiController extends Controller
{
    public function index()
    {
        // mengambil data dari table
        $pegawai = DB::table('pegawai')->paginate(10);
        // mengirim data table ke view index
        return view('index', ['pegawai' => $pegawai]);
    }

    public function tambah()
    {
        // memanggil view tambah
        return view('tambah');
    }

    public function store(Request $request)
    {
        // insert data ke table
        DB::table('pegawai')->insert([
            'pegawai_nama' => $request->nama,
            'pegawai_jabatan' => $request->jabatan,
            'pegawai_umur' => $request->umur,
            'pegawai_alamat' => $request->alamat
        ]);
        // redirec ke halaman pegawai
        return redirect('/pegawai');
    }

    public function edit($id)
    {
        // mengambil data table berdasarkan id
        $pegawai = DB::table('pegawai')->where('pegawai_id', $id)->get();
        // passing data ke halaman edit sesuai id
        return view('edit', ['pegawai' => $pegawai]);
    }

    public function update(Request $request)
    {
        // update data ke table
        DB::table('pegawai')->where('pegawai_id', $request->id)->update([
            'pegawai_nama' => $request->nama,
            'pegawai_jabatan' => $request->jabatan,
            'pegawai_umur' => $request->umur,
            'pegawai_alamat' => $request->alamat
        ]);
        // redirec ke halaman pegawai
        return redirect('/pegawai');
    }

    public function hapus($id)
    {
        // mengambil data table berdasarkan id
        $pegawai = DB::table('pegawai')->where('pegawai_id', $id)->delete();
        // redirec ke halaman pegawai
        return redirect('/pegawai');
    }

    public function cari(Request $request)
    {
        // menangkap data pencarian
        $cari = $request->cari;
        // mengambil data dari table sesuai pencarian data
        $pegawai = DB::table('pegawai')
            ->where('pegawai_nama', 'like', "%" . $cari . "%")
            ->paginate();
        // mengirim data table ke view index
        return view('index', ['pegawai' => $pegawai]);
    }
}
