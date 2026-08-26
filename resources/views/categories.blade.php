@extends('layouts.app')

@section('title', 'Categories')

@section('content')

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="page-title mb-1">Laptop Categories</h1>
            <p class="text-muted">Choose a category</p>
        </div>

        <a href="{{ route('categories.create') }}" class="btn btn-main px-4">
            + Add Category
        </a>
    </div>

    <div class="row g-4">

        @foreach($categories as $category)

        <div class="col-md-6 col-lg-4">

            <div class="card category-card shadow-sm h-100">

                @if($category->image)
                    <img src="{{ asset('storage/' . $category->image) }}"
                         class="category-img"
                         alt="{{ $category->name }}">
                @else
                    <div class="category-img d-flex align-items-center justify-content-center bg-light">
                        <span class="fs-1">💻</span>
                    </div>
                @endif

                <div class="card-body p-4">

                    <h4 class="fw-bold">
                        {{ $category->name }}
                    </h4>

                    <p class="text-muted">
                        {{ $category->description }}
                    </p>

                    <a href="{{ route('categories.show', $category->id) }}"
                       class="btn btn-main">
                        View Category
                    </a>

                </div>

            </div>

        </div>

        @endforeach

    </div>

</div>

@endsection