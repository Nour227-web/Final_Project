@extends('layouts.app')

@section('title', 'Create Products')

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
        --danger: #B23A2E;
        font-family: 'Inter', system-ui, sans-serif;
        color: var(--ink);
        background: var(--paper);
        padding: 2.5rem 1.5rem 4rem;
    }
    .pv-scope * { box-sizing: border-box; }
    .pv-form-wrap {
        max-width: 640px;
        margin: 0 auto;
    }
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
    .pv-field label {
        display: block;
        font-weight: 600;
        font-size: 0.88rem;
        margin-bottom: 0.4rem;
    }
    .pv-field .form-control,
    .pv-field .form-select {
        border-color: var(--line);
        border-radius: 7px;
        padding: 0.55rem 0.75rem;
        font-family: 'Inter', sans-serif;
    }
    .pv-field .form-control:focus,
    .pv-field .form-select:focus {
        border-color: var(--accent);
        box-shadow: 0 0 0 3px rgba(14, 124, 107, 0.12);
    }
    .pv-field .text-danger {
        font-size: 0.82rem;
        margin: 0.35rem 0 0;
    }
    .pv-row { display: grid; grid-template-columns: 1fr 1fr; gap: 1.25rem; }
    .pv-submit {
        font-family: 'Space Grotesk', sans-serif;
        font-weight: 600;
        background: var(--accent);
        border: none;
        border-radius: 7px;
        padding: 0.7rem 1.5rem;
    }
    .pv-submit:hover { background: var(--accent-dark); }
</style>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;600;700&family=Inter:wght@400;500;600&family=IBM+Plex+Mono:wght@500&display=swap" rel="stylesheet">

<div class="pv-scope">
    <div class="pv-form-wrap">
        <div class="pv-eyebrow">Inventory / New Entry</div>
        <h1>Add Product</h1>

        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="pv-card-form">
            @csrf

            {{-- Name --}}
            <div class="pv-field">
                <label for="name">Name</label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    class="form-control"
                    value="{{ old('name') }}"
                >
                @error('name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            {{-- Description --}}
            <div class="pv-field">
                <label for="description">Description</label>
                <textarea
                    id="description"
                    name="description"
                    class="form-control"
                    rows="4"
                >{{ old('description') }}</textarea>
            </div>

            {{-- Price / Stock --}}
            <div class="pv-row">
                <div class="pv-field">
                    <label for="price">Price</label>
                    <input
                        type="number"
                        step="0.01"
                        id="price"
                        name="price"
                        class="form-control"
                        value="{{ old('price') }}"
                    >
                    @error('price')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="pv-field">
                    <label for="stock">Stock</label>
                    <input
                        type="number"
                        id="stock"
                        name="stock"
                        class="form-control"
                        value="{{ old('stock') }}"
                    >
                </div>
            </div>

            {{-- Category --}}
            <div class="pv-field">
                <label for="category_id">Category</label>
                <select
                    id="category_id"
                    name="category_id"
                    class="form-select"
                >
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>

                @error('category_id')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            {{-- Brand --}}
            <div class="pv-field">
                <label for="brand_id">Brand</label>
                <select
                    id="brand_id"
                    name="brand_id"
                    class="form-select"
                >
                    @foreach ($brands as $brand)
                        <option value="{{ $brand->id }}">
                            {{ $brand->name }}
                        </option>
                    @endforeach
                </select>

                @error('brand_id')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            {{-- Image --}}
            <div class="pv-field">
                <label for="image">Image</label>
                <input
                    type="file"
                    id="image"
                    name="image"
                    class="form-control"
                >
            </div>

            <button type="submit" class="btn pv-submit text-white">
                Add Product
            </button>

        </form>
    </div>
</div>
@endsection