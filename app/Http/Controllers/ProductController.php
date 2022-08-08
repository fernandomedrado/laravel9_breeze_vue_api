<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductFormRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->paginate(5);

        return view('products.index', compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $objRequest
     * @return \Illuminate\Http\Response
     */
    public function store(Request $objRequest)
    {
        /**
         * Validacao 1
         */
        // $arrValidate = $objRequest->validated($objAtividadeFormRequest);
        /**
         * Validacao 2
         */
        $validatedData = $objRequest->validateWithBag('post', [
            'title' => ['required', 'unique:posts', 'max:255'],
            'body' => ['required'],
        ]);
 
        if ($objRequest->isMethod('post'))
            Product::create($objRequest->all());

        return response()->json('Product created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product $objProduct
     * @return \Illuminate\Http\Response
     */
    public function show($intId)
    {
        $objProduct = Product::find($intId);
        return response()->json($objProduct);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product $objProduct
     * @return \Illuminate\Http\Request
     */
    public function edit($intId, Request $objRequest)
    {
        /**
         * Validacao 1
         */
        // $arrValidate = $objRequest->validated($objAtividadeFormRequest);
        /**
         * Validacao 2
         */
        $validatedData = $objRequest->validateWithBag('post', [
            'title' => ['required', 'unique:posts', 'max:255'],
            'body' => ['required'],
        ]);

        $objProduct = Product::find($intId);
        $objProduct->update($objRequest->all());
        return response()->json('Product updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product $objProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy($intId)
    {
        $objProduct = Product::find($intId);
        $objProduct->delete();
        return response()->json('Product deleted!');
    }
}