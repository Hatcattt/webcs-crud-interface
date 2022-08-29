<?php

namespace App\Http\Controllers;

use App\Custom\Abord\Abord;
use App\Exports\DepartmentExport;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

/**
 * Class DepartmentController
 * @package App\Http\Controllers
 */
class DepartmentController extends Controller
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
        $departments = Department::paginate();
        return view('crud.department.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $department = new Department();
        return view('crud.department.create', compact('department'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Department::$rules);

        try {
            $department = Department::create($request->all());
        } catch (\Exception $e) {
            return redirect()->route('department.index')->with('error', 'Error : Unable to execute this action !');
        }
        return redirect()->route('department.index')
            ->with('success', 'Department created successfully.');
    }

    /**
     * Display the specified resource.
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $department = Department::findOrFail($id);
        return view('crud.department.show', compact('department'));
    }

    /**
     * Show the form for editing the specified resource.
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $department = Department::findOrFail($id);

        return view('crud.department.edit', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Department $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Department $department)
    {
        request()->validate(Department::$rules);

        try {
            $department->update($request->all());
        } catch (\Exception $e) {
            return redirect()->route('department.index')->with('error', 'Error : Unable to execute this action !');
        }

        return redirect()->route('department.index')
            ->with('success', 'Department updated successfully');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        try {
            $department = Department::findOrFail($id)->delete();
        } catch (\Exception $e) {
            return redirect()->route('department.index')->with('error', 'Error : Unable to execute this action !');
        }

        return redirect()->route('department.index')
            ->with('success', 'Department deleted successfully');
    }

    /**
     * Export to a xlsx file.
     * @return BinaryFileResponse
     */
    public function export()
    {
        return Excel::download(new DepartmentExport, 'departments.xlsx');
    }
}
