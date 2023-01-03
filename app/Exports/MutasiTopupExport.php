<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;

class MutasiTopupExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    public function __construct($mutasi)
    {
        $this->mutasi = $mutasi;
    }
    // public function registerEvents(): array {
    //     return [
    //         AfterSheet::class    => function(AfterSheet $event) {
    //             $cellRange = 'A1:J1'; // All headers
    //             $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);
    //         },
    //     ];
    // }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings():array{
        return [
            'Reff',
            'Kode Produk',
            'Rekening',
            'Keterangan',
            'Nominal',
            'Status',
            'Date Time'
        ];
    }
    public function collection()
    {
        return $this->mutasi;
    }
}
