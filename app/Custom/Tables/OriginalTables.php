<?php

namespace App\Custom\Tables;

use Illuminate\Support\Facades\DB;

/**
 * Used to have tables from the original database, without the basic laravel tables.
 */
class OriginalTables
{

    /**
     * @return array All tables from original database imported.
     */
    static function get(): array
    {
        $tables = DB::select('SHOW TABLES');

        unset($tables[7], $tables[9], $tables[11], $tables[12], $tables[15]);
        array_splice($tables, 1, 1);
        return $tables;
    }
}
