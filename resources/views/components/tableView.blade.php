@extends('master')

@section('content')

@section('main')
    
    
    <!-- DataTales Example -->
    {{-- <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Table Data Kursus</h6>
            <a href="{{ route('kursus.create') }}" class="btn btn-rounded btn-primary">Tambah Data</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th>Durasi(jam)</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kursuses as $index => $item )
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->judul }}</td>
                            <td>{{ $item->deskripsi }}</td>
                            <td>{{ $item->durasi }}</td>
                            <td>
                                <a href="{{ route('kursus.edit', $item->id) }}" class="btn btn-rounded btn-primary">Edit</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>    
</div>

<div class="container mt-5">
    <h1 class="mb-4">Kursus List</h1>

    <div class="mb-3">
        <a href="{{ route('kursuses.create') }}" class="btn btn-primary">Create New Kursus</a>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">{{ $message }}</div>
    @endif

    <ul class="list-group">
        @foreach ($kursuses as $kursus)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="{{ route('kursuses.show', $kursus->id) }}">{{ $kursus->judul }}</a>
                <div>
                    <a href="{{ route('kursuses.edit', $kursus->id) }}" class="btn btn-sm btn-warning mr-2">Edit</a>
                    <form action="{{ route('kursuses.destroy', $kursus->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
    <h6>Click Kursus yang ingin diperlihatkan Detail Lebih Lanjut</h6>
</div> --}}

<div class="container-fluid mt-4">


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Table Data Kursus : Click Kursus Yang Ingin Dimasukkan Materinya</h6>
            <a href="{{ route('kursuses.create') }}" class="btn btn-rounded btn-primary">Tambah Data</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th>Durasi (jam)</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kursuses as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td><a href="{{ route('kursuses.show', $item->id) }}">{{ $item->judul }}</a></td>
                                <td>{{ $item->deskripsi }}</td>
                                <td>{{ $item->durasi }}</td>
                                <td>
                                    <a href="{{ route('kursuses.edit', $item->id) }}" class="btn btn-rounded btn-primary">Edit</a>
                                    <form action="{{ route('kursuses.destroy', $item->id) }}" method="POST" class="d-inline delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-rounded btn-danger delete-btn">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    // SweetAlert2 for success messages
    @if(session('success'))
        Swal.fire({
            title: 'Success!',
            text: '{{ session('success') }}',
            icon: 'success',
            confirmButtonText: 'OK'
        });
    @endif

    // SweetAlert2 for delete confirmation
    document.querySelectorAll('.delete-btn').forEach(button => {
        button.addEventListener('click', function() {
            const form = this.closest('.delete-form');

            Swal.fire({
                title: 'Are you sure?',
                text: 'You won\'t be able to revert this!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
</script>



@endsection

{{-- <h1>Detail Kursus</h1>
    <p><strong>Judul:</strong> {{ $kursus->judul }}</p>
    <p><strong>Deskripsi:</strong> {{ $kursus->deskripsi }}</p>
    <p><strong>Durasi:</strong> {{ $kursus->durasi }} jam</p>

    <h2>Materi</h2>
    <a href="{{ route('kursus.materi.create', $kursus->id) }}" class="btn btn-primary">Tambah Materi</a>
    <table class="table mt-4">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Embed Link</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kursus->materi as $m)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $m->judul }}</td>
                    <td>{{ $m->deskripsi }}</td>
                    <td><a href="{{ $m->embed_link }}" target="_blank">Lihat Materi</a></td>
                    <td>
                        <a href="{{ route('kursus.materi.edit', [$kursus->id, $m->id]) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('kursus.materi.destroy', [$kursus->id, $m->id]) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('kursus.index') }}" class="btn btn-secondary">Kembali</a> --}}

    

    
    {{-- <div class="container mt-5">
        <h1 class="mb-4">Kursus List</h1>
    
        <div class="mb-3">
            <a href="{{ route('kursuses.create') }}" class="btn btn-primary">Create New Kursus</a>
        </div>
    
        @if ($message = Session::get('success'))
            <div class="alert alert-success">{{ $message }}</div>
        @endif
    
        <ul class="list-group">
            @foreach ($kursuses as $kursus)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="{{ route('kursuses.show', $kursus->id) }}">{{ $kursus->judul }}</a>
                    <div>
                        <a href="{{ route('kursuses.edit', $kursus->id) }}" class="btn btn-sm btn-warning mr-2">Edit</a>
                        <form action="{{ route('kursuses.destroy', $kursus->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
        <h6>Click Kursus yang ingin diperlihatkan Detail Lebih Lanjut</h6>
    </div>
     --}}