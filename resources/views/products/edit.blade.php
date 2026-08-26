@extends('layouts.app')

@section('title', 'Edit Products')

@section('content')
<style>
    .pv-scope {
        --ink: #16212D;
        --muted: #6B7684;
        --paper: #F4F6F8;
        --surface: #FFFFFF;
        --line: #E1E5EA;
        --accent: #0E7C6B;
        --accent-dark: #0A5F52;
        font-family: 'Inter', system-ui, sans-serif;
        color: var(--ink);
        background: var(--paper);
        padding: 2.5rem 1.5rem 4rem;
    }
    .pv-scope * { box-sizing: border-box; }
    .pv-form-wrap { max-width: 640px; margin: 0 auto; }
    .pv-eyebrow {
        font-family: 'IBM Plex Mono', monospace;
        font-size: 0.7rem;
        letter-spacing: 0.12em;
        text-transform: uppercase;
        color: var(--muted);
        margin-bottom: 0.35rem;
    }
    .pv-form-wrap h1 {
        font-family: 'Space Grotesk', sans-serif;
        font-size: 1.9rem;
        font-weight: 600;
        letter-spacing: -0.02em;
        margin: 0 0 1.75rem;
    }
    .pv-card-form {
        background: var(--surface);
        border: 1px solid var(--line);
        border-radius: 12px;
        padding: 1.75rem;
    }
    .pv-field { margin-bottom: 1.25rem; }
    .pv-field label { display: block; font-weight: 600; font-size: 0.88rem; margin-bottom: 0.4rem; }
    .pv-field input[type="text"],
    .pv-field input[type="number"],
    .pv-field textarea,
    .pv-field select {
        width: 100%;
        border: 1px solid var(--line);
        border-radius: 7px;
        padding: 0.55rem 0.75rem;
        font-family: 'Inter', sans-serif;
        font-size: 0.95rem;
        color: var(--ink);
        background: var(--surface);
    }
    .pv-field input:focus,
    .pv-field textarea:focus,
    .pv-field select:focus {
        outline: none;
        border-color: var(--accent);
        box-shadow: 0 0 0 3px rgba(14, 124, 107, 0.12);
    }
    .pv-row { display: grid; grid-template-columns: 1fr 1fr; gap: 1.25rem; }
    .pv-current-img {
        display: flex;
        align-items: center;
        gap: 1rem;
        margin-bottom: 1.25rem;
        padding: 0.85rem;
        border: 1px dashed var(--line);
        border-radius: 8px;
    }
    .pv-current-img img { border-radius: 6px; display: block; }
    .pv-current-img p {
        font-family: 'IBM Plex Mono', monospace;
        font-size: 0.75rem;
        color: var(--muted);
        margin: 0;
        text-transform: uppercase;
        letter-spacing: 0.08em;
    }
    .pv-submit {
        font-family: 'Space Grotesk', sans-serif;
        font-weight: 600;
        background: var(--accent);
        color: #fff;
        border: none;
        border-radius: 7px;
        padding: 0.7rem 1.5rem;
        cursor: pointer;
        font-size: 0.95rem;
    }
    .pv-submit:hover { background: var(--accent-dark); }
</style>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;600;700&family=Inter:wght@400;500;600&family=IBM+Plex+Mono:wght@500&display=swap" rel="stylesheet">

<div class="pv-scope">
    <div class="pv-form-wrap">
        <div class="pv-eyebrow">Inventory / Edit Entry</div>
        <h1>Edit Product</h1>

        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="pv-card-form">
            @csrf
            @method('PUT')

            <div class="pv-field">
                <label>Name</label>
                <input type="text" name="name" value="{{ old('name', $product->name) }}">
            </div>

            <div class="pv-field">
                <label>Description</label>
                <textarea name="description" rows="4">{{ old('description', $product->description) }}</textarea>
            </div>

            <div class="pv-row">
                <div class="pv-field">
                    <label>Price</label>
                    <input type="number" step="0.01" name="price" value="{{ old('price', $product->price) }}">
                </div>

                <div class="pv-field">
                    <label>Stock</label>
                    <input type="number" name="stock" value="{{ old('stock', $product->stock) }}">
                </div>
            </div>

            <div class="pv-field">
                <label>Category</label>
                <select name="category_id">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @selected($product->category_id == $category->id)>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="pv-field">
                <label>Brand</label>
                <select name="brand_id">
                    @foreach ($brands as $brand)
                        <option value="{{ $brand->id }}" @selected($product->brand_id == $brand->id)>
                            {{ $brand->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            @if ($product->image)
                <div class="pv-current-img">
                    <img src="{{ asset('storage/' . $product->image) }}" width="70" height="70" style="object-fit:cover;">
                    <p>Current image on file</p>
                </div>
            @endif

            <div class="pv-field">
                <label>Replace Image (optional)</label>
                <input type="file" name="image">
            </div>

            <button type="submit" class="pv-submit">Update Product</button>
        </form>
    </div>
</div>
@endsection