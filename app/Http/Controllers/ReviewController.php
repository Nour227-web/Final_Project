<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Product;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    // Show reviews for a product
    public function index(Product $product)
    {
        $reviews = Review::where('product_id', $product->id)->get();

        return view('reviews.index', compact('reviews', 'product'));
    }

    // Store review
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required',
        ]);

        Review::create([
            'user_id' => auth()->user()->id,
            'product_id' => $request->product_id,
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        return redirect(
            route('reviews.index', $request->product_id)
        )->with('Success', 'Review added successfully');
    }

    // Edit review
    public function edit(Review $review)
    {
        return view('reviews.edit', compact('review'));
    }

    // Update review
    public function update(Request $request, Review $review)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required',
        ]);

        $review->update([
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        return redirect(
            route('reviews.index', $review->product_id)
        )->with('Success', 'Review updated successfully');
    }

    // Delete review
    public function destroy(Review $review)
    {
        $productId = $review->product_id;

        $review->delete();

        return redirect(
            route('reviews.index', $productId)
        )->with('Success', 'Review deleted successfully');
    }
}