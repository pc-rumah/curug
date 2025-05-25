@extends('layouts.dash')
@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Tambah Dokumentasi</h5>
            <div class="card">
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
                <div class="card-body">
                    <form method="post" action="{{ route('dokumentasi.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="thumbnail" class="form-label">Foto (format jpg dan png)</label>
                            <input type="file" name="thumbnail" class="form-control" id="thumbnail" required>
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Pengunjung</label>
                            <input type="text" name="nama" class="form-control" id="nama" required>
                        </div>
                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal Berkunjung</label>
                            <input type="date" name="tanggal" class="form-control" id="tanggal" required>
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea style="height: 100px" name="deskripsi" class="form-control" id="deskripsi"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
