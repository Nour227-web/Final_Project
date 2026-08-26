@extends('layouts.app')

@section('title', $brand->name)

@section('content')

<div class="container py-5">

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow-sm border-0 mb-5">

        <div class="row g-0">

            <div class="col-md-5">

                @if($brand->image)

                    <img src="{{ asset('storage/' . $brand->image) }}"
                         class="img-fluid w-100 h-100"
                         style="object-fit:cover; min-height:300px;">

                @else

                    <div class="bg-light d-flex align-items-center justify-content-center h-100"
                         style="min-height:300px; font-size:80px;">
                        💻
                    </div>

                @endif

            </div>

            <div class="col-md-7">

                <div class="card-body p-4">

                    <h1 class="fw-bold">
                        {{ $brand->name }}
                    </h1>

                    <p class="text-muted">
                        {{ $brand->description }}
                    </p>

                    <a href="{{ route('brands.edit', $brand) }}"
                       class="btn btn-warning">
                        Edit Brand
                    </a>

                    <form action="{{ route('brands.destroy', $brand) }}"
                          method="POST"
                          class="d-inline">

                        @csrf
                        @method('DELETE')

                        <button type="submit"
                                class="btn btn-danger"
                                onclick="return confirm('Are you sure?')">
                            Delete Brand
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>


    <h2 class="fw-bold mb-4">
        Products from {{ $brand->name }}
    </h2>

    <div class="row g-4">

        @forelse($products as $product)

            <div class="col-md-6 col-lg-4">

                <div class="card shadow-sm border-0 h-100">

                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}"
                             class="card-img-top"
                             style="height:180px; object-fit:cover;">
                    @endif

                    <div class="card-body">

                        <h5 class="fw-bold">
                            {{ $product->name }}
                        </h5>

                        <p class="text-primary fw-bold">
                            ${{ $product->price }}
                        </p>

                    </div>

                </div>

            </div>

        @empty

            <div class="col-12">
                <div class="alert alert-info">
                    No products for this brand yet.
                </div>
            </div>

        @endforelse

    </div>

</div>

@endsection