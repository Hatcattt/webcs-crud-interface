<?php

namespace App\Http\Controllers;

use App\Custom\Abord\Abord;
use App\Exports\AccTransactionExport;
use App\Models\AccTransaction;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class AccTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $acc_transactions = AccTransaction::get();
        $columns = Schema::getColumnListing('acc_transaction');
        return view('crud.acc-transaction.index', compact('acc_transactions', 'columns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        Abord::ifReader();
        $acc_transaction = new AccTransaction();
        return view('crud.acc-transaction.create', compact('acc_transaction'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        Abord::ifReader();
        request()->validate(AccTransaction::$rules);

        try {
            $acc_transaction = AccTransaction::create($request->all());
        } catch (\Exception $e) {
            return redirect()->route('acc-transaction.index')->with('error', 'Error : Unable to execute this action !');
        }
        return redirect()->route('acc-transaction.index')
            ->with('success', 'Acc transaction created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return Response
     */
    public function show($id)
    {
        $acc_transaction = AccTransaction::findOrFail($id);
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
        Abord::ifReader();
        $acc_transaction = AccTransaction::findOrFail($id);

        return view("crud.acc-transaction.edit", compact("acc_transaction"));
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
        Abord::ifReader();
        request()->validate(AccTransaction::$rules);
        try {
            $accTransaction->update($request->all());
        } catch (\Exception $e) {
            return redirect()->route('acc-transaction.index')->with('error', 'Error : Unable to execute this action !');
        }

        return redirect()->route('acc-transaction.index')
            ->with('success', 'Acc transaction updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        Abord::ifReader();
        try {
            $acc_transaction = AccTransaction::findOrFail($id)->delete();
        } catch (\Exception $e) {
            return redirect()->route('acc-transaction.index')->with('error', 'Error : Unable to execute this action !');
        }

        return redirect()->route('acc-transaction.index')
            ->with('success', 'Acc transaction deleted successfully');
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
