<?php

namespace App\Http\Controllers;

use App\Custom\Tables\OriginalTables;

class ExportController extends Controller
{
    public function index()
    {
        $tables = OriginalTables::get();
        return view('export.index', compact(['tables']));
    }
}
