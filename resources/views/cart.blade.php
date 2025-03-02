<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f3e5d8;
            /* Warna latar kopi */
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        /* Navbar */
        .navbar {
            background: #4b2e2e;
            /* Warna kopi tua */
            padding: 15px;
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            font-size: 18px;
            padding: 8px 15px;
            border-radius: 5px;
        }

        .navbar a:hover {
            background: #6d4c41;
        }

        .container {
            width: 90%;
            max-width: 800px;
            background: white;
            padding: 20px;
            margin-top: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h1 {
            color: #4b2e2e;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        th {
            background: #795548;
            color: white;
        }

        td input[type="number"] {
            width: 50px;
            text-align: center;
            font-size: 16px;
        }

        .btn {
            padding: 10px 15px;
            background: #6d4c41;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            font-size: 14px;
            transition: 0.3s;
        }

        .btn:hover {
            background: #5d4037;
        }

        .total {
            font-size: 20px;
            font-weight: bold;
            color: #4b2e2e;
        }

        .checkout-btn {
            display: block;
            width: fit-content;
            margin: 20px auto 0;
            padding: 15px 25px;
            font-size: 18px;
            background: #d4a373;
            color: white;
            border-radius: 5px;
            text-decoration: none;
            transition: 0.3s;
        }

        .checkout-btn:hover {
            background: #c69566;
        }

        .back-btn {
            display: block;
            width: fit-content;
            margin: 15px auto;
            padding: 12px 20px;
            font-size: 16px;
            background: #795548;
            color: white;
            border-radius: 5px;
            text-decoration: none;
            transition: 0.3s;
        }

        .back-btn:hover {
            background: #6d4c41;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <div class="navbar">
        <a href="{{ url('/') }}">🏠 Home</a>
        <a href="{{ route('cart') }}">🛒 Keranjang</a>
    </div>

    <div class="container">
        <h1>🛍️ Keranjang Belanja</h1>
        @if (session('cart'))
            <table>
                <tr>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                    <th>Aksi</th>
                </tr>
                @php $total = 0; @endphp
                @foreach (session('cart') as $id => $details)
                    @php $total += $details['price'] * $details['quantity']; @endphp
                    <tr>
                        <td>{{ $details['name'] }}</td>
                        <td>Rp{{ number_format($details['price']) }}</td>
                        <td>
                            <form method="POST" action="{{ route('cart.update', $id) }}"
                                style="display: flex; justify-content: center;">
                                @csrf
                                <button type="submit" name="action" value="decrease" class="btn">➖</button>
                                <input type="number" name="quantity" value="{{ $details['quantity'] }}" min="1"
                                    readonly>
                                <button type="submit" name="action" value="increase" class="btn">➕</button>
                            </form>
                        </td>
                        <td>Rp{{ number_format($details['price'] * $details['quantity']) }}</td>
                        <td>
                            <form method="POST" action="{{ route('cart.remove', $id) }}">
                                @csrf
                                <button type="submit" class="btn">❌ Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="3"><strong>Total Harga</strong></td>
                    <td class="total"><strong>Rp{{ number_format($total) }}</strong></td>
                    <td></td>
                </tr>
            </table>

            <a href="{{ route('checkout') }}" class="checkout-btn">🛍️ Checkout</a>
        @else
            <p>Keranjang kosong! Ayo belanja dulu 😊</p>
        @endif
    </div>

    <a href="{{ url('/') }}" class="back-btn">⬅️ Lanjut Belanja</a>

</body>

</html>
