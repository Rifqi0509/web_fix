<?php

namespace App\Exports;

use App\Models\Admin;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProfileExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Admin::all();
    }

    public function headings(): array
    {
        return [
            ['DATA AKUN ADMIN'], // Judul di atas kolom
            ['ID', 'Nama', 'Email', 'User', 'Password', 'Created-at', 'Updated-at',],
            
        ];
    }
}
