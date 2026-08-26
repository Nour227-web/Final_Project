@extends('layouts.app')

@section('title', 'Products')

@section('content')

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="fw-bold">Products</h1>
            <p class="text-muted">Search, filter and sort products</p>
        </div>

        <a href="{{ route('products.create') }}"
           class="btn btn-primary">
            + Add Product
        </a>
    </div>


    <!-- Search + Filter + Sort -->

    <form action="{{ route('products.index') }}"
          method="GET"
          class="card shadow-sm border-0 p-4 mb-4">

        <div class="row g-3">

            <!-- Search -->

            <div class="col-md-4">

                <label class="form-label">
                    Search
                </label>

                <input type="text"
                       name="search"
                       class="form-control"
                       placeholder="Search product..."
                       value="{{ request('search') }}">

            </div>


            <!-- Category -->

            <div class="col-md-3">

                <label class="form-label">
                    Category
                </label>

                <select name="category_id"
                        class="form-select">

                    <option value="">
                        All Categories
                    </option>

                    @foreach($categories as $category)

                        <option value="{{ $category->id }}"
                            {{ request('category_id') == $category->id ? 'selected' : '' }}>

                            {{ $category->name }}

                        </option>

                    @endforeach

                </select>

            </div>


            <!-- Brand -->

            <div class="col-md-3">

                <label class="form-label">
                    Brand
                </label>

                <select name="brand_id"
                        class="form-select">

                    <option value="">
                        All Brands
                    </option>

                    @foreach($brands as $brand)

                        <option value="{{ $brand->id }}"
                            {{ request('brand_id') == $brand->id ? 'selected' : '' }}>

                            {{ $brand->name }}

                        </option>

                    @endforeach

                </select>

            </div>


            <!-- Sort -->

            <div class="col-md-2">

                <label class="form-label">
                    Sort
                </label>

                <select name="sort"
                        class="form-select">

                    <option value="">
                        Default
                    </option>

                    <option value="price_low"
                        {{ request('sort') == 'price_low' ? 'selected' : '' }}>
                        Price Low
                    </option>

                    <option value="price_high"
                        {{ request('sort') == 'price_high' ? 'selected' : '' }}>
                        Price High
                    </option>

                    <option value="name"
                        {{ request('sort') == 'name' ? 'selected' : '' }}>
                        Name A-Z
                    </option>

                </select>

            </div>

        </div>


        <div class="mt-3">

            <button type="submit"
                    class="btn btn-primary">
                Search / Filter
            </button>

            <a href="{{ route('products.index') }}"
               class="btn btn-secondary">
                Reset
            </a>

        </div>

    </form>


    <!-- Products -->

    <div class="row g-4">

        @forelse($products as $product)

            <div class="col-md-6 col-lg-4">

                <div class="card border-0 shadow-sm h-100">

                    @if($product->image)

                        <img src="{{ asset('storage/' . $product->image) }}"
                             class="card-img-top"
                             style="height:200px; object-fit:cover;">

                    @endif


                    <div class="card-body">

                        <h5 class="fw-bold">
                            {{ $product->name }}
                        </h5>

                        <p class="text-muted mb-1">
                            Category:
                            {{ $product->category->name ?? 'N/A' }}
                        </p>

                        <p class="text-muted mb-2">
                            Brand:
                            {{ $product->brand->name ?? 'N/A' }}
                        </p>

                        <h5 class="text-primary fw-bold">
                            ${{ $product->price }}
                        </h5>

                    </div>

                </div>

            </div>

        @empty

            <div class="col-12">

                <div class="alert alert-info">
                    No products found.
                </div>

            </div>

        @endforelse

    </div>

</div>

@endsection