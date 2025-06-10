<?php

namespace App\Http\Controllers;

use App\Exports\RekapanSatuExport;
use App\Models\RekapanSatu;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class RekapanSatuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rekapanSatus = RekapanSatu::latest()->paginate(10);
        return view('rekapansatu.index', compact('rekapanSatus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('rekapansatu.create');
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
                'asosiasi' => 'nullable|string|max:255',
                'kota_kab' => 'nullable|string|max:255',
                'tanggal_pembayaran' => 'required|date',
                'nama_ttp' => 'nullable|string|max:255',
                'nama_abu_1' => 'nullable|string|max:255',
                'nama_abu_2' => 'nullable|string|max:255',
                'nama_pemutus_1' => 'nullable|string|max:255',
                'nama_pemutus_2' => 'nullable|string|max:255',
                'nama_pemutus_3' => 'nullable|string|max:255',
                'kua' => 'nullable|string|max:255',
                'mtd_byr' => 'nullable|string|max:255',
                'jumlah_biaya' => 'nullable|numeric|min:0',
                'potongan_admin' => 'nullable|numeric|min:0',
                'status_terbit' => 'nullable|string|max:255',
            ], [
                'nama_bu.required' => 'Nama BU harus diisi.',
                'nama_bu.exists' => 'Nama BU tidak ditemukan di kamus.',
                'tanggal_pembayaran.date' => 'Tanggal pembayaran harus berupa tanggal yang valid.',
                'jumlah_biaya.numeric' => 'Jumlah biaya harus berupa angka.',
                'potongan_admin.numeric' => 'Potongan admin harus berupa angka.',
            ]);

            RekapanSatu::create($validated);

            return redirect()->route('rekapansatu.index')->with('success', 'Data rekap satu berhasil disimpan!');
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
        $rekapanSatu = RekapanSatu::findOrFail($id);
        return view('rekapansatu.edit', compact('rekapanSatu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $rekapanSatu = RekapanSatu::findOrFail($id);

            $validated = $request->validate([
                'nama_bu' => 'required|string|max:255|exists:kamus_b_u_s,nama_bu',
                'id_izin' => 'nullable|string|max:255',
                'kbli' => 'nullable|string|max:255',
                'asosiasi' => 'nullable|string|max:255',
                'kota_kab' => 'nullable|string|max:255',
                'tanggal_pembayaran' => 'nullable|date',
                'nama_ttp' => 'nullable|string|max:255',
                'nama_abu_1' => 'nullable|string|max:255',
                'nama_abu_2' => 'nullable|string|max:255',
                'nama_pemutus_1' => 'nullable|string|max:255',
                'nama_pemutus_2' => 'nullable|string|max:255',
                'nama_pemutus_3' => 'nullable|string|max:255',
                'kua' => 'nullable|string|max:255',
                'mtd_byr' => 'nullable|string|max:255',
                'jumlah_biaya' => 'nullable|numeric|min:0',
                'potongan_admin' => 'nullable|numeric|min:0',
                'status_terbit' => 'nullable|string|max:255',
            ], [
                'nama_bu.required' => 'Nama BU harus diisi.',
                'nama_bu.exists' => 'Nama BU tidak ditemukan di kamus.',
                'tanggal_pembayaran.date' => 'Tanggal pembayaran harus berupa tanggal yang valid.',
                'jumlah_biaya.numeric' => 'Jumlah biaya harus berupa angka.',
                'potongan_admin.numeric' => 'Potongan admin harus berupa angka.',
            ]);

            $rekapanSatu->update($validated);

            return redirect()->route('rekapansatu.index')->with('success', 'Data rekap satu berhasil diperbarui!');
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
            $rekapanSatu = RekapanSatu::findOrFail($id);
            $rekapanSatu->delete();
            return redirect()->route('rekapansatu.index')->with('success', 'Data rekap satu berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function export()
    {
        return Excel::download(new RekapanSatuExport, 'rekapan_satu.xlsx');
    }
}
