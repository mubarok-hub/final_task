@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Tambah Kegiatan</h1>

        <button class="mb-3 rounded bg-primary">
            {{-- Tombol untuk menambahkan kegiatan --}}
            <a href="{{ route('kegiatan.index') }}" class="btn btn-sm text-light" style="text-decoration: none;">Kembali ke
                halaman kegiatan</a>
        </button>
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <form action="{{ route('kegiatan.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="nama" class="form-label">Nama Kegiatan</label>
                <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required>
            </div>

            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea name="deskripsi" class="form-control">{{ old('deskripsi') }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Pilih Tag:</label><br>
                @foreach ($tags as $tag)
                    {{-- untuk sebuah perulangan --}}
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="tags[]" value="{{ $tag->id }}">
                        <label class="form-check-label">{{ $tag->nama }}</label>
                    </div>
                @endforeach
            </div>


            <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal', date('Y-m-d')) }}"
                    required>
            </div>

            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar</label>
                <input type="file" name="gambar" id="gambar" class="form-control">
            </div>

            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('kegiatan.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection
