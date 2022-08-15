<?php

namespace App\Http\Controllers;

use App\Custom\Abord\Abord;
use App\Exports\IndividualExport;
use App\Models\Individual;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

/**
 * Class IndividualController
 * @package App\Http\Controllers
 */
class IndividualController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $individuals = Individual::get();
        $columns = Schema::getColumnListing('individual');

        return view('crud.individual.index', compact('individuals', 'columns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Abord::ifReader();
        $individual = new Individual();
        return view('crud.individual.create', compact('individual'));
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
        request()->validate(Individual::$rules);

        $individual = Individual::create($request->all());

        return redirect()->route('individual.index')
            ->with('success', 'Individual created successfully.');
    }

    /**
     * Display the specified resource.
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $individual = Individual::findOrFail($id);

        return view('crud.individual.show', compact('individual'));
    }

    /**
     * Show the form for editing the specified resource.
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        Abord::ifReader();
        $individual = Individual::findOrFail($id);

        return view('crud.individual.edit', compact('individual'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Individual $individual
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Individual $individual)
    {
        Abord::ifReader();
        request()->validate(Individual::$rules);

        try {
            $individual->update($request->all());
        } catch (Exception $e) {
            return redirect()->route('individual.index')->with('error', 'Error : Unable to execute this action !');
        }
        return redirect()->route('individual.index')
            ->with('success', 'Individual updated successfully');
    }

    /**
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy($id)
    {
        Abord::ifReader();
        try {
            $individual = Individual::findOrFail($id)->delete();
        } catch (Exception $e) {
            return redirect()->route('individual.index')->with('error', 'Error : Unable to execute this action !');
        }
        return redirect()->route('individual.index')
            ->with('success', 'Individual deleted successfully');
    }

    /**
     * Export to a xlsx file.
     * @return BinaryFileResponse
     */
    public function export()
    {
        return Excel::download(new IndividualExport, 'individuals.xlsx');
    }
}
