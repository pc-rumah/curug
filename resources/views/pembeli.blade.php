<!DOCTYPE html>
<html lang="id" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Pembeli Tiket</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.4.19/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-base-200 min-h-screen">
    <!-- Main Content -->
    <div class="container mx-auto px-4 py-8">
        <!-- Page Title -->
        <div class="text-center mb-8">
            <h2 class="text-3xl font-bold text-base-content mb-2">Daftar Pembelian Tiket</h2>
        </div>

        <!-- Order Cards -->
        <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-6">
            @forelse ($data as $item)
                <div class="card bg-base-100 shadow-xl hover:shadow-2xl transition-shadow duration-300">
                    <div class="card-body">
                        <!-- Order Header -->
                        <div class="flex justify-between items-start mb-4">
                            @switch($item->status)
                                @case('paid')
                                    <div class="badge badge-success badge-lg">
                                        <i class="fas fa-check mr-1"></i>
                                        Paid
                                    </div>
                                @break

                                @case('unpaid')
                                    <div class="badge badge-warning badge-lg">
                                        <i class="fas fa-clock mr-1"></i>
                                        Unpaid
                                    </div>
                                @break

                                @case('expired')
                                    <div class="badge badge-warning badge-lg">
                                        <i class="fas fa-clock mr-1"></i>
                                        Expired
                                    </div>
                                @break

                                @case('canceled')
                                    <div class="badge badge-warning badge-lg">
                                        <i class="fas fa-clock mr-1"></i>
                                        Canceled
                                    </div>
                                @break

                                @default
                                    <div class="badge badge-secondary badge-lg">
                                        <i class="fas fa-question mr-1"></i>
                                        Unknown
                                    </div>
                            @endswitch

                            <div class="text-sm text-base-content/60">
                                {{ $item->order_code }}
                            </div>
                        </div>

                        <!-- Customer Info -->
                        <div class="space-y-3">
                            <div class="flex items-center">
                                <i class="fas fa-user w-5 text-primary mr-3"></i>
                                <div>
                                    <p class="font-semibold">{{ $item->name }}</p>
                                    <p class="text-sm text-base-content/60">Pembeli</p>
                                </div>
                            </div>

                            <div class="flex items-start">
                                <i class="fas fa-map-marker-alt w-5 text-primary mr-3 mt-1"></i>
                                <div>
                                    <p class="text-sm"> {{ $item->address }} </p>
                                </div>
                            </div>

                            <div class="flex items-center">
                                <i class="fas fa-phone w-5 text-primary mr-3"></i>
                                <p class="text-sm"> {{ $item->no_telp }} </p>
                            </div>

                            <div class="flex items-center">
                                <i class="fas fa-envelope w-5 text-primary mr-3"></i>
                                <p class="text-sm"> {{ $item->email }} </p>
                            </div>
                        </div>

                        <div class="divider my-4"></div>

                        <!-- Order Details -->
                        <div class="space-y-2">
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-base-content/60">Quantity:</span>
                                <span class="font-semibold"> {{ $item->qty }} tiket</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-base-content/60">Harga per tiket:</span>
                                <span class="text-sm">Rp 10.000</span>
                            </div>
                            <div class="flex justify-between items-center text-lg font-bold text-primary">
                                <span>Total:</span>
                                <span>Rp {{ $item->total_price }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                    <h2>tidak ada data</h2>
                @endforelse
            </div>
        </div>

        <script>
            // Simple JavaScript for interactivity
            document.addEventListener('DOMContentLoaded', function() {
                // Add hover effects to cards
                const cards = document.querySelectorAll('.card');
                cards.forEach(card => {
                    card.addEventListener('mouseenter', function() {
                        this.classList.add('scale-105');
                    });
                    card.addEventListener('mouseleave', function() {
                        this.classList.remove('scale-105');
                    });
                });

                // Button click handlers
                const downloadButtons = document.querySelectorAll('.btn:contains("Download")');
                const payButtons = document.querySelectorAll('.btn:contains("Bayar")');

                downloadButtons.forEach(btn => {
                    btn.addEventListener('click', function() {
                        alert('Mengunduh tiket...');
                    });
                });

                payButtons.forEach(btn => {
                    btn.addEventListener('click', function() {
                        alert('Mengarahkan ke halaman pembayaran...');
                    });
                });
            });
        </script>
    </body>

    </html>
