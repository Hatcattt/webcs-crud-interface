<?php

namespace App\Http\Controllers;

use App\Custom\Abord\Abord;
use App\Exports\CustomerExport;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

/**
 * Class CustomerController
 * @package App\Http\Controllers
 */
class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::get();
        $columns = Schema::getColumnListing('customer');
        return view('crud.customer.index', compact('customers', 'columns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Abord::ifReader();
        $customer = new Customer();
        return view('crud.customer.create', compact('customer'));
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
        request()->validate(Customer::$rules);

        try {
            $customer = Customer::create($request->all());
        } catch (\Exception $e) {
            return redirect()->route('customer.index')->with('error', 'Error : Unable to execute this action !');
        }
        return redirect()->route('customer.index')
            ->with('success', 'Customer created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = Customer::findOrFail($id);

        return view('crud.customer.show', compact('customer'));
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
        $customer = Customer::findOrFail($id);

        return view('crud.customer.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Customer $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        Abord::ifReader();
        request()->validate(Customer::$rules);

        try {
            $customer->update($request->all());
        } catch (\Exception $e) {
            return redirect()->route('customer.index')->with('error', 'Error : Unable to execute this action !');
        }

        return redirect()->route('customer.index')
            ->with('success', 'Customer updated successfully');
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
            $customer = Customer::find($id)->delete();
        } catch (\Exception $e) {
            return redirect()->route('customer.index')->with('error', 'Error : Unable to execute this action !');
        }
        return redirect()->route('customer.index')
            ->with('success', 'Customer deleted successfully');
    }

    /**
     * Export to a xlsx file.
     * @return BinaryFileResponse
     */
    public function export()
    {
        return Excel::download(new CustomerExport, 'customers.xlsx');
    }
}
