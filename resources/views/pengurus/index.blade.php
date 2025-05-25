@extends('layouts.dash')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center justify-content-between">
                <h5 class="card-title fw-semibold mb-4">List Pengurus</h5>
                <a href="{{ route('struktur.create') }}" class="btn btn-primary mb-3">
                    <i class="ti ti-plus me-2"></i>
                    Buat Baru
                </a>
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
                                <h6 class="fw-semibold mb-0">Foto Profile Pengurus</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Nama</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">No Telp</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Email</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Instagram</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Jabatan</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Aksi</h6>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($struktur as $item)
                            <tr>
                                <th>
                                    <h6 class="fw-normal mb-0">{{ $loop->iteration }}</h6>
                                </th>
                                <td>
                                    <img src="{{ asset('storage/' . $item->foto_profile) }}" alt="Thumbnail"
                                        class="rounded-circle" width="50" height="50">
                                </td>
                                <td>
                                    <h6 class="fw-normal mb-0">{{ $item->name }}</h6>
                                </td>
                                <td>
                                    <h6 class="fw-normal mb-0">{{ $item->no_telp }}</h6>
                                </td>
                                <td>
                                    <h6 class="fw-normal mb-0">{{ $item->email }}</h6>
                                </td>
                                <td>
                                    <h6 class="fw-normal mb-0">{{ $item->instagram }}</h6>
                                </td>
                                <td>
                                    <h6 class="fw-normal mb-0">{{ $item->jabatan }}</h6>
                                </td>
                                <td>
                                    <a href="{{ route('struktur.edit', $item->id) }}">
                                        <button class="btn btn-sm btn-warning">Edit</button>
                                    </a>
                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#alert-hapus-barang{{ $item->id }}">Delete</button>
                                    {{-- pop up hapus data barang --}}
                                    @if (isset($item))
                                        <div class="modal fade" id="alert-hapus-barang{{ $item->id }}" tabindex="-1"
                                            aria-labelledby="confirmDelete{{ $item->id }}Label" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="confirmDelete{{ $item->id }}Label">
                                                            Konfirmasi Hapus Data</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Apakah Anda yakin ingin menghapus Data ini?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Batal</button>
                                                        <form id="deleteForm"
                                                            action="{{ route('struktur.destroy', $item->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    {{-- pop up hapus data barang --}}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">Tidak ada data</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
