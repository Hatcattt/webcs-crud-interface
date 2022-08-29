<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Individual;
use App\Custom\Abord\Abord;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use App\Exports\IndividualExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Schema;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

/**
 * Class IndividualController
 * @package App\Http\Controllers
 */
class IndividualController extends Controller
{

    /**
     *  Middleware to ensure that a user who have "reader" role, can only see index() and show() methods.
     */
    public function __construct()
    {
        $this->middleware(['auth', 'role:admin'], ['except' => ['show', 'index']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $individuals = Individual::with('customer')->paginate();
        return view('crud.individual.index', compact('individuals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $individual = new Individual();

        session()->keep('cust_id');
        $cust_id = session()->get('cust_id');

        return view('crud.individual.create', compact('individual', 'cust_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Individual::$rules);

        try {
            $individual = Individual::create($request->all());
        } catch (Exception $e) {
            return redirect()->route('individual.index')->with('error', 'Error : Unable to execute this action !');
        }
        return redirect()->route('individual.index')
            ->with('success', 'Individual customer created successfully.');
    }

    /**
     * Display the specified resource.
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $individual = Individual::with('customer')->findOrFail($id);
        return view('crud.individual.show', compact('individual'));
    }

    /**
     * Show the form for editing the specified resource.
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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
