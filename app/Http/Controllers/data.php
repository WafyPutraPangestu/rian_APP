<?php

namespace App\Http\Controllers;

use App\Models\data as ModelsData;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class data extends Controller
{
    public function index()
    {

        return view('input');
    }
    public function home()
    {

        return view('welcome');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'nik' => ['required', 'string', 'unique:data'],
            'nama_lengkap' => ['required', 'string'],
            'jenis_kelamin' => ['required', 'string', 'in:L,P'],
            'agama' => ['required', 'string'],
            'pekerjaan' => ['required', 'string'],
            'foto_ktp' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg,webp', 'max:2048'],
        ]);
        $image = $request->file('foto_ktp');
        $imagePath = $image->store('images', 'public');

        $data = ModelsData::create([
            'user_id' => Auth::id(),
            'nik' => $request->nik,
            'nama_lengkap' => $request->nama_lengkap,
            'jenis_kelamin' => $request->jenis_kelamin,
            'agama' => $request->agama,
            'pekerjaan' => $request->pekerjaan,
            'foto_ktp' => basename($imagePath),
        ]);
        return redirect()->route('input')->with('success', 'Data berhasil disimpan');
    }

    // BUAT MENAMPILKAN DATA
    public function dataShow()
    {
        $data = ModelsData::latest()->simplePaginate(3);
        return view('data', compact('data'));
    }
}
