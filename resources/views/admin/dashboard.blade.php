@extends('adminlte::page')

@section('title', 'Manajemen Tiket')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Kelola Tiket Event</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active">Home</li>
                <li class="breadcrumb-item"><a href="{{ route('tiket') }}">Tiket</a></li>
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

    dashboard
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