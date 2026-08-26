@extends('layouts.app')

@section('title', 'Order Details')

@section('content')

<div class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Order #{{ $order->id }}</h1>

        <a href="{{ route('orders.index') }}"
           class="btn btn-secondary">
            Back to My Orders
        </a>
    </div>


    {{-- Order Information --}}
    <div class="card mb-4">

        <div class="card-header">
            <h3 class="mb-0">Order Information</h3>
        </div>

        <div class="card-body">

            <p>
                <strong>Status:</strong>
                {{ $order->status }}
            </p>

            <p>
                <strong>Total:</strong>
                ${{ $order->total }}
            </p>

            <p>
                <strong>Shipping Address:</strong>
                {{ $order->shipping_address }}
            </p>

            <p>
                <strong>Phone:</strong>
                {{ $order->phone }}
            </p>

        </div>

    </div>


    {{-- Order Items --}}
    <h2 class="mb-3">Order Items</h2>

    @if($order->orderItems->count() > 0)

        @foreach($order->orderItems as $item)

            <div class="card mb-3">

                <div class="card-body">

                    <p>
                        <strong>Product ID:</strong>
                        {{ $item->prodact_id }}
                    </p>

                    <p>
                        <strong>Quantity:</strong>
                        {{ $item->quantity }}
                    </p>

                    <p>
                        <strong>Price:</strong>
                        ${{ $item->price }}
                    </p>

                </div>

            </div>

        @endforeach

    @else

        <div class="alert alert-info">
            No items found for this order.
        </div>

    @endif


    <a href="{{ route('orders.index') }}"
       class="btn btn-secondary mt-2">
        Back to My Orders
    </a>

</div>

@endsection