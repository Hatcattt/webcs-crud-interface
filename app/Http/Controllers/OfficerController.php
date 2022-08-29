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
        $officers = Officer::with('customer')->paginate();
        return view('crud.officer.index', compact('officers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $officer = new Officer();

        session()->keep('cust_id');
        $cust_id = session()->get('cust_id');

        return view('crud.officer.create', compact('officer', 'cust_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Officer::$rules);

        try {
            $officer = Officer::create($request->all());
        } catch (\Exception $e) {
            return redirect()->route('officer.index')->with('error', 'Error : Unable to execute this action !');
        }

        return redirect()->route('business.index')
            ->with('success', 'Business officer customer created successfully.');
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
        request()->validate(Officer::$rules);

        try {
            $officer->update($request->all());
        } catch (\Exception $e) {
            return redirect()->route('officer.index')->with('error', 'Error : Unable to execute this action !');
        }
        return redirect()->route('officer.index')
            ->with('success', 'Business officer customer updated successfully');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
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
