<?php

namespace App\Http\Controllers;

use App\Custom\Abord\Abord;
use App\Exports\BusinessExport;
use App\Models\Business;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

/**
 * Class BusinessController
 * @package App\Http\Controllers
 */
class BusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $businesses = Business::get();
        $columns = Schema::getColumnListing('business');
        return view('crud.business.index', compact('businesses', 'columns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Abord::ifReader();
        $business = new Business();
        return view('crud.business.create', compact('business'));
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
        request()->validate(Business::$rules);

        $business = Business::create($request->all());

        return redirect()->route('business.index')
            ->with('success', 'Business created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $business = Business::findOrFail($id);
        return view('crud.business.show', compact('business'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        Abord::ifReader();
        $business = Business::findOrFail($id);
        return view('crud.business.edit', compact('business'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Business $business
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Business $business)
    {
        Abord::ifReader();
        request()->validate(Business::$rules);

        try {
            $business->update($request->all());
        } catch (\Exception $e) {
            return redirect()->route('business.index')->with('error', 'Error : Unable to execute this action !');
        }

        return redirect()->route('business.index')
            ->with('success', 'Business updated successfully');
    }

    /**
     * @param  $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        Abord::ifReader();
        try {
            $business = Business::findOrFail($id)->delete();
        } catch (\Exception $e) {
            return redirect()->route('business.index')->with('error', 'Error : Unable to execute this action !');
        }

        return redirect()->route('business.index')
            ->with('success', 'Business deleted successfully');
    }

    /**
     * Export to a xlsx file.
     * @return BinaryFileResponse
     */
    public function export()
    {
        return Excel::download(new BusinessExport, 'businesses.xlsx');
    }
}
