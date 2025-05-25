@extends('layouts.dash')
@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Edit Wahana</h5>
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
                    <form action="{{ route('wahana.update', $wahana) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="fotosekarang" class="form-label">Foto Saat Ini</label>
                            @if (isset($wahana))
                                <img src="{{ asset('/storage/' . $wahana->gambar) }}" alt="{{ $wahana->nama_wahana }}"
                                    class="img-thumbnail mt-2" style="width: 150px;">
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="nama_wahana" class="form-label">Nama Wahana</label>
                            <input type="text" name="nama_wahana" value="{{ $wahana->nama_wahana }}" class="form-control"
                                id="nama_wahana" aria-describedby="nama_wahana">
                        </div>
                        <div class="mb-3">
                            <label for="gambar" class="form-label">Gambar Wahana</label>
                            <input type="file" name="gambar" class="form-control" id="gambar"
                                aria-describedby="gambar">
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea style="height: 100px" type="text" name="deskripsi" class="form-control" id="deskripsi"
                                aria-describedby="deskripsi">{{ $wahana->deskripsi }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
