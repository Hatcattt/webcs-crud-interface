<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Branch;
use App\Models\Account;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Exports\AccountExport;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\Foundation\Application;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

/**
 * Class AccountController
 * @package App\Http\Controllers
 */
class AccountController extends Controller
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
     * @return Application|Factory|View
     */
    public function index()
    {
        $accounts = Account::with(['customer', 'branch', 'employee', 'product', 'customer.individual', 'customer.business'])->paginate();
        return view('crud.account.index', compact('accounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $account = new Account();
        $customers = Customer::with(['individual', 'business'])->get();
        $branches = Branch::all()->pluck('name','branch_id');
        $employees = Employee::all()->pluck('full_name', 'emp_id');
        $products = Product::all()->pluck('product_cd', 'product_cd');

        return view('crud.account.create', compact('account', 'customers', 'branches', 'employees', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        request()->validate(Account::$rules);

        try {
            $account = (new Account)->create($request->all());
        } catch (Exception $e) {
            return redirect()->route('account.index')->with('error', 'Error : Unable to execute this action !');
        }
        return redirect()->route('account.index')
            ->with('success', 'Account created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return Application|Factory|View
     */
    public function show($id)
    {
        $account = Account::with(['customer', 'branch', 'employee', 'product', 'customer.individual', 'customer.business'])->findOrFail($id);
        return view('crud.account.show', compact('account'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $account = (new Account)->findOrFail($id);
        $customers = Customer::with(['individual', 'business'])->get();
        $branches = Branch::all()->pluck('name','branch_id');
        $employees = Employee::all()->pluck('full_name', 'emp_id');
        $products = Product::all()->pluck('product_cd', 'product_cd');

        return view('crud.account.edit', compact('account', 'customers', 'branches', 'employees', 'products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  Account $account
     * @return RedirectResponse
     */
    public function update(Request $request, Account $account): RedirectResponse
    {
        request()->validate(Account::$rules);

        // try {
            $account->update($request->all());
        // } catch (Exception $e) {
        //     return redirect()->route('account.index')->with('error', 'Error : Unable to execute this action !');
        // }

        return redirect()->route('account.index')
            ->with('success', 'Account updated successfully !');
    }

    /**
     * @param $id
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy($id): RedirectResponse
    {
        try {
            $account = (new Account)->find($id)->delete();
        } catch (Exception $e) {
            return redirect()->route('account.index')->with('error', 'Error : Le client possède des transactions bancaires !');
        }

        return redirect()->route('account.index')
            ->with('success', 'Account deleted successfully');
    }

    /**
     * Export to a xlsx file.
     * @return BinaryFileResponse
     */
    public function export(): BinaryFileResponse
    {
        return Excel::download(new AccountExport, 'account.xlsx');
    }
}
