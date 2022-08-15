<?php

namespace App\Exports;

use App\Models\Business;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BusinessExport implements FromCollection, WithHeadings
{
    /**
    * @return Collection
    */
    public function collection(): Collection
    {
        return Business::all();
    }

    public function headings(): array
    {
        return (new Business)->getFillable();
    }
}
