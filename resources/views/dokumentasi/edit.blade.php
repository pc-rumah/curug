@extends('layouts.dash')
@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Edit Dokumentasi</h5>
            @if (session('success') || request()->has('success'))
                <div class="alert alert-success">
                    {{ session('success') ?? request()->get('success') }}
                </div>
            @endif
            @if (Session::has('error'))
                <div class="alert alert-danger">{{ Session::get('error') }}</div>
            @endif
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                @endforeach
            @endif
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('dokumentasi.update', $dokumentasi) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="fotosekarang" class="form-label">Foto Saat Ini</label>
                            @if (isset($dokumentasi))
                                <img src="{{ asset('/storage/' . $dokumentasi->thumbnail) }}"
                                    alt="{{ $dokumentasi->thumbnail }}" class="img-thumbnail mt-2" style="width: 150px;">
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="nama_pengunjung" class="form-label">Nama Pengunjung</label>
                            <input type="text" name="nama" value="{{ $dokumentasi->nama_pengunjung }}"
                                class="form-control" id="nama" aria-describedby="nama">
                        </div>
                        <div class="mb-3">
                            <label for="thumbnail" class="form-label">Thumbnail</label>
                            <input type="file" name="thumbnail" class="form-control" id="thumbnail"
                                aria-describedby="thumbnail">
                        </div>
                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <input type="date" name="tanggal" value="{{ $dokumentasi->tanggal }}" class="form-control"
                                id="tanggal" aria-describedby="tanggal">
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea type="text" name="deskripsi" class="form-control" id="deskripsi" aria-describedby="deskripsi">{{ $dokumentasi->deskripsi }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
