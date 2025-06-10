<?php

namespace App\Exports;

use App\Models\RekapanDua;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use Carbon\Carbon;

class RekapanDuaExport implements FromArray, WithStyles, WithColumnWidths, WithTitle
{
    public function array(): array
    {
        $data = RekapanDua::all();

        // Header judul dan tanggal
        $result = [
            ['REKAPAN BERKAS PEMUTUS LSBU GKB JATIM'], // Baris 1
            ['Tanggal Ekspor: ' . Carbon::now()->format('d/m/Y H:i')], // Baris 2
            [''], // Baris kosong 3
            // Header kolom - Baris 4
            [
                'No',
                'Nama BU',
                'ID Izin',
                'KBLI',
                'Pemutus 1',
                'Pemutus 2',
                'Pemutus 3',
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
                $item->nama_bu,
                $item->id_izin,
                $item->kbli,
                $item->pemutus_1,
                $item->pemutus_2,
                $item->pemutus_3,
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
        $dataCount = RekapanDua::count();
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
                    'startColor' => ['rgb' => '28A745'] // Warna hijau
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
            'A4:K' . $lastRow => [
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
            'E' => 15,  // Pemutus 1
            'F' => 15,  // Pemutus 2
            'G' => 15,  // Pemutus 3
            'H' => 18,  // Tanggal Penunjukan
            'I' => 30,  // Catatan
            'J' => 18,  // Created At
            'K' => 18   // Updated At
        ];
    }

    public function title(): string
    {
        return 'Rekap Berkas Pemutus';
    }
}
