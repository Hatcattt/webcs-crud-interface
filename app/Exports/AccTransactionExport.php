<?php

namespace App\Exports;

use App\Models\AccTransaction;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AccTransactionExport implements FromCollection, WithHeadings
{
    /**
    * @return Collection
    */
    public function collection(): Collection
    {
        return AccTransaction::all();
    }

    public function headings(): array
    {
        return (new AccTransaction)->getFillable();
    }
}
