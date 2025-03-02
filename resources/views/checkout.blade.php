<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f6f1eb;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            max-width: 600px;
            background: white;
            margin: 30px auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #5d4037;
            font-size: 26px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            margin-bottom: 15px;
        }

        label {
            font-weight: bold;
            color: #5d4037;
            margin-bottom: 5px;
        }

        input,
        textarea {
            width: calc(100% - 20px);
            padding: 12px;
            font-size: 16px;
            border: 1px solid #d3b8ae;
            border-radius: 5px;
            background: #fcf8f3;
            box-sizing: border-box;
        }

        textarea {
            height: 100px;
            resize: none;
        }

        .order-summary {
            background: #faebd7;
            padding: 15px;
            border-radius: 10px;
            margin-top: 20px;
        }

        .order-summary h3 {
            margin: 0 0 10px;
            color: #5d4037;
        }

        .order-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 8px;
        }

        .btn-container {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .btn {
            padding: 12px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 48%;
            text-align: center;
            text-decoration: none;
        }

        .checkout-btn {
            background: #8d6e63;
            color: white;
        }

        .checkout-btn:hover {
            background: #795548;
        }

        .back-btn {
            background: #b0a3a0;
            color: white;
        }

        .back-btn:hover {
            background: #92877d;
        }
    </style>
</head>

<body>

    <div class="container">
        <h1>🛍️ Checkout</h1>

        <form action="{{ url('/checkout') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nama Lengkap</label>
                <input type="text" id="name" name="name" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="phone">Nomor Telepon</label>
                <input type="text" id="phone" name="phone" required>
            </div>

            <div class="form-group">
                <label for="address">Alamat Pengiriman</label>
                <textarea id="address" name="address" required></textarea>
            </div>

            <div class="order-summary">
                <h3>Ringkasan Pesanan</h3>
                @foreach ($cart as $item)
                    <div class="order-item">
                        <span>{{ $item['name'] }} (x{{ $item['quantity'] }})</span>
                        <span>Rp{{ number_format($item['price'] * $item['quantity']) }}</span>
                    </div>
                @endforeach
                <hr>
                <div class="order-item">
                    <strong>Total Harga:</strong>
                    <strong>Rp{{ number_format($total) }}</strong>
                </div>
            </div>

            <div class="btn-container">
                <a href="{{ route('cart') }}" class="btn back-btn">⬅️ Kembali ke Keranjang</a>
                <button type="submit" class="btn checkout-btn">✅ Bayar Sekarang</button>
            </div>
        </form>
    </div>

</body>

</html>
