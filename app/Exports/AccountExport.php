<?php

namespace App\Exports;

use App\Models\Account;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AccountExport implements FromCollection, WithHeadings
{
    /**
    * @return Collection
    */
    public function collection(): Collection
    {
        return Account::all();
    }

    public function headings(): array
    {
        return (new Account)->getFillable();
    }
}
