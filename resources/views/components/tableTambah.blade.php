@extends('master')

@section('content')

@section('main')
<h1>Tambah Kursus:</h1>
@if(session('success'))
<script>
    Swal.fire({
        title: 'Success!',
        text: '{{ session('success') }}',
        icon: 'success',
        confirmButtonText: 'OK'
    });
</script>
@endif
{{-- <h1>Edit Materi di Kursus: {{ $kursus->judul }}</h1> --}}
<form action="{{ route('kursuses.store') }}" method="POST">
{{-- <form action="{{ route('kursus.materi.update', [$kursus->id, $materi->id]) }}" method="POST"> --}}
    @csrf
    <div class="mb-3">
        <label for="judul" class="form-label">Judul Kursus</label>
        <input type="text" class="form-control" id="judul" name="judul" placeholder="Input Judul Kursus Anda" required>
    </div>
    <div class="mb-3">
        <label for="deskripsi" class="form-label">Deskripsi Kursus</label>
        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" placeholder="Input Deskripsi Lebih Lanjut Mengenai Kursus" required></textarea>
    </div>
    <div class="mb-3">
        <label for="embed_link" class="form-label">Durasi Kursus</label>
        <input type="number" class="form-control" id="embed_link" name="durasi" value="" placeholder="Input Durasi" required>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
    {{-- <a href="{{ route('kursus.show', $kursus->id) }}" class="btn btn-secondary">Kembali</a> --}}
    <a href="{{ route('kursuses.index') }}" class="btn btn-secondary">Kembali</a>
</form>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@endsection

{{-- <h1>Create New Kursus</h1>

<form action="{{ route('kursuses.store') }}" method="POST">
    @csrf
    <label for="judul">Judul:</label>
    <input type="text" name="judul" id="judul">
    @error('judul')
        <div>{{ $message }}</div>
    @enderror

    <label for="deskripsi">Deskripsi:</label>
    <textarea name="deskripsi" id="deskripsi"></textarea>
    @error('deskripsi')
        <div>{{ $message }}</div>
    @enderror

    <label for="durasi">Durasi:</label>
    <input type="number" name="durasi" id="durasi">
    @error('durasi')
        <div>{{ $message }}</div>
    @enderror

    <button type="submit">Submit</button>
</form> --}}

