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

            // Validasi data tambahan
            'nama_badan_usaha' => ['required', 'string'],
            'nib' => ['required', 'string'],
            'npwp' => ['nullable', 'string'],
            'alamat_kantor' => ['required', 'string'],
            'provinsi' => ['required', 'string'],
            'kabupaten' => ['required', 'string'],
            'kode_pos' => ['nullable', 'string'],
            'no_telepon' => ['nullable', 'string'],
            'email_perusahaan' => ['nullable', 'email'],

            // Dokumen pendukung opsional
            'akte_pendirian' => ['nullable', 'string'],
            'siup' => ['nullable', 'string'],
            'tdp' => ['nullable', 'string'],
            'sertifikat_iso' => ['nullable', 'string'],
            'struktur_organisasi' => ['nullable', 'string'],
            'dokumen_pendukung_lain' => ['nullable', 'string'],

            'catatan' => ['nullable', 'string'],
        ]);

        // Upload KTP
        $image = $request->file('foto_ktp');
        $imagePath = $image->store('images', 'public');

        // Simpan ke database
        ModelsData::create([
            'user_id' => Auth::id(),
            'nik' => $request->nik,
            'nama_lengkap' => $request->nama_lengkap,
            'jenis_kelamin' => $request->jenis_kelamin,
            'agama' => $request->agama,
            'pekerjaan' => $request->pekerjaan,
            'foto_ktp' => basename($imagePath),

            'nama_badan_usaha' => $request->nama_badan_usaha,
            'nib' => $request->nib,
            'npwp' => $request->npwp,
            'alamat_kantor' => $request->alamat_kantor,
            'provinsi' => $request->provinsi,
            'kabupaten' => $request->kabupaten,
            'kode_pos' => $request->kode_pos,
            'no_telepon' => $request->no_telepon,
            'email_perusahaan' => $request->email_perusahaan,

            'akte_pendirian' => $request->akte_pendirian,
            'siup' => $request->siup,
            'tdp' => $request->tdp,
            'sertifikat_iso' => $request->sertifikat_iso,
            'struktur_organisasi' => $request->struktur_organisasi,
            'dokumen_pendukung_lain' => $request->dokumen_pendukung_lain,

            'catatan' => $request->catatan,
        ]);

        return redirect()->route('input')->with('success', 'Data berhasil disimpan');
    }

    // BUAT MENAMPILKAN DATA
    public function dataShow()
    {
        $data = ModelsData::latest()->simplePaginate(2);
        return view('data', compact('data'));
    }
}
