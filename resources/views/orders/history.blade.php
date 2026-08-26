@extends('layouts.app')

@section('title', 'Order History')

@section('content')

<div class="container mt-5">

    <h1 class="mb-4">Order History</h1>

    @if($orders->count() > 0)

        @foreach($orders as $order)

            <div class="card mb-3">

                <div class="card-body">

                    <h3 class="card-title">
                        Order #{{ $order->id }}
                    </h3>

                    <p>
                        <strong>Total:</strong>
                        ${{ $order->total }}
                    </p>

                    <p>
                        <strong>Status:</strong>
                        {{ $order->status }}
                    </p>

                    <p>
                        <strong>Shipping Address:</strong>
                        {{ $order->shipping_address }}
                    </p>

                    <a
                        href="{{ route('orders.show', $order->id) }}"
                        class="btn btn-primary"
                    >
                        Order Details
                    </a>

                </div>

            </div>

        @endforeach

    @else

        <div class="alert alert-info">
            You don't have any order history yet.
        </div>

    @endif

    <a
        href="{{ route('orders.index') }}"
        class="btn btn-secondary"
    >
        Back to My Orders
    </a>

</div>

@endsection