@extends('master')
@section('content')

@section('main')
{{-- <h1>{{ $kursus->judul }}</h1>
<p>{{ $kursus->deskripsi }}</p>
<p>Durasi: {{ $kursus->durasi }} menit</p>

<h2>Materis</h2>
<a href="{{ route('materis.create', $kursus->id) }}">Add Materi</a>

<ul>
    @foreach ($materis as $materi)
        <li>
            <strong>{{ $materi->judul }}</strong><br>
            {{ $materi->deskripsi }}<br>
            <a href="{{ $materi->link }}" target="_blank">{{ $materi->link }}</a>
            <a href="{{ route('materis.edit', $materi->id) }}">Edit</a>
            <form action="{{ route('materis.destroy', $materi->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </li>
    @endforeach
</ul> --}}

<div class="container-fluid mt-4">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Kursus: {{ $kursus->judul }}</h6>
            <div class="d-flex align-items-center gap-2 mb-3">
                <a href="{{ route('materis.create', $kursus->id) }}" class="btn btn-rounded btn-primary">Add Materi</a>
                <a href="{{ route('kursuses.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
        <div class="card-body">
            @if($materis->isEmpty())
                <p class="text-muted">Belum ada materi yang ditambahkan.</p>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Deskripsi</th>
                                <th>Link</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($materis as $index => $materi)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $materi->judul }}</td>
                                    <td>{{ $materi->deskripsi }}</td>
                                    <td><a href="{{ $materi->link }}" target="_blank">{{ $materi->link }}</a></td>
                                    <td>
                                        <a href="{{ route('materis.edit', $materi->id) }}" class="btn btn-rounded btn-primary btn-sm">Edit</a>
                                        <form action="{{ route('materis.destroy', $materi->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-rounded btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>    
</div>
@endsection