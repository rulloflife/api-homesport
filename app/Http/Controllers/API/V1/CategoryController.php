<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\ProductCategrory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = ProductCategrory::get();
        return view('category.index', [
            'category' => $category
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ProductCategrory::create($request->all());
        // Toastr::success('Successfully', 'Add category', ["positionClass" => "toast-top-right"]);
        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductCategrory  $productCategrory
     * @return \Illuminate\Http\Response
     */
    public function show(ProductCategrory $productCategrory)
    {
        return view('category.show', compact('productCategrory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductCategrory  $productCategrory
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductCategrory $productCategrory)
    {
        return view('category.edit',[
            'category' => $productCategrory
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductCategrory  $productCategrory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductCategrory $productCategrory)
    {
        $productCategrory->update($request->all());
//        Toastr::success('Successfully', 'Update category', ["positionClass" => "toast-top-right"]);
        return redirect(route('category.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductCategrory  $productCategrory
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductCategrory $productCategrory)
    {
        $productCategrory->delete();
//        Toastr::error('Successfully', 'Delete category', ["positionClass" => "toast-top-right"]);
        return redirect(route('category.index'));
    }
}
