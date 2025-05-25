@extends('layouts.dash')
@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Tambah Pengurus</h5>
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
                    <form method="post" action="{{ route('struktur.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="foto_profile" class="form-label">Foto Profile (format jpg dan png)</label>
                            <input type="file" name="foto_profile" class="form-control" id="foto_profile" required>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Pengurus</label>
                            <input type="text" name="name" class="form-control" id="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="no_telp" class="form-label">No Telp</label>
                            <input type="number" name="no_telp" class="form-control" id="no_telp" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="instagram" class="form-label">Instagram</label>
                            <input type="text" name="instagram" class="form-control" id="instagram" required>
                        </div>
                        <div class="mb-3">
                            <label for="jabatan" class="form-label">Jabatan</label>
                            <input type="text" name="jabatan" class="form-control" id="jabatan" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
