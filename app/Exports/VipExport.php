<?php

namespace App\Exports;

use App\Models\Vip;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class VipExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Vip::all();
    }

    public function headings(): array
    {
        return [
            ['DATA TAMU VIP'], // Judul di atas kolom
            ['ID','Kode Undangan', 'Nama', 'Alamat', 'Keperluan', 'Asal Instansi', 'Nomor HP', 'Tanggal', 'Status', 'Departemen', 'Seksi', 'Keterangan', 'Created At', 'Update At'],
            
        ];
    }

 
}
