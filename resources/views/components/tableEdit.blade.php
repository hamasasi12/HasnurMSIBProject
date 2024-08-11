@extends('master')

@section('content')

@section('main')
<h1>Edit Kursus: <span class="text-primary">{{ $kursus->judul }}</span></h1>
<form action="{{ route('kursuses.update', $kursus->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="judul" class="form-label">Judul Materi</label>
        <input type="text" class="form-control" id="judul" name="judul" value="{{ $kursus->judul }}" required>
    </div>
    <div class="mb-3">
        <label for="deskripsi" class="form-label">Deskripsi Materi</label>
        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required>{{ $kursus->deskripsi }}</textarea>
    </div>
    <div class="mb-3">
        <label for="embed_link" class="form-label">Durasi</label>
        <input type="number" class="form-control" id="embed_link" name="durasi" value="{{ $kursus->durasi }}" required>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="{{ route('kursuses.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection

{{-- <h1>Edit Kursus: {{ $kursus->judul }}</h1>

<form action="{{ route('kursuses.update', $kursus->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="judul">Judul:</label>
    <input type="text" name="judul" id="judul" value="{{ $kursus->judul }}">
    @error('judul')
        <div>{{ $message }}</div>
    @enderror

    <label for="deskripsi">Deskripsi:</label>
    <textarea name="deskripsi" id="deskripsi">{{ $kursus->deskripsi }}</textarea>
    @error('deskripsi')
        <div>{{ $message }}</div>
    @enderror

    <label for="durasi">Durasi:</label>
    <input type="number" name="durasi" id="durasi" value="{{ $kursus->durasi }}">
    @error('durasi')
        <div>{{ $message }}</div>
    @enderror

    <button type="submit">Update</button>
</form> --}}