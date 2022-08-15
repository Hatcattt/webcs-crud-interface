<?php

namespace App\Http\Controllers;

use App\Custom\Abord\Abord;
use App\Exports\AccountExport;
use App\Models\Account;
use App\Models\Product;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

/**
 * Class AccountController
 * @package App\Http\Controllers
 */
class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $accounts = (new Account)->get();

        $columns = Schema::getColumnListing('account');
        return view('crud.account.index', compact('accounts', 'columns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        Abord::ifReader();
        $account = new Account();
        $cd = (new Product)->pluck('product_cd', 'product_cd');
        return view('crud.account.create', compact('account', 'cd'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        Abord::ifReader();
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
        $account = (new Account)->find($id);
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
        Abord::ifReader();
        $account = (new Account)->find($id);
        $cd = (new Product)->pluck('product_cd', 'product_cd');
        return view('crud.account.edit', compact('account', 'cd'));
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
        Abord::ifReader();
        request()->validate(Account::$rules);

        try {
            $account->update($request->all());
        } catch (Exception $e) {
            return redirect()->route('account.index')->with('error', 'Error : Unable to execute this action !');
        }

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
        Abord::ifReader();
        try {
            $account = (new Account)->find($id)->delete();
        } catch (Exception $e) {
            return redirect()->route('account.index')->with('error', 'Error : Unable to execute this action !');
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
