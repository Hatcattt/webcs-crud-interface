<?php

namespace App\Exports;

use App\Models\ProductType;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductTypeExport implements FromCollection, WithHeadings
{
    /**
    * @return Collection
    */
    public function collection(): Collection
    {
        return ProductType::all();
    }

    public function headings(): array
    {
        return (new ProductType)->getFillable();
    }
}
