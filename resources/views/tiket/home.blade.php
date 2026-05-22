@extends('adminlte::page')

@section('title', 'Manajemen Tiket')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Kelola Tiket</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">Tiket</li>
                <li class="breadcrumb-item"><a href="{{ route('event') }}">Event</a></li>
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
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <h5><i class="icon fas fa-times"></i> Gagal!</h5>
            {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title"><i class="fas fa-ticket-alt mr-1"></i> Data Tiket Masuk</h3>
            <div class="card-tools">
                <a href="{{ route('tiket.create') }}" class="btn btn-sm btn-primary">
                    <i class="fas fa-plus"></i> Tambah Tiket
                </a>
            </div>
        </div>
        
        <div class="card-body">
            <div class="table-responsive">
                <table id="table-tiket" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th width="10%">Poster</th>
                            <th>Kode Tiket</th>
                            <th>Nama Event</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Sisa Kuota</th>
                            <th width="15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($tiket as $key => $t)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td class="text-center">
                                @if($t->event && $t->event->poster)
                                    <img src="{{ asset('img/posters/' . $t->event->poster) }}" alt="Poster" class="img-thumbnail" style="max-height: 60px;">
                                @else
                                    <span class="badge badge-secondary">No Poster</span>
                                @endif
                            </td>
                            <td><span class="badge badge-info">{{ $t->kode_tiket }}</span></td>
                            <td><strong>{{ $t->event->nama_event ?? 'Event Tidak Ditemukan' }}</strong></td>
                            <td>{{ $t->kategori }}</td>
                            <td>Rp {{ number_format($t->harga, 0, ',', '.') }}</td>
                            <td>
                                <span class="badge {{ $t->kuota_tersedia == 0 ? 'badge-danger' : 'badge-success' }}">
                                    {{ $t->kuota_tersedia }} / {{ $t->kuota_total }}
                                </span>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('tiket.edit', $t->id) }}" class="btn btn-warning btn-sm" title="Edit"><i class="fas fa-edit"></i></a>
                                    <form action="{{ route('tiket.destroy', $t->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus tiket ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center text-muted">Belum ada data tiket yang terdaftar.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

{{-- Poin 2: Mengaktifkan Fitur Sorting & Datatable AdminLTE --}}
@section('js')
    <script>
        $(document).ready(function () {
            $('#table-tiket').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true, // Fitur Sorting Aktif
                "info": true,
                "autoWidth": false,
                "responsive": true,
                "language": {
                    "search": "Cari Tiket:",
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