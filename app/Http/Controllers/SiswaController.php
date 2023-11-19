<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;

class SiswaController extends Controller
{
    public function index(){
        $data = Siswa::all();
        return view('datasiswa',compact('data'));
    }

    public function tambahsiswa(){
     return view('tambahdata');
    }
    public function insertdata(Request $request){
        $data = $request->validate([
            'nama' => 'required|string',
            'jeniskelamin' => 'required',
            'notelp' => 'required|min:11|max:13',
            'tanggal_lahir' => 'required|date',
            'email' => 'required|email|max:255|unique:users'
        ]);

        Siswa::create($data);
        return redirect()->route('Siswa')->with('success','Data Berhasil Di Buat');
    }

    public  function tampilandata($id){
       $data = Siswa::find($id);
        return view('tampilandata', compact('data'));
    }

    public function updatedata(Request $request,$id){
        $data = Siswa::find($id);

        $validatedData = $request->validate([
            'nama' => 'required|string',
            'jeniskelamin' => 'required',
            'notelp' => 'required|min:11|max:13',
            'tanggal_lahir' => 'required|date',
            'email' => 'required|email|max:255|unique:users'
        ]);

        $data->update($validatedData);
        return redirect()->route('Siswa')->with('success','Data Berhasil Di Ubah');
    }

    public function delete($id){
        $data = Siswa::find($id);
        $data->delete();
        return redirect()->route('Siswa')->with('success','Data Berhasil Di Hapus');
    }
}
