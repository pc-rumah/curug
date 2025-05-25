@extends('layouts.dash')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center justify-content-between">
                <h5 class="card-title fw-semibold mb-4">List Pembeli Tiket</h5>
            </div>
            {{-- pesan sukse --}}
            @if (session('success') || request()->has('success'))
                <div class="alert alert-success">
                    {{ session('success') ?? request()->get('success') }}
                </div>
            @endif
            @if (Session::has('error'))
                <div class="alert alert-danger">{{ Session::get('error') }}</div>
            @endif
            <div class="table-responsive">
                <table class="table text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                        <tr>
                            {{-- number --}}
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0"></h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Order Code</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Nama</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Alamat</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">No Telp</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Email</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Qty</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Total</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Status</h6>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($orders as $item)
                            <tr>
                                <th>
                                    <h6 class="fw-normal mb-0">{{ $loop->iteration }}</h6>
                                </th>
                                <td>
                                    <h6 class="fw-normal mb-0">{{ $item->order_code }}</h6>
                                </td>
                                <td>
                                    <h6 class="fw-normal mb-0">{{ $item->name }}</h6>
                                </td>
                                <td>
                                    <h6 class="fw-normal mb-0">{{ $item->address }}</h6>
                                </td>
                                <td>
                                    <h6 class="fw-normal mb-0">{{ $item->no_telp }}</h6>
                                </td>
                                <td>
                                    <h6 class="fw-normal mb-0">{{ $item->email }}</h6>
                                </td>
                                <td>
                                    <h6 class="fw-normal mb-0">{{ $item->qty }}</h6>
                                </td>
                                <td>
                                    <h6 class="fw-normal mb-0">{{ $item->total_price }}</h6>
                                </td>
                                <td>
                                    <h6 class="fw-normal mb-0">
                                        @if ($item->status == 'unpaid')
                                            <span class="badge bg-danger">Belum Bayar</span>
                                        @elseif($item->status == 'paid')
                                            <span class="badge bg-success">Sudah Bayar</span>
                                        @endif
                                    </h6>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">Tidak ada data</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
