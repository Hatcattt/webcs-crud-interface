<?php

namespace App\Http\Controllers;

use App\Custom\Abord\Abord;
use App\Exports\OfficerExport;
use App\Models\Officer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

/**
 * Class OfficerController
 * @package App\Http\Controllers
 */
class OfficerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $officers = Officer::get();
        $columns = Schema::getColumnListing('officer');
        return view('crud.officer.index', compact('officers', 'columns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Abord::ifReader();
        $officer = new Officer();
        return view('crud.officer.create', compact('officer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Abord::ifReader();
        request()->validate(Officer::$rules);

        try {
            $officer = Officer::create($request->all());
        } catch (\Exception $e) {
            return redirect()->route('officer.index')->with('error', 'Error : Unable to execute this action !');
        }

        return redirect()->route('officer.index')
            ->with('success', 'Officer created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $officer = Officer::findOrFail($id);
        return view('crud.officer.show', compact('officer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        Abord::ifReader();
        $officer = Officer::findOrFail($id);

        return view('crud.officer.edit', compact('officer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Officer $officer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Officer $officer)
    {
        Abord::ifReader();
        request()->validate(Officer::$rules);

        try {
            $officer->update($request->all());
        } catch (\Exception $e) {
            return redirect()->route('officer.index')->with('error', 'Error : Unable to execute this action !');
        }
        return redirect()->route('officer.index')
            ->with('success', 'Officer updated successfully');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        Abord::ifReader();
        try {
            $officer = Officer::findOrFail($id)->delete();
        } catch (\Exception $e) {
            return redirect()->route('officer.index')->with('error', 'Error : Unable to execute this action !');
        }
        return redirect()->route('officer.index')
            ->with('success', 'Officer deleted successfully');
    }

    /**
     * Export to a xlsx file.
     * @return BinaryFileResponse
     */
    public function export()
    {
        return Excel::download(new OfficerExport, 'officers.xlsx');
    }
}
