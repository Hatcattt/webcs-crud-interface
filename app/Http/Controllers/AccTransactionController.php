<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Account;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\AccTransaction;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AccTransactionExport;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\Foundation\Application;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class AccTransactionController extends Controller
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
     * @return Application|Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $acc_transactions = AccTransaction::with('account','branch', 'employee', 'account.customer', 'account.customer.individual','account.customer.business')->paginate();
        return view('crud.acc-transaction.index', compact('acc_transactions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $acc_transaction = new AccTransaction();

        $branches = Branch::all()->pluck('name','branch_id');
        $employees = Employee::all()->pluck('full_name', 'emp_id');
        $accounts = Account::with('customer', 'customer.individual', 'customer.business')->get();

        return view('crud.acc-transaction.create', compact('acc_transaction', 'accounts', 'branches', 'employees'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        request()->validate(AccTransaction::$rules);
        
        $accountTest = Account::find($request->account_id);
        if ($request->amount > $accountTest->avail_balance) {
            return redirect()->back()->with('error', "Erreur : Le montant de la transaction ne peut être supérieur au solde du client.");
        }

        // try {
            $acc_transaction = AccTransaction::create($request->all());
        // } catch (\Exception $e) {
        //     return redirect()->route('acc-transaction.index')->with('error', 'Error : Unable to execute this action !');
        // }
        return redirect()->route('acc-transaction.index')
            ->with('success', 'Account transaction created successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return Response
     */
    public function show($id)
    {
        $acc_transaction = AccTransaction::with('account','branch', 'employee', 'account.customer', 'account.customer.individual','account.customer.business')->findOrFail($id);
        return view("crud.acc-transaction.show", compact("acc_transaction"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  $id
     * @return Response
     */
    public function edit($id)
    {
        $acc_transaction = AccTransaction::findOrFail($id);
        $accounts = Account::with('customer', 'customer.individual', 'customer.business')->get();
        $branches = Branch::all()->pluck('name','branch_id');
        $employees = Employee::all()->pluck('full_name', 'emp_id');
        
        return view("crud.acc-transaction.edit", compact("acc_transaction", 'accounts', 'branches', 'employees'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AccTransaction  $accTransaction
     * @return Response
     */
    public function update(Request $request, AccTransaction $accTransaction)
    {
        request()->validate(AccTransaction::$rules);
        $accountTest = Account::find($request->account_id);

        if ($request->amount > $accountTest->avail_balance) {
            return redirect()->back()->with('error', "Erreur : Le montant de la transaction ne peut être supérieur au solde du client.");
        }

        try {
            $accTransaction->update($request->all());
        } catch (\Exception $e) {
            return redirect()->route('acc-transaction.index')->with('error', 'Error : Unable to execute this action !');
        }

        return redirect()->route('acc-transaction.index')
            ->with('success', 'Account transaction updated successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        try {
            $acc_transaction = AccTransaction::findOrFail($id)->delete();
        } catch (\Exception $e) {
            return redirect()->route('acc-transaction.index')->with('error', 'Error : Unable to execute this action !');
        }

        return redirect()->route('acc-transaction.index')
            ->with('success', 'Account transaction deleted successfully !');
    }

    /**
     * Export to a xlsx file.
     * @return BinaryFileResponse
     */
    public function export()
    {
        return Excel::download(new AccTransactionExport, 'acc_transactions.xlsx');
    }
}
