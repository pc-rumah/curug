<!DOCTYPE html>
<html>

<head>
    <title>Tiket Pembelian</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }

        .ticket {
            border: 2px dashed #000;
            padding: 20px;
            width: 300px;
            margin: auto;
        }

        h2 {
            margin: 0;
        }

        .details {
            text-align: left;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="ticket">
        <h2>Tiket Masuk</h2>
        <p><strong>Nama:</strong> {{ $order->name }}</p>
        <p><strong>Alamat:</strong> {{ $order->alamat }}</p>
        <p><strong>No Telp:</strong> {{ $order->no_telp }}</p>
        <p><strong>Email:</strong> {{ $order->email }}</p>
        <p><strong>Jumlah Tiket:</strong> {{ $order->qty }}</p>
        <p><strong>Total Harga:</strong> Rp{{ number_format($order->total_price, 0, ',', '.') }}</p>
        <hr>
        <p>Terima kasih telah membeli tiket!</p>
    </div>
</body>

</html>
