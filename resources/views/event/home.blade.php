@extends('adminlte::page')

@section('title', 'Manajemen Event')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Kelola Event</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('tiket') }}">Tiket</a></li>
                <li class="breadcrumb-item active">Event</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <h5><i class="icon fas fa-check"></i> Sukses!</h5>
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title"><i class="fas fa-ticket-alt mr-1"></i> Data Event Masuk</h3>
            <div class="card-tools">
                <a href="{{ route('event.create') }}" class="btn btn-sm btn-primary">
                    <i class="fas fa-plus"></i> Tambah Event
                </a>
            </div>
        </div>
        
        <div class="card-body">
            <div class="table-responsive">
                <table id="table-Event" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th width="15%">Poster</th>
                            <th>Nama Event</th>
                            <th>Lokasi Tempat</th>
                            <th>Tanggal Pelaksanaan</th>
                            <th width="15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($events as $key => $ev)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td class="text-center">
                                @if($ev->poster)
                                    <img src="{{ asset('img/posters/' . $ev->poster) }}" alt="Poster" class="img-thumbnail" style="max-height: 60px;">
                                @else
                                    <span class="badge badge-secondary">No Poster</span>
                                @endif
                            </td>
                            <td><strong>{{ $ev->nama_event }}</strong></td>
                            <td><i class="fas fa-map-marker-alt text-danger mr-1"></i> {{ $ev->lokasi }}</td>
                            <td><i class="fas fa-calendar-alt text-primary mr-1"></i> {{ \Carbon\Carbon::parse($ev->tanggal_event)->format('d M Y') }}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('event.edit', $ev->id) }}" class="btn btn-warning btn-sm" title="Edit"><i class="fas fa-edit"></i></a>
                                    <form action="{{ route('event.destroy', $ev->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus event ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">Belum ada master event yang terdaftar.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function () {
            $('#table-Event').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
                "language": {
                    "search": "Cari Event:",
                    "lengthMenu": "Tampilkan _MENU_ data per halaman",
                    "zeroRecords": "Data tidak ditemukan",
                    "info": "Menampilkan halaman _PAGE_ dari _PAGES_",
                    "infoEmpty": "Tidak ada data tersedia",
                    "paginate": {
                        "next": "Selanjutnya",
                        "previous": "Sebelumnya"
                    }
                }
            });
        });
    </script>
@endsection