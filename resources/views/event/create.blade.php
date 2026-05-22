@extends('adminlte::page')

@section('title', 'Tambah Event Baru')

@section('content_header')
    <h1>Buat Master Event</h1>
@endsection

@section('content')
    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title"><i class="fas fa-calendar-plus mr-1"></i> Form Input Event Baru</h3>
        </div>
        <form action="{{ route('event.store') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label>Nama Event / Konser</label>
                    <input type="text" name="nama_event" class="form-control" placeholder="Contoh: Konser Musik PNC Musikindo" required>
                </div>
                <div class="form-group">
                    <label>Lokasi / Tempat Pelaksanaan</label>
                    <input type="text" name="lokasi" class="form-control" placeholder="Contoh: Auditorium Gedung Kuliah Bersama PNC" required>
                </div>
                <div class="form-group">
                    <label>Tanggal Acara</label>
                    <input type="date" name="tanggal_event" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Poster</label>
                    <input type="file" name="poster" class="form-control">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success">Simpan Event</button>
                <a href="{{ route('event') }}" class="btn btn-default">Batal</a>
            </div>
        </form>
    </div>
@endsection