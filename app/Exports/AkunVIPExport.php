<?php

namespace App\Exports;

use App\Models\AkunVip;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AkunVIPExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return AkunVip::all();
    }

    public function headings(): array
{
    return [
        ['DATA TAMU AKUN VIP'], // Judul di atas kolom
        ['ID', 'Username', 'Nama', 'Email', 'Password', 'Alamat', 'No. Telepon', 'Tanggal Lahir', 'Created-at', 'Updated-at',],
    ];
}


}
