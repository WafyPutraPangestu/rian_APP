<?php

namespace App\Http\Controllers;

use App\Models\RekapanTiga;
use Illuminate\Http\Request;

class RekapantigaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rekapanTigas = RekapanTiga::latest()->paginate(10);
        return view('rekapantiga.index', compact('rekapanTigas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('rekapantiga.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'kode_bu' => 'required|string|max:255|exists:kamus_b_u_s,kode_bu',
                'nama_bu' => 'required|string|max:255',
                'id_izin' => 'nullable|string|max:255',
                'nib' => 'nullable|string|max:255',
                'kab_kota' => 'nullable|string|max:255',
                'kua' => 'nullable|string|max:255',
                'kbli' => 'nullable|string|max:255',
                'tgl_oss' => 'nullable|date',
                'tgl_lsbu' => 'nullable|date',
                'admin' => 'nullable|string|max:255',
                'kode_ttp' => 'nullable|string|max:255',
                'tim_tinjauan' => 'nullable|string|max:255',
                'tgl_penunjukan' => 'nullable|date',
                'catatan' => 'nullable|string',
            ], [
                'kode_bu.required' => 'Kode BU harus diisi.',
                'kode_bu.exists' => 'Kode BU tidak ditemukan di kamus.',
                'nama_bu.required' => 'Nama BU harus diisi.',
                'tgl_oss.date' => 'Tanggal OSS harus berupa tanggal yang valid.',
                'tgl_lsbu.date' => 'Tanggal LSBU harus berupa tanggal yang valid.',
                'tgl_penunjukan.date' => 'Tanggal penunjukan harus berupa tanggal yang valid.',
            ]);

            RekapanTiga::create($validated);

            return redirect()->route('rekapantiga.index')->with('success', 'Data rekap tiga berhasil disimpan!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $rekapanTiga = RekapanTiga::findOrFail($id);
        return view('rekapantiga.edit', compact('rekapanTiga'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $rekapanTiga = RekapanTiga::findOrFail($id);

            $validated = $request->validate([
                'kode_bu' => 'required|string|max:255|exists:kamus_b_u_s,kode_bu',
                'nama_bu' => 'required|string|max:255',
                'id_izin' => 'nullable|string|max:255',
                'nib' => 'nullable|string|max:255',
                'kab_kota' => 'nullable|string|max:255',
                'kua' => 'nullable|string|max:255',
                'kbli' => 'nullable|string|max:255',
                'tgl_oss' => 'nullable|date',
                'tgl_lsbu' => 'nullable|date',
                'admin' => 'nullable|string|max:255',
                'kode_ttp' => 'nullable|string|max:255',
                'tim_tinjauan' => 'nullable|string|max:255',
                'tgl_penunjukan' => 'nullable|date',
                'catatan' => 'nullable|string',
            ], [
                'kode_bu.required' => 'Kode BU harus diisi.',
                'kode_bu.exists' => 'Kode BU tidak ditemukan di kamus.',
                'nama_bu.required' => 'Nama BU harus diisi.',
                'tgl_oss.date' => 'Tanggal OSS harus berupa tanggal yang valid.',
                'tgl_lsbu.date' => 'Tanggal LSBU harus berupa tanggal yang valid.',
                'tgl_penunjukan.date' => 'Tanggal penunjukan harus berupa tanggal yang valid.',
            ]);

            $rekapanTiga->update($validated);

            return redirect()->route('rekapantiga.index')->with('success', 'Data rekap tiga berhasil diperbarui!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $rekapanTiga = RekapanTiga::findOrFail($id);
            $rekapanTiga->delete();
            return redirect()->route('rekapantiga.index')->with('success', 'Data rekap tiga berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
