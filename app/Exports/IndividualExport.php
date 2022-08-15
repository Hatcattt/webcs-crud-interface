<?php

namespace App\Exports;

use App\Models\Individual;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class IndividualExport implements FromCollection, WithHeadings
{
    /**
    * @return Collection
    */
    public function collection()
    {
        return Individual::all();
    }

    public function headings(): array
    {
        return (new Individual)->getFillable();
    }
}
