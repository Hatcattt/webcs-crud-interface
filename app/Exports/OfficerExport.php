<?php

namespace App\Exports;

use App\Models\Officer;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OfficerExport implements FromCollection, WithHeadings
{
    /**
    * @return Collection
    */
    public function collection(): Collection
    {
        return Officer::all();
    }

    public function headings(): array
    {
        return (new Officer)->getFillable();
    }
}
