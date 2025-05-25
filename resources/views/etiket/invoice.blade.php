<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TIKET</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.0.3/dist/full.css" rel="stylesheet">
    <script type="text/javascript" src="https://app.stg.midtrans.com/snap/snap.js"
        data-client-key="{{ config('midtrans.client_key') }}"></script>
</head>

<body class="bg-gray-100 flex justify-center items-center min-h-screen">
    <div class="card w-96 bg-white shadow-xl p-5">
        <figure>
            <img src="{{ asset('tiket.jpg') }}" alt="Tiket" class="rounded-xl" />
        </figure>
        <div class="card-body">
            <h2 class="text-gray-700 card-title text-center">Pesanan Selesai</h2>
            <p class="text-center text-gray-500">Detail Pesanan</p>
            <table class="table w-full border-collapse border border-gray-200 mt-3">
                <tbody>
                    <tr class="border">
                        <td class="p-2 font-semibold">Nama</td>
                        <td class="p-2">{{ $order->name }}</td>
                    </tr>
                    <tr class="border">
                        <td class="p-2 font-semibold">No HP</td>
                        <td class="p-2">{{ $order->no_telp }}</td>
                    </tr>
                    <tr class="border">
                        <td class="p-2 font-semibold">Alamat</td>
                        <td class="p-2">{{ $order->address }}</td>
                    </tr>
                    <tr class="border">
                        <td class="p-2 font-semibold">Email</td>
                        <td class="p-2">{{ $order->email }}</td>
                    </tr>
                    <tr class="border">
                        <td class="p-2 font-semibold">QTY</td>
                        <td class="p-2">{{ $order->qty }}</td>
                    </tr>
                    <tr class="border">
                        <td class="p-2 font-semibold">Total Harga</td>
                        <td class="p-2">{{ $order->total_price }}</td>
                    </tr>
                    <tr class="border">
                        <td class="p-2 font-semibold">Status</td>
                        <td class="p-2">{{ $order->status }}</td>
                    </tr>
                </tbody>
            </table>
            <a href="/" class="btn btn-primary w-full mt-4">Kembali ke Landing Page</a>
        </div>
    </div>
</body>

</html>
