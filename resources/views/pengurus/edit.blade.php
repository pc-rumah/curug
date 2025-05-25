@extends('layouts.dash')
@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Edit Pengurus</h5>
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
                    <form action="{{ route('struktur.update', $struktur) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="fotosekarang" class="form-label">Foto Saat Ini</label>
                            @if (isset($struktur))
                                <img src="{{ asset('/storage/' . $struktur->foto_profile) }}"
                                    alt="{{ $struktur->foto_profile }}" class="img-thumbnail mt-2" style="width: 150px;">
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="foto_pengurus" class="form-label">Foto Pengurus</label>
                            <input type="file" name="foto_profile" class="form-control" id="foto_pengurus"
                                aria-describedby="foto_pengurus">
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Pengurus</label>
                            <input type="text" name="name" value="{{ $struktur->name }}" class="form-control"
                                id="name" aria-describedby="name">
                        </div>
                        <div class="mb-3">
                            <label for="no_telp" class="form-label">No Telp</label>
                            <input type="number" value="{{ $struktur->no_telp }}" name="no_telp" class="form-control"
                                id="no_telp" aria-describedby="thumbnail">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" value="{{ $struktur->email }}" class="form-control"
                                id="email" aria-describedby="email">
                        </div>
                        <div class="mb-3">
                            <label for="instagram" class="form-label">Instagram</label>
                            <input type="text" name="instagram" value="{{ $struktur->instagram }}" class="form-control"
                                id="instagram" aria-describedby="instagram">
                        </div>
                        <div class="mb-3">
                            <label for="jabatan" class="form-label">Jabatan</label>
                            <input type="text" name="jabatan" value="{{ $struktur->jabatan }}" class="form-control"
                                id="jabatan" aria-describedby="jabatan">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
