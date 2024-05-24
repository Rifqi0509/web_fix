<?php

namespace App\Exports;

use App\Models\Admin;
use Maatwebsite\Excel\Concerns\FromCollection;

class UsersExport implements FromCollection
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
            'id',
            'Name',
            'Email',
            'email_verified_at',
            'created_at',
            'updated_at',
        ];
    }
}
