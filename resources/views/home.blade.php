<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penjualan Kopi</title>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f3e5d8;
            /* Warna latar kopi */
            text-align: center;
            margin: 0;
            padding: 0;
        }

        /* Navbar */
        .navbar {
            background: #4b2e2e;
            /* Warna kopi tua */
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            font-size: 18px;
            display: flex;
            align-items: center;
            border-radius: 5px;
        }

        .navbar a i {
            margin-right: 8px;
        }

        .navbar a:hover {
            background: #6d4c41;
        }

        /* Kontainer Produk */
        .container {
            width: 90%;
            max-width: 1200px;
            margin: auto;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-top: 20px;
        }

        .card {
            background: white;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card img {
            width: 100%;
            height: 200px;
            border-radius: 5px;
            object-fit: contain;
            background-color: #fff;
        }

        /* Tombol Beli Sekarang */
        .btn {
            background: linear-gradient(45deg, #795548, #5d4037);
            color: white;
            padding: 12px;
            text-decoration: none;
            border-radius: 8px;
            display: block;
            margin-top: 10px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
            border: none;
        }

        .btn:hover {
            background: linear-gradient(45deg, #6d4c41, #4e342e);
            transform: scale(1.05);
        }

        /* Responsiveness */
        @media screen and (max-width: 1024px) {
            .container {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media screen and (max-width: 768px) {
            .container {
                grid-template-columns: repeat(1, 1fr);
            }
        }
    </style>
</head>

<body>

    <div class="navbar">
        <a href="{{ url('/') }}">🏠 Home</a>
        <a href="{{ route('cart') }}">🛒 Keranjang</a>
    </div>

    <h1 style="color: #4b2e2e;">☕ Welcome to KopiKu ☕</h1>

    <div class="container">
        @foreach ($products as $product)
            <div class="card">
                <img src="{{ asset('images/' . $product['image']) }}" alt="{{ $product['name'] }}">
                <h3 style="color: #4b2e2e;">{{ $product['name'] }}</h3>
                <p>{{ $product['description'] }}</p>
                <p style="font-weight: bold; color: #6d4c41;">Harga: Rp{{ number_format($product['price']) }}</p>
                <form method="POST" action="{{ route('cart.add', $product['id']) }}">
                    @csrf
                    <button type="submit" class="btn">🛒 Beli Sekarang</button>
                </form>
            </div>
        @endforeach
    </div>
</body>

</html>
