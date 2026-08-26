<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class CategoryController extends Controller
{

public function index()
{
    $categories = Category::all();
    return view('categories', compact('categories'));
}
  public function show($id)
{
    $category = Category::findOrFail($id);

    $products = $category->products;

    return view('categories.show', compact('category', 'products'));
}

public function create()
{
    return view('categories.create');
}


  public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    $category = new Category();

    $category->name = $request->name;
    $category->description = $request->description;

    if ($request->hasFile('image')) {
        $category->image = $request->file('image')->store('categories', 'public');
    }

    $category->save();

    return redirect()->route('categories.index');
}

// Edit Category
public function edit(Category $category)
{
    return view('categories.edit', compact('category'));
}

public function update(Request $request, Category $category)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    $category->name = $request->name;
    $category->description = $request->description;

    if ($request->hasFile('image')) {

        if ($category->image) {
            Storage::disk('public')->delete($category->image);
        }

        $category->image = $request->file('image')
            ->store('categories', 'public');
    }

    $category->save();

    return redirect()->route('categories.show', $category);
}


// Delete Category
public function destroy(Category $category)
{
    if ($category->image) {
        Storage::disk('public')->delete($category->image);
    }

    $category->delete();

    return redirect()->route('categories.index');
}


}
