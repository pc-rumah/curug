@extends('layouts.dash')
@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Edit Testimoni</h5>
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
                    <form action="{{ route('testi.update', $testi) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="fotosekarang" class="form-label">Foto Saat Ini</label>
                            @if (isset($testi))
                                <img src="{{ asset('/storage/' . $testi->profile) }}" alt="{{ $testi->nama }}"
                                    class="img-thumbnail mt-2" style="width: 150px;">
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="nama_pengunjung" class="form-label">Nama Pengunjung</label>
                            <input type="text" name="nama" value="{{ $testi->nama }}" class="form-control"
                                id="nama" aria-describedby="nama">
                        </div>
                        <div class="mb-3">
                            <label for="profile" class="form-label">Profile</label>
                            <input type="file" name="profile" class="form-control" id="profile"
                                aria-describedby="profile">
                        </div>
                        <div class="mb-3">
                            <label for="testi" class="form-label">Testimoni</label>
                            <textarea style="height: 100px" type="text" name="testi" class="form-control" id="testi"
                                aria-describedby="testi">{{ $testi->testi }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
