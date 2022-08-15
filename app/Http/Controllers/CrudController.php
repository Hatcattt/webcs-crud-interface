<?php

namespace App\Http\Controllers;

use App\Custom\Tables\OriginalTables;

class CrudController extends Controller
{
    public function index()
    {
        return view('crud.index');
    }
}
