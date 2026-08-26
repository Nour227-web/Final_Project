<!DOCTYPE html>
<html>
<head>
    <title>Checkout</title>

    <style>
       body{
         font-family: Arial, sans-serif;
         background: #f5f6fa;
         margin: 0;
         height: 100vh;
         display: flex;
         justify-content: center;   /* أفقي */
         align-items: center;       /* رأسي */
        }

        .container{
            width: 40%;
            margin: auto;
            background: #fff;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        h1{
            text-align: center;
            margin-bottom: 20px;
        }

        input{
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 8px;
            outline: none;
            transition: 0.3s;
        }

        input:focus{
            border-color: #000;
        }

        button{
            width: 100%;
            padding: 12px;
            background: #000;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 10px;
        }

        button:hover{
            background: #333;
        }

        .note{
            text-align: center;
            color: gray;
            font-size: 13px;
            margin-top: 10px;
        }
    </style>

</head>
<body>

<div class="container">

    <h1>🧾 Checkout</h1>

    <form action="/place-order" method="POST">
        @csrf

        <input type="text" name="name" placeholder="Your Name" required>

        <input type="text" name="address" placeholder="Address" required>

        <input type="text" name="phone" placeholder="Phone" required>

        <button type="submit">Place Order</button>
    </form>

    <p class="note">Cash on Delivery available 💰</p>

</div>

</body>
</html>