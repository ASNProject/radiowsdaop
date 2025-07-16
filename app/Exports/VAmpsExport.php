<?php

namespace App\Exports;

use App\Models\VAmps;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class VAmpsExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return VAmps::select('created_at', 'voltage', 'current')
            ->orderBy('created_at', 'desc') // urut dari yang terbaru
            ->get()
            ->map(function ($item) {
                return [
                    'voltage' => $item->voltage,
                    'current' => $item->current,
                    'created_at' => $item->created_at ? $item->created_at->translatedFormat('d F Y, H:i') : '-',

                ];
            });
    }

    public function headings(): array
    {
        return [
            'Tegangan (V)',
            'Arus (A)',
            'Waktu'
        ];
    }
}
