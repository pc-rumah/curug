@extends('layouts.dash')
@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Setting Web</h5>
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
                    <form method="post" action="{{ route('welcome.update', $welcome->id ?? '1') }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="judul_halaman" class="form-label">Judul</label>
                            <input type="text" name="judul_halaman" class="form-control" id="judul_halaman" required
                                value="{{ $welcome->judul_halaman ?? '' }}">
                        </div>

                        <div class="mb-3">
                            <label for="text_sambutan" class="form-label">Sambutan</label>
                            <input type="text" name="text_sambutan" class="form-control" id="text_sambutan" required
                                value="{{ $welcome->text_sambutan ?? '' }}">
                        </div>

                        <div class="mb-3">
                            <label for="desc_sambutan" class="form-label">Deskripsi Sambutan</label>
                            <input type="text" name="desc_sambutan" class="form-control" id="desc_sambutan" required
                                value="{{ $welcome->desc_sambutan ?? '' }}">
                        </div>

                        <div class="mb-3">
                            <label for="desc_web" class="form-label">Deskripsi Footer</label>
                            <input type="text" name="desc_web" class="form-control" id="desc_web" required
                                value="{{ $welcome->desc_web ?? '' }}">
                        </div>

                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" name="alamat" class="form-control" id="alamat" required
                                value="{{ $welcome->alamat ?? '' }}">
                        </div>

                        <div class="mb-3">
                            <label for="sampul" class="form-label">Foto Sampul Web</label>
                            <p>Minimum Ukuran 1100px</p>
                            @if (!empty($welcome->sampul))
                                <img src="{{ asset('storage/' . $welcome->sampul) }}" alt="Sampul"
                                    class="img-thumbnail mt-2" width="150">
                            @endif
                            <input type="file" name="sampul" class="form-control mt-2" id="sampul">
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="number" name="phone" class="form-control" id="phone" required
                                value="{{ $welcome->phone ?? '' }}">
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="email" required
                                value="{{ $welcome->email ?? '' }}">
                        </div>

                        <div class="mb-3">
                            <label for="twitter" class="form-label">Link Twitter</label>
                            <input type="text" name="twitter" class="form-control" id="twitter" required
                                value="{{ $welcome->twitter ?? '' }}">
                        </div>

                        <div class="mb-3">
                            <label for="instagram" class="form-label">Link Instagram</label>
                            <input type="text" name="instagram" class="form-control" id="instagram" required
                                value="{{ $welcome->instagram ?? '' }}">
                        </div>

                        <div class="mb-3">
                            <label for="facebook" class="form-label">Link Facebook</label>
                            <input type="text" name="facebook" class="form-control" id="facebook" required
                                value="{{ $welcome->facebook ?? '' }}">
                        </div>

                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
