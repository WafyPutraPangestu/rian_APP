<?php

namespace App\Exports;

use App\Models\RekapanTiga;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use Carbon\Carbon;

class RekapanTigaExport implements FromArray, WithStyles, WithColumnWidths, WithTitle
{
    public function array(): array
    {
        $data = RekapanTiga::all();

        // Header judul dan tanggal
        $result = [
            ['REKAP BERKAS MASUK GKB JATIM'], // Baris 1
            ['Tanggal Ekspor: ' . Carbon::now()->format('d/m/Y H:i')], // Baris 2
            [''], // Baris kosong 3
            // Header kolom - Baris 4
            [
                'No',
                'Kode BU',
                'Nama BU',
                'ID Izin',
                'NIB',
                'Kab/Kota',
                'KUA',
                'KBLI',
                'Tanggal OSS',
                'Tanggal LSBU',
                'Admin',
                'Kode TTP',
                'Tim Tinjauan',
                'Tanggal Penunjukan',
                'Catatan',
                'Created At',
                'Updated At'
            ]
        ];

        // Data - mulai dari baris 5
        foreach ($data as $index => $item) {
            $result[] = [
                $index + 1, // Nomor urut
                $item->kode_bu,
                $item->nama_bu,
                $item->id_izin,
                $item->nib,
                $item->kab_kota,
                $item->kua,
                $item->kbli,
                $item->tanggal_oss,
                $item->tanggal_lsbu,
                $item->admin,
                $item->kode_ttp,
                $item->tim_tinjauan,
                $item->tanggal_penunjukan,
                $item->catatan,
                $item->created_at ? $item->created_at->format('Y-m-d H:i:s') : '',
                $item->updated_at ? $item->updated_at->format('Y-m-d H:i:s') : ''
            ];
        }

        return $result;
    }

    public function styles(Worksheet $sheet)
    {
        $dataCount = RekapanTiga::count();
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
                    'startColor' => ['rgb' => 'DC3545'] // Warna merah
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
            'A4:Q' . $lastRow => [
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
            'B' => 12,  // Kode BU
            'C' => 25,  // Nama BU
            'D' => 15,  // ID Izin
            'E' => 15,  // NIB
            'F' => 15,  // Kab/Kota
            'G' => 10,  // KUA
            'H' => 10,  // KBLI
            'I' => 15,  // Tanggal OSS
            'J' => 15,  // Tanggal LSBU
            'K' => 15,  // Admin
            'L' => 12,  // Kode TTP
            'M' => 15,  // Tim Tinjauan
            'N' => 18,  // Tanggal Penunjukan
            'O' => 30,  // Catatan
            'P' => 18,  // Created At
            'Q' => 18   // Updated At
        ];
    }

    public function title(): string
    {
        return 'Rekap Berkas Masuk';
    }
}
