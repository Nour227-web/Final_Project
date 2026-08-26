@extends('layouts.app')


@section('content')

    <title>Cart</title>

    <style>
        body{
            font-family: Arial, sans-serif;
            background: #f5f6fa;
            margin: 0;
            padding: 20px;
        }

        h1{
            text-align: center;
        }

        .container{
            width: 70%;
            margin: auto;
        }

        .cart-card{
            background: #fff;
            padding: 15px;
            margin: 15px 0;
            border-radius: 12px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        .info h3{
            margin: 0;
        }

        .info p{
            margin: 5px 0;
        }

        .qty{
            font-weight: bold;
        }

        /* actions container */
        .actions{
            display: flex;
            align-items: center;
            gap: 8px;
        }

        /* buttons */
        .actions a{
            width: 38px;
            height: 38px;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 50%;
            text-decoration: none;
            color: white;
            font-size: 18px;
            font-weight: bold;
            transition: 0.3s;
            box-shadow: 0 3px 8px rgba(0,0,0,0.15);
        }

        .actions a:hover{
            transform: scale(1.1);
        }

        .plus{
            background: linear-gradient(135deg, #87f8b6, #27ae60);
        }

        .minus{
            background: linear-gradient(135deg, #f1e6b3, #e67e22);
        }

        .delete{
            background: linear-gradient(135deg, #e74c3c, #c0392b);
        }

        .total{
            text-align: right;
            font-size: 22px;
            margin-top: 20px;
            font-weight: bold;
        }

        .checkout{
            display: block;
            text-align: center;
            background: #000;
            color: #fff;
            padding: 12px;
            margin-top: 20px;
            border-radius: 10px;
            text-decoration: none;
            font-size: 18px;
            transition: 0.3s;
        }

        .checkout:hover{
            background: #333;
        }

        .empty{
            text-align: center;
            font-size: 18px;
            color: gray;
            margin-top: 50px;
        }
    </style>
<div class="container">

    <h1>🛒 My Cart</h1>

    @if(empty($cart))
        <p class="empty">Your cart is empty</p>
    @else

        @php $total = 0; @endphp

        @foreach($cart as $item)

            @php $total += $item['price'] * $item['qty']; @endphp

            <div class="cart-card">

                <div class="info">
                    <h3>{{ $item['name'] }}</h3>
                    <p>Price: {{ $item['price'] }} EGP</p>
                    <p class="qty">Qty: {{ $item['qty'] }}</p>
                </div>

                <div class="actions">
                    <a class="plus" href="/cart/increase/{{ $item['id'] }}">+</a>
                    <a class="minus" href="/cart/decrease/{{ $item['id'] }}">-</a>
                    <a class="delete" href="/cart/delete/{{ $item['id'] }}">✖</a>
                </div>

            </div>

        @endforeach

        <div class="total">
            Total: {{ $total }} EGP
        </div>

        <a class="checkout" href="/checkout">
            Checkout
        </a>

    @endif

</div>

@endsection
