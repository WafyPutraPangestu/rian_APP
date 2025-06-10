<?php

namespace App\Exports;

use App\Models\RekapanSatu;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use Carbon\Carbon;

class RekapanSatuExport implements FromArray, WithStyles, WithColumnWidths, WithTitle
{
    public function array(): array
    {
        $data = RekapanSatu::all();

        // Header judul dan tanggal
        $result = [
            ['REKAP PEMBAYARAN SBU '], // Baris 1
            ['Tanggal Ekspor: ' . Carbon::now()->format('d/m/Y H:i')], // Baris 2
            [''], // Baris kosong 3
            // Header kolom - Baris 4
            [
                'No',
                'Nama BU',
                'ID Izin',
                'KBLI',
                'Asosiasi',
                'Kota/Kab',
                'Tanggal Pembayaran',
                'Nama TTP',
                'Jumlah Biaya',
                'Status Terbit',
                'Nama ABU 1',
                'Nama ABU 2',
                'Nama Pemutus 1',
                'Nama Pemutus 2',
                'Nama Pemutus 3',
                'KUA',
                'Metode Bayar',
                'Potongan Admin',
                'Created At',
                'Updated At'
            ]
        ];

        // Data - mulai dari baris 5
        foreach ($data as $index => $item) {
            $result[] = [
                $index + 1, // Nomor urut
                $item->nama_bu,
                $item->id_izin,
                $item->kbli,
                $item->asosiasi,
                $item->kota_kab,
                $item->tanggal_pembayaran,
                $item->nama_ttp,
                $item->jumlah_biaya,
                $item->status_terbit,
                $item->nama_abu_1,
                $item->nama_abu_2,
                $item->nama_pemutus_1,
                $item->nama_pemutus_2,
                $item->nama_pemutus_3,
                $item->kua,
                $item->metode_bayar,
                $item->potongan_admin,
                $item->created_at ? $item->created_at->format('Y-m-d H:i:s') : '',
                $item->updated_at ? $item->updated_at->format('Y-m-d H:i:s') : ''
            ];
        }

        return $result;
    }

    public function styles(Worksheet $sheet)
    {
        $dataCount = RekapanSatu::count();
        $lastRow = $dataCount + 4; // +4 karena header di baris 4

        return [
            // Style untuk judul - baris 1
            1 => [
                'font' => [
                    'bold' => true,
                    'size' => 14
                ],
                'alignment' => [
                    'horizontal' => Alignment::HORIZONTAL_LEFT
                ]
            ],
            // Style untuk tanggal ekspor - baris 2
            2 => [
                'font' => [
                    'size' => 10
                ],
                'alignment' => [
                    'horizontal' => Alignment::HORIZONTAL_LEFT
                ]
            ],
            // Style untuk header - baris 4
            4 => [
                'font' => [
                    'bold' => true,
                    'color' => ['rgb' => 'FFFFFF'],
                    'size' => 11
                ],
                'fill' => [
                    'fillType' => Fill::FILL_SOLID,
                    'startColor' => ['rgb' => '4472C4']
                ],
                'alignment' => [
                    'horizontal' => Alignment::HORIZONTAL_CENTER,
                    'vertical' => Alignment::VERTICAL_CENTER,
                    'wrapText' => true
                ],
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => Border::BORDER_THIN,
                        'color' => ['rgb' => '000000']
                    ]
                ]
            ],
            // Style untuk semua data
            'A4:T' . $lastRow => [
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => Border::BORDER_THIN,
                        'color' => ['rgb' => '000000']
                    ]
                ],
                'alignment' => [
                    'vertical' => Alignment::VERTICAL_CENTER,
                    'wrapText' => true
                ]
            ]
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 5,   // No
            'B' => 25,  // Nama BU
            'C' => 15,  // ID Izin
            'D' => 10,  // KBLI
            'E' => 15,  // Asosiasi
            'F' => 15,  // Kota/Kab
            'G' => 18,  // Tanggal Pembayaran
            'H' => 15,  // Nama TTP
            'I' => 15,  // Jumlah Biaya
            'J' => 12,  // Status Terbit
            'K' => 15,  // Nama ABU 1
            'L' => 15,  // Nama ABU 2
            'M' => 15,  // Nama Pemutus 1
            'N' => 15,  // Nama Pemutus 2
            'O' => 15,  // Nama Pemutus 3
            'P' => 10,  // KUA
            'Q' => 15,  // Metode Bayar
            'R' => 15,  // Potongan Admin
            'S' => 18,  // Created At
            'T' => 18   // Updated At
        ];
    }

    public function title(): string
    {
        return 'Rekap Pembayaran SBU';
    }
}
