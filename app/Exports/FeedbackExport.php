<?php

namespace App\Exports;

use App\Models\Feedback;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class FeedbackExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Feedback::all();
    }

    public function headings(): array
    {
        return [
            ['DATA FEEDBACK PENGGUNA'], // Judul di atas kolom
            ['ID', 'Keterangan', 'Created At', 'Updated At'],
            
        ];
    }
}
