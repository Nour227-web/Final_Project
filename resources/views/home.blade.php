@extends('layouts.app')

@section('content')

<style>
    .slider-img {
        height: 300px;
        width: 100%;
        object-fit: contain;
    }
    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        filter: invert(1) grayscale(100%);
    }
</style>

{{-- ================================================= --}}
{{-- SLIDER --}}
{{-- ================================================= --}}


{{-- ================================================= --}}
{{-- WELCOME / AUTH SECTION --}}
{{-- ================================================= --}}


{{-- ================================================= --}}
{{-- ABOUT OUR STORE --}}
{{-- ================================================= --}}
<section class="container my-5">
    <div class="row align-items-center g-5">

        <div class="col-md-6">
            <h2 class="fw-bold mb-4">About Our Store</h2>
            <p class="lead">Everything you need from electronics in one place 💻📱</p>
            <p class="text-secondary">
                We provide a wide range of laptops, smartphones, and electronic accessories
                suitable for work, studying, entertainment, and everyday use.
            </p>
            <p class="text-secondary">
                We focus on providing high-quality products at competitive prices.
            </p>
            <a href="{{ url('/about') }}" class="btn btn-primary px-4">Learn More About Us</a>
        </div>


    </div>
</section>

{{-- ================================================= --}}
{{-- WHY CHOOSE US --}}
{{-- ================================================= --}}
<section class="py-5">
    <div class="container">

        <div class="text-center mb-5">
            <h2 class="fw-bold">Why Choose Us?</h2>
            <p class="text-muted">Everything you need to enjoy the latest technology</p>
        </div>

        <div class="row g-4">

            <div class="col-lg-3 col-md-6">
                <div class="card h-100 border-0 shadow-sm text-center p-4">
                    <div class="fs-1">💻</div>
                    <h5 class="mt-3">Latest Technology</h5>
                    <p class="text-muted">We offer the latest laptops, smartphones and electronic devices.</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card h-100 border-0 shadow-sm text-center p-4">
                    <div class="fs-1">⭐</div>
                    <h5 class="mt-3">High Quality</h5>
                    <p class="text-muted">We provide high-quality products from trusted brands.</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card h-100 border-0 shadow-sm text-center p-4">
                    <div class="fs-1">🚚</div>
                    <h5 class="mt-3">Fast Shipping</h5>
                    <p class="text-muted">Fast and secure delivery for all your orders.</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card h-100 border-0 shadow-sm text-center p-4">
                    <div class="fs-1">💰</div>
                    <h5 class="mt-3">Best Prices</h5>
                    <p class="text-muted">Competitive prices and special offers.</p>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection
