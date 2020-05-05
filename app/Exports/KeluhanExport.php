<?php

namespace App\Exports;

use App\Keluhan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class KeluhanExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Keluhan::all();
    }

    public function headings(): array{
        return [
            'No',
            'Judul',
            'Isi',
            'Tempat',
            'Tanggal Laporan'
        ];
    }
}
