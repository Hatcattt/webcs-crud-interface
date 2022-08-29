<?php

namespace App\Http\Controllers;

use App\Custom\Abord\Abord;
use App\Exports\EmployeeExport;
use App\Models\Branch;
use App\Models\Department;
use App\Models\Employee;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

/**
 * Class EmployeeController
 * @package App\Http\Controllers
 */
class EmployeeController extends Controller
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
        $employees = Employee::with(['branch', 'department', 'employee'])->paginate();
        return view('crud.employee.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employee = new Employee();

        $branchs = Branch::all()->pluck('name','branch_id');
        $departments = Department::all()->pluck('name', 'dept_id');
        $superiors = Employee::all()->pluck('full_name', 'emp_id');

        return view('crud.employee.create', compact('employee', 'branchs', 'departments', 'superiors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Employee::$rules);

        try {
            $employee = Employee::create($request->all());
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error : Unable to execute this action !');
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
        $employee = Employee::findOrFail($id);

        $branchs = Branch::all()->pluck('name','branch_id');
        $departments = Department::all()->pluck('name', 'dept_id');
        $superiors = Employee::all()->pluck('full_name', 'emp_id');

        return view('crud.employee.edit', compact('employee', 'branchs', 'departments', 'superiors'));
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
        request()->validate(Employee::$rules);

        try {
            $employee->update($request->all());
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error : Unable to execute this action !');
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
