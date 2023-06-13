<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mahasiswa;

class PageController extends Controller
{
    public function beranda()
    {
        return view('beranda', ['key' => 'beranda']);
    }
    public function profil()
    {
        return view('profil', ['key' => 'profil']);
    }
    public function mahasiswa()
    {
        $mhs = Mahasiswa::orderBy('nim', 'asc')->paginate(8);
        return view('mahasiswa', ['key' => 'mahasiswa', 'mhs' => $mhs]);
    }

    public function pencarian(Request $request)
    {
        $cari = $request->q;
        $mhs = Mahasiswa::where('nim', 'like', '%'.$cari.'%')-> 
        orWhere('nama', 'like', '%'.$cari.'%')->paginate();
        return view('mahasiswa', ['key' => 'mahasiswa', 'nim', 'mhs'=> $mhs]);
    }

    public function tambah()
    {
        return view('formtambah', ['key' => 'mahasiswa']);
    }

    public function simpan(Request $request)
    {
        $minat = implode(', ', $request->get('minat'));
        Mahasiswa::create([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'gender' => $request->gender,
            'prodi' => $request->prodi,
            'minat' => $minat
            // 'minat' => $request->minat
        ]);
        return redirect('mahasiswa')->with('flash', 'Data berhasil ditambah!');
    }

    public function ubah($nim)
    {
        $mhs = Mahasiswa::find($nim);
        return view('formubah', ['key' => 'mahasiswa', 'mhs' => $mhs]);
    }

    public function update($nim, Request $request)
    {
        $minat = implode(', ',$request->get('minat'));
        $mhs = Mahasiswa::find($nim);
        //$mhs->nim = $request->nim;
        $mhs->nama = $request->nama;
        $mhs->gender = $request->gender;
        $mhs->prodi = $request->prodi;
        $mhs->minat = $minat;
        $mhs->save();
        return redirect('mahasiswa')->with('flashubah', 'Data berhasil diubah!');
    }

    public function delete($nim)
    {
        $mhs = Mahasiswa::find($nim);
        $mhs->delete();

        return redirect('mahasiswa')->with('flashhapus', 'Data berhasil dihapus!');
    }

    public function kontak()
    {
        return view('kontak', ['key' => 'kontak']);
    }
}