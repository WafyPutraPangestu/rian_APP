<?php

namespace App\Http\Controllers;

use App\Exports\RekapanDuaExport;
use App\Models\RekapanDua;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class RekapanduaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rekapanDuas = RekapanDua::latest()->paginate(10);
        return view('rekapandua.index', compact('rekapanDuas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('rekapandua.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'nama_bu' => 'required|string|max:255|exists:kamus_b_u_s,nama_bu',
                'id_izin' => 'nullable|string|max:255',
                'kbli' => 'nullable|string|max:255',
                'pemutus_1' => 'nullable|string|max:255',
                'pemutus_2' => 'nullable|string|max:255',
                'pemutus_3' => 'nullable|string|max:255',
                'tgl_penunjukan' => 'required|date',
                'catatan' => 'nullable|string',
            ], [
                'nama_bu.required' => 'Nama BU harus diisi.',
                'nama_bu.exists' => 'Nama BU tidak ditemukan di kamus.',
                'tgl_penunjukan.required' => 'Tanggal penunjukan harus diisi.',
                'tgl_penunjukan.date' => 'Tanggal penunjukan harus berupa tanggal yang valid.',
            ]);

            RekapanDua::create($validated);

            return redirect()->route('rekapandua.index')->with('success', 'Data rekap dua berhasil disimpan!');
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
        $rekapanDua = RekapanDua::findOrFail($id);
        return view('rekapandua.edit', compact('rekapanDua'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $rekapanDua = RekapanDua::findOrFail($id);

            $validated = $request->validate([
                'nama_bu' => 'required|string|max:255|exists:kamus_b_u_s,nama_bu',
                'id_izin' => 'nullable|string|max:255',
                'kbli' => 'nullable|string|max:255',
                'pemutus_1' => 'nullable|string|max:255',
                'pemutus_2' => 'nullable|string|max:255',
                'pemutus_3' => 'nullable|string|max:255',
                'tgl_penunjukan' => 'required|date',
                'catatan' => 'nullable|string',
            ], [
                'nama_bu.required' => 'Nama BU harus diisi.',
                'nama_bu.exists' => 'Nama BU tidak ditemukan di kamus.',
                'tgl_penunjukan.required' => 'Tanggal penunjukan harus diisi.',
                'tgl_penunjukan.date' => 'Tanggal penunjukan harus berupa tanggal yang valid.',
            ]);

            $rekapanDua->update($validated);

            return redirect()->route('rekapandua.index')->with('success', 'Data rekap dua berhasil diperbarui!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
    public function export()
    {
        return Excel::download(new RekapanDuaExport, 'rekapan_dua.xlsx');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $rekapanDua = RekapanDua::findOrFail($id);
            $rekapanDua->delete();
            return redirect()->route('rekapandua.index')->with('success', 'Data rekap dua berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
