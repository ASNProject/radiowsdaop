<?php

namespace App\Exports;

use App\Models\VAmps;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class VAmpsExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return VAmps::select('created_at', 'voltage', 'current')->get();
    }

    public function headings(): array
    {
        return [
            'Timestamp',
            'Voltage',
            'Current'
        ];
    }
}
