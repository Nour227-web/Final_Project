@extends('layouts.app')

@section('title', $category->name)

@section('content')

<div class="container py-5">

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card border-0 shadow-sm mb-4">
        <div class="row g-0">

            <div class="col-md-5">

                @if($category->image)
                    <img src="{{ asset('storage/' . $category->image) }}"
                         class="img-fluid rounded-start w-100 h-100"
                         style="object-fit: cover; min-height: 300px;">
                @else
                    <div class="bg-light d-flex align-items-center justify-content-center h-100"
                         style="min-height: 300px;">
                        <span class="fs-1">💻</span>
                    </div>
                @endif

            </div>

            <div class="col-md-7">

                <div class="card-body p-4">

                    <h1 class="fw-bold">
                        {{ $category->name }}
                    </h1>

                    <p class="text-muted">
                        {{ $category->description }}
                    </p>

                    <div class="mt-4">

                        <a href="{{ route('categories.edit', $category) }}"
                           class="btn btn-warning">
                            Edit Category
                        </a>

                        <form action="{{ route('categories.destroy', $category) }}"
                              method="POST"
                              class="d-inline">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="btn btn-danger"
                                    onclick="return confirm('Are you sure you want to delete this category?')">
                                Delete Category
                            </button>

                        </form>

                    </div>

                </div>

            </div>

        </div>
    </div>


    <h2 class="fw-bold mb-4">
        Products in {{ $category->name }}
    </h2>

    <div class="row g-4">

        @forelse($products as $product)

            <div class="col-md-6 col-lg-4">

                <div class="card border-0 shadow-sm h-100">

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
                    No products in this category yet.
                </div>

            </div>
@endforelse
        

    </div>

</div>

@endsection