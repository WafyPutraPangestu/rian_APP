<?php

namespace App\Http\Controllers;

use App\Models\KamusBU;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class kamusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kamusBUs = KamusBU::latest()->paginate(10);
        return view('kamus.index', compact('kamusBUs'));
    }

    public function create()
    {
        return view('kamus.create');
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate(
                [
                    'nama_bu' => 'required|string|max:255|unique:kamus_b_u_s,nama_bu',
                    'id_izin' => 'required|string|max:255|unique:kamus_b_u_s,id_izin',
                    'kbli' => 'required|string|max:255',
                    'kode_bu' => 'required|string|max:255',
                ],
                [
                    'nama_bu.required' => 'Nama BU harus diisi.',
                    'id_izin.required' => 'ID Izin harus diisi.',
                    'kbli.required' => 'KBLI harus diisi.',
                    'kode_bu.required' => 'Kode BU harus diisi.',
                    'nama_bu.unique' => 'Nama BU sudah ada.',
                    'id_izin.unique' => 'ID Izin sudah ada.',
                ]
            );

            KamusBU::create($validated);

            return redirect()->route('kamus.index')->with('success', 'Data Kamus BU berhasil ditambahkan!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function show(KamusBU $kamus)
    {
        return view('kamus.show', compact('kamus'));
    }

    public function edit(KamusBU $kamus)
    {
        return view('kamus.edit', compact('kamus'));
    }

    public function update(Request $request, KamusBU $kamus)
    {
        $validated = $request->validate([
            'nama_bu' => ['required', 'string', 'max:255', Rule::unique('kamus_b_u_s')->ignore($kamus->id)],
            'id_izin' => ['required', 'string', 'max:255', Rule::unique('kamus_b_u_s')->ignore($kamus->id)],
            'kbli' => 'required|string|max:255',
            'kode_bu' => 'required|string|max:255',
        ]);

        $kamus->update($validated);

        return redirect()->route('kamus.index')->with('success', 'Data Kamus BU berhasil diperbarui!');
    }

    public function destroy(KamusBU $kamus)
    {
        $kamus->delete();
        return redirect()->route('kamus.index')->with('success', 'Data Kamus BU berhasil dihapus!');
    }

    // API untuk pencarian data kamus berdasarkan nama_bu
    public function searchByNamaBu(Request $request)
    {
        $namaBu = $request->get('nama_bu');
        $kamus = KamusBU::where('nama_bu', 'LIKE', "%{$namaBu}%")->get();

        if ($kamus->isNotEmpty()) {
            return response()->json([
                'success' => true,
                'data' => $kamus
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Data tidak ditemukan'
        ]);
    }
}
