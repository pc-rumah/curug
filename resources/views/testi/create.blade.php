@extends('layouts.dash')
@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Tambah Testimoni</h5>
            <div class="card">
                {{-- pesan sukses dan gagal --}}
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
                    <form method="post" action="{{ route('testi.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="profile" class="form-label">Profile (format jpg dan png)</label>
                            <input type="file" name="profile" class="form-control" id="profile" required>
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" name="nama" class="form-control" id="nama" required>
                        </div>
                        <div class="mb-3">
                            <label for="testi" class="form-label">Testimoni</label>
                            <textarea style="height: 100px" name="testi" class="form-control" id="testi"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
