<?php

namespace App\Exports;

use App\Lapra;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class LaporanExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents, AfterSheet
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Lapra::all();
    }

    public function headings(): array{
        return [
            'No',
            'Judul',
            'Isi',
            'Perkiraan Biaya',
            'Tempat',
            'Tanggal Laporan'
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'A1:W1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);
            },
        ];
    }
}
