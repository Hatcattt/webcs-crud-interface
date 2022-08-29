<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Officer;
use App\Models\Business;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Exports\CustomerExport;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

/**
 * Class CustomerController
 * @package App\Http\Controllers
 */
class CustomerController extends Controller
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
        $customers = Customer::with('individual', 'business')->paginate();
        return view('crud.customer.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        request()->validate(Customer::$rules);

        try {
            $customer = Customer::create($request->all());

            switch($customer->cust_type_cd) {
                case("i"):
                    return redirect()->route('individual.create')->with([ 'cust_id' => $customer->cust_id ]);
                    break;
                case("b"):
                    return redirect()->route('business.create')->with([ 'cust_id' => $customer->cust_id ]);
                    break;
                default:
                    return redirect()->back()->with('error', 'Unable to execute this action.');
            }

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error : Unable to execute this action !');
        }
        return redirect()->route('customer.index')->with('success', 'Customer created successfully.');
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
        switch($customer->cust_type_cd) {
            case('i'):
                if ($customer->individual == null) return redirect()->back()->with('error', 'This individual customer is not fully created yet.');
                break;
            case('b'):
                if ($customer->business == null) return redirect()->back()->with('error', 'This business customer is not fully created yet.');
                break;
        }
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
        $customer = Customer::findOrFail($id);
        switch($customer->cust_type_cd) {
            case('i'):
                if ($customer->individual == null) return redirect()->back()->with('error', 'This individual customer must be created before edited.');
                break;
            case('b'):
                if ($customer->business == null) return redirect()->back()->with('error', 'This business customer must be created before edited.');
                break;
        }
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
        request()->validate(Customer::$rules);
        if($request->input('choice') == "yes") {

            switch($customer->cust_type_cd) {
                case('i'):
                    $customer->update($request->all());
                    return redirect(route('individual.edit', $customer->cust_id));
                    break;
                case('b'):
                    $customer->update($request->all());
                    return redirect(route('business.edit', $customer->cust_id));
                    break;
                }
        } else {
            $customer->update($request->all());
            return redirect()->route('customer.index')->with('success', 'Customer updated successfully');
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $customer = Customer::find($id);
        $business = Business::find($customer->cust_id);

        switch($customer->cust_type_cd) {
            case('i'):
                if (Account::where('cust_id', '=', $customer->cust_id)->exists()) {
                    return redirect()->back()->with('error', 'Error : Ce client individuel ne peut pas être supprimé directement, il possède des comptes ou des transactions bancaires.');

                 } elseif($customer->individual != null) {
                    $customer->individual->delete();
                    $customer->delete();
                 }
                 $customer->delete();
                break;

            case('b'):
                if($business == null) {
                    $customer->delete();
                    return redirect()->back()->with('success', 'Customer deleted successfully');
                }

                $officer = Officer::where('cust_id', '=', $business->cust_id )->first();
                if ($officer == null) {
                    $customer->business->delete();
                    $customer->delete();
                    return redirect()->back()->with('success', 'Customer deleted successfully');
                }
                
                if (Account::where('cust_id', '=', $business->cust_id)->exists()) {
                    return redirect()->back()->with('error', 'Error : Ce client de type business ne peut pas être supprimé directement, il possède des comptes ou des transactions bancaires.');
                 } else {
                    $officer->delete();
                    $customer->business->delete();
                    $customer->delete();
                }
                break;
            }
        return redirect()->back()->with('success', 'Customer deleted successfully');
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
