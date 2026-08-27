<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    // Display all brands
    public function index()
    {
        $brands = Brand::all();

        return view('brands.index', compact('brands'));
    }

    // Display one brand
    public function show($id)
{
    $brand = Brand::findOrFail($id);

    $products = $brand->products;

    return view('brands.show', compact('brand', 'products'));
}

    // Show create form
    public function create()
    {
        return view('brands.create');
    }

    // Store new brand
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = $request->only([
            'name',
            'description',
            'image',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();

            $request->image->move(
                public_path('images/brands'),
                $imageName
            );

            $data['image'] = $imageName;
        }

        Brand::create($data);

        return redirect()
            ->route('brands.index')
            ->with('success', 'Brand created successfully.');
    }

    // Show edit form
    public function edit($id)
    {
        $brand = Brand::findOrFail($id);

        return view('brands.edit', compact('brand'));
    }

    // Update brand
    public function update(Request $request, $id)
    {
        $brand = Brand::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = $request->only([
            'name',
            'description',
        ]);

        if ($request->hasFile('image')) {

            // Delete old image
            if (
                $brand->image &&
                file_exists(public_path('images/brands/' . $brand->image))
            ) {
                unlink(public_path('images/brands/' . $brand->image));
            }

            $imageName = time() . '.' . $request->image->extension();

            $request->image->move(
                public_path('images/brands'),
                $imageName
            );

            $data['image'] = $imageName;
        }

        $brand->update($data);

        return redirect()
            ->route('brands.index')
            ->with('success', 'Brand updated successfully.');
    }

    // Delete brand
    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);

        // Delete image
        if (
            $brand->image &&
            file_exists(public_path('images/brands/' . $brand->image))
        ) {
            unlink(public_path('images/brands/' . $brand->image));
        }

        $brand->delete();

        return redirect()
            ->route('brands.index')
            ->with('success', 'Brand deleted successfully.');
    }
}
