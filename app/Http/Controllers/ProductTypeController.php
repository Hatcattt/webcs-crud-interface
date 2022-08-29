<?php

namespace App\Http\Controllers;

use App\Custom\Abord\Abord;
use App\Exports\ProductTypeExport;
use App\Models\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

/**
 * Class ProductTypeController
 * @package App\Http\Controllers
 */
class ProductTypeController extends Controller
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
        $product_types = ProductType::paginate();
        return view('crud.product-type.index', compact('product_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product_type = new ProductType();
        return view('crud.product-type.create', compact('product_type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(ProductType::$rules);

        try {
            $product_type = ProductType::create($request->all());
        } catch (\Exception $e) {
            return redirect()->route('product-type.index')->with('error', 'Error : Unable to execute this action !');
        }
        return redirect()->route('product-type.index')
            ->with('success', 'ProductType created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product_type = ProductType::findOrFail($id);

        return view('crud.product-type.show', compact('product_type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product_type = ProductType::findOrFail($id);
        return view('crud.product-type.edit', compact('product_type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  ProductType $productType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductType $productType)
    {
        request()->validate(ProductType::$rules);

        try {
            $productType->update($request->all());
        } catch (\Exception $e) {
            return redirect()->route('product-type.index')->with('error', 'Error : Unable to execute this action !');
        }
        return redirect()->route('product-type.index')
            ->with('success', 'ProductType updated successfully');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        try {
            $product_type = ProductType::findOrFail($id)->delete();
        } catch (\Exception $e) {
            return redirect()->route('product-type.index')->with('error', 'Error : Unable to execute this action !');
        }
        return redirect()->route('product-type.index')
            ->with('success', 'ProductType deleted successfully');
    }

    /**
     * Export to a xlsx file.
     * @return BinaryFileResponse
     */
    public function export()
    {
        return Excel::download(new ProductTypeExport, 'product-types.xlsx');
    }
}
