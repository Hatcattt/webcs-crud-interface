<?php

namespace App\Http\Controllers;

use App\Custom\Abord\Abord;
use App\Exports\ProductExport;
use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\Console\Input\Input;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

/**
 * Class ProductController
 * @package App\Http\Controllers
 */
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::get();
        $columns = Schema::getColumnListing('product');
        return view('crud.product.index', compact('products', 'columns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Abord::ifReader();
        $product = new Product();
        $type_cd = (new ProductType)->pluck('product_type_cd', 'product_type_cd');
        return view('crud.product.create', compact('product', 'type_cd'));
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
        request()->validate(Product::$rules);

        try {
            $product = Product::create($request->all());
        } catch (\Exception $e) {
            return redirect()->route('product.index')->with('error', 'Error : Unable to execute this action !');
        }
        return redirect()->route('product.index')
            ->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);

        return view('crud.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        Abord::ifReader();
        $product = Product::findOrFail($id);
        $type_cd = (new ProductType)->pluck('product_type_cd', 'product_type_cd');
        return view('crud.product.edit', compact('product', 'type_cd'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        Abord::ifReader();
        request()->validate(Product::$rules);

        try {
            $product->update($request->all());
        } catch (\Exception $e) {
            return redirect()->route('product.index')->with('error', 'Error : Unable to execute this action !');
        }
        return redirect()->route('product.index')
            ->with('success', 'Product updated successfully');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        Abord::ifReader();
        try {
            $product = Product::find($id)->delete();
        } catch (\Exception $e) {
            return redirect()->route('product.index')->with('error', 'Error : Unable to execute this action !');
        }
        return redirect()->route('product.index')
            ->with('success', 'Product deleted successfully');
    }

    /**
     * Export to a xlsx file.
     * @return BinaryFileResponse
     */
    public function export()
    {
        return Excel::download(new ProductExport, 'products.xlsx');
    }
}
