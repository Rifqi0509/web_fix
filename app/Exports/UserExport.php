<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UserExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::all();
    }

    public function headings(): array
    {
        return [
        ['DATA TAMU AKUN VIP'], // Judul di atas kolom
        ['ID', 'Username', 'Nama', 'Email', 'Password', 'Alamat', 'No. Telepon', 'Tanggal Lahir', 'Created-at', 'Updated-at',],
    ];
    }
}
