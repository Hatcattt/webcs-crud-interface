<?php

namespace App\Http\Controllers;

use App\Custom\Abord\Abord;
use App\Exports\BranchExport;
use App\Models\Branch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

/**
 * Class BranchController
 * @package App\Http\Controllers
 */
class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $branches = Branch::get();
        $columns = Schema::getColumnListing('branch');
        return view('crud.branch.index', compact('branches', 'columns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Abord::ifReader();
        $branch = new Branch();
        return view('crud.branch.create', compact('branch'));
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
        request()->validate(Branch::$rules);

        $branch = Branch::create($request->all());

        return redirect()->route('branch.index')
            ->with('success', 'Branch created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $branch = Branch::findOrFail($id);
        return view('crud.branch.show', compact('branch'));
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
        $branch = Branch::findOrFail($id);
        return view('crud.branch.edit', compact('branch'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Branch $branch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Branch $branch)
    {
        Abord::ifReader();
        request()->validate(Branch::$rules);
        try {
            $branch->update($request->all());
        } catch (\Exception $e) {
            return redirect()->route('branch.index')->with('error', 'Error : Unable to execute this action !');
        }

        return redirect()->route('branch.index')
            ->with('success', 'Branch updated successfully');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        Abord::ifReader();
        try {
            $branch = Branch::findOrFail($id)->delete();
        } catch (\Exception $e) {
            return redirect()->route('branch.index')->with('error', 'Error : Unable to execute this action !');
        }

        return redirect()->route('branch.index')
            ->with('success', 'Branch deleted successfully');
    }

    /**
     * Export to a xlsx file.
     * @return BinaryFileResponse
     */
    public function export()
    {
        return Excel::download(new BranchExport, 'branches.xlsx');
    }
}
