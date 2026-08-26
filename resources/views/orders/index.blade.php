@extends('layouts.app')

@section('title', 'My Orders')

@section('content')

<div class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>My Orders</h1>

        <a href="{{ route('orders.history') }}"
           class="btn btn-secondary">
            Order History
        </a>
    </div>

    @if(session('Success'))
        <div class="alert alert-success">
            {{ session('Success') }}
        </div>
    @endif


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

                    <p>
                        <strong>Phone:</strong>
                        {{ $order->phone }}
                    </p>


                    <a href="{{ route('orders.show', $order->id) }}"
                       class="btn btn-primary">
                        Order Details
                    </a>


                    @if($order->status == 'pending')

                        <form
                            action="{{ route('orders.cancel', $order->id) }}"
                            method="POST"
                            class="d-inline"
                        >

                            @csrf
                            @method('PUT')

                            <button
                                type="submit"
                                class="btn btn-danger"
                            >
                                Cancel Order
                            </button>

                        </form>

                    @endif

                </div>

            </div>

        @endforeach

    @else

        <div class="alert alert-info">
            You don't have any orders yet.
        </div>

    @endif

</div>

@endsection