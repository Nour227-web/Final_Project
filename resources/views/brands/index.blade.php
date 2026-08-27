@extends('layouts.app')

@section('title', 'Brands')

@section('content')

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="fw-bold">Brands</h1>
            <p class="text-muted">Choose a brand</p>
        </div>

        <a href="{{ route('brands.create') }}" class="btn btn-primary">
            + Add Brand
        </a>
    </div>

    <div class="row g-4">

        @forelse($brands as $brand)

            <div class="col-md-6 col-lg-4">

                <div class="card shadow-sm border-0 h-100">

                    @if($brand->image)
                        <img src="{{ asset('storage/' . $brand->image) }}"
                             class="card-img-top"
                             style="height:200px; object-fit:cover;">
                    @else
                        <div class="bg-light text-center p-5"
                             style="font-size:60px;">
                            💻
                        </div>
                    @endif

                    <div class="card-body">

                        <h4 class="fw-bold">
                            {{ $brand->name }}
                        </h4>

                        <p class="text-muted">
                            {{ $brand->description }}
                        </p>

                        <a href="{{ route('brands.show', $brand) }}"
                           class="btn btn-primary">
                            View Brand
                        </a>

                    </div>

                </div>

            </div>

        @empty

            <div class="col-12">
                <div class="alert alert-info">
                    No brands available.
                </div>
            </div>

        @endforelse

    </div>

</div>

@endsection
