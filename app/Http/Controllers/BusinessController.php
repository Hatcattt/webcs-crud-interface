<?php

namespace App\Http\Controllers;

use App\Models\Officer;
use App\Models\Business;
use App\Models\Customer;
use App\Custom\Abord\Abord;
use Illuminate\Http\Request;
use App\Exports\BusinessExport;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

/**
 * Class BusinessController
 * @package App\Http\Controllers
 */
class BusinessController extends Controller
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
        $businesses = Business::paginate();
        $officers = DB::table('officer')
            ->join('business', 'officer.cust_id', '=', 'business.cust_id')
            ->select('officer.*')
            ->get();

        return view('crud.business.index', compact('businesses', 'officers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $business = new Business();

        session()->keep('cust_id');
        $cust_id = session()->get('cust_id');

        return view('crud.business.create', compact('business', 'cust_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Business::$rules);
        session()->keep('cust_id');
        $cust_id = session()->get('cust_id');

        try {
            $business = Business::create($request->all());

        } catch (\Exception $e) {
            return redirect()->route('business.index')->with('error', 'Error : Unable to execute this action !');
        }
            return redirect()->route('officer.create')->with([ 'cust_id' => $cust_id ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $business = Business::findOrFail($id);
        return view('crud.business.show', compact('business'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $business = Business::findOrFail($id);
        return view('crud.business.edit', compact('business'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Business $business
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Business $business)
    {
        request()->validate(Business::$rules);

        if (Officer::where('cust_id', '=', $business->cust_id )->first() == null) {
            return redirect()->route('business.index')->with('error', "Erreur : Vous n'avez pas créer d'officer pour se type de client.");
        }
        $id = Officer::where('cust_id', '=', $business->cust_id )->first()->officer_id;
        
        if($request->input('choice') == "yes") {

            $business->update($request->all());
            return redirect(route('officer.edit', $id));
        } else {

            $business->update($request->all());
            return redirect()->route('business.index')->with('success', 'Business updated successfully');
        }
    }

    /**
     * @param  $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        try {
            $business = Business::findOrFail($id)->delete();
        } catch (\Exception $e) {
            return redirect()->route('business.index')->with('error', 'Error : Unable to execute this action !');
        }

        return redirect()->route('business.index')
            ->with('success', 'Business deleted successfully');
    }

    /**
     * Export to a xlsx file.
     * @return BinaryFileResponse
     */
    public function export()
    {
        return Excel::download(new BusinessExport, 'businesses.xlsx');
    }
}
