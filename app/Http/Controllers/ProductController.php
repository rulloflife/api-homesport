<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Models\ProductInventory;
use App\Models\Brand;
use App\Models\Size;
use App\Models\Discount;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = ProductCategory::get();
        $brand = Brand::get();
        $size = Size::get();
        $products = Product::get();
        $inventory = ProductInventory::get();
        $discount = Discount::get();
        return view('pages.addProducts', compact('category', 'brand','size','products','inventory', 'discount'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        if($request->hasFile('image')){
            $path = Storage::disk('s3')->put('images/product', $request->image);
            $path = Storage::disk('s3')->url($path);
            $input['image'] = $path;
        }
        $product = Product::create($input);

        ProductInventory::create([
            'product_id' => $product->id,
            'quantity' => $request->get('quantity')
        ]);

        Discount::create([
            'product_id'=> $product->id,
            'namediscount' => 'NULL',
            'desc' => 'NULL',
            'discount_percent' => $request->get('discount'),
            'active'=> '0',
        ]);


        return redirect()->route('product');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
