<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Models\Brand;
use App\Models\Size;
use App\Models\Product;

class CBSController extends Controller
{
    public function cbs()
    {
        $category = ProductCategory::get();
        $category1 = ProductCategory::get();
        $category2 = ProductCategory::get();
        $brand = Brand::get();
        $brand1 = Brand::get();
        $size = Size::get();
        return view('pages.categoryAndbrand', compact('category', 'category1', 'category2', 'brand', 'brand1' ,'size'));
    }

    public function product()
    {
        $category = ProductCategory::get();
        $brand = Brand::get();
        $size = Size::get();
        $products = Product::get();
        return view('pages.product', compact('category', 'brand', 'size', 'products'));
    }

}


