<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran Berhasil</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background: #f6f1eb;
            padding: 50px;
        }

        .container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            display: inline-block;
        }

        h1 {
            color: green;
        }

        .btn {
            background: #8d6e63;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
            margin-top: 20px;
        }

        .btn:hover {
            background: #795548;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>✅ Pembayaran Berhasil!</h1>
        <p>Terima kasih telah melakukan pembelian.</p>
        <a href="{{ route('home') }}" class="btn">Kembali ke Beranda</a>
    </div>
</body>

</html>
