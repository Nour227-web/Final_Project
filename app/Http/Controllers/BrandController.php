<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function show($id)
{
    $brand = Brand::findOrFail($id);

    $products = $brand->products;

    return view('brands.show', compact('brand', 'products'));
}
}
