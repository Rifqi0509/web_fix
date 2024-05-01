<?php

namespace App\Exports;

use App\Models\Visitor;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class VisitorExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Visitor::all();
    }

    public function headings(): array
    {
        return [
            ['DATA TAMU KUNJUNGAN'], // Judul di atas kolom
            ['ID', 'Nama', 'Alamat', 'Keperluan', 'Asal Instansi', 'Nomor HP', 'Tanggal', 'TTD','Created At', 'Update At'],
            
        ];
    }

 
}
