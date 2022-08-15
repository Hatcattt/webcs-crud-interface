<?php

namespace App\Http\Controllers;

use App\Custom\Abord\Abord;
use App\Exports\EmployeeExport;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

/**
 * Class EmployeeController
 * @package App\Http\Controllers
 */
class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::get();
        $columns = Schema::getColumnListing('employee');
        return view('crud.employee.index', compact('employees', 'columns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Abord::ifReader();
        $employee = new Employee();
        return view('crud.employee.create', compact('employee'));
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
        request()->validate(Employee::$rules);

        try {
            $employee = Employee::create($request->all());
        } catch (\Exception $e) {
            return redirect()->route('employee.index')->with('error', 'Error : Unable to execute this action !');
        }

        return redirect()->route('employee.index')
            ->with('success', 'Employee created successfully.');
    }

    /**
     * Display the specified resource.
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::findOrFail($id);

        return view('crud.employee.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        Abord::ifReader();
        $employee = Employee::findOrFail($id);

        return view('crud.employee.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Employee $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        Abord::ifReader();
        request()->validate(Employee::$rules);

        try {
            $employee->update($request->all());
        } catch (\Exception $e) {
            return redirect()->route('employee.index')->with('error', 'Error : Unable to execute this action !');
        }
        return redirect()->route('employee.index')
            ->with('success', 'Employee updated successfully');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        Abord::ifReader();
        try {
            $employee = Employee::findOrFail($id)->delete();
        } catch (\Exception $e) {
            return redirect()->route('employee.index')->with('error', 'Error : Unable to execute this action !');
        }
        return redirect()->route('employee.index')
            ->with('success', 'Employee deleted successfully');
    }

    /**
     * Export to a xlsx file.
     * @return BinaryFileResponse
     */
    public function export()
    {
        return Excel::download(new EmployeeExport, 'employees.xlsx');
    }
}
