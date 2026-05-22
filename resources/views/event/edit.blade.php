@extends('adminlte::page')

@section('title', 'Edit Event')

@section('content_header')
    <h1>Edit Master Event</h1>
@endsection

@section('content')
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title"><i class="fas fa-edit mr-1"></i> Form Ubah Event</h3>
        </div>
        <form action="{{ route('event.update', $event->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    <label>Nama Event</label>
                    <input type="text" name="nama_event" class="form-control" value="{{ $event->nama_event }}" required>
                </div>
                <div class="form-group">
                    <label>Lokasi</label>
                    <input type="text" name="lokasi" class="form-control" value="{{ $event->lokasi }}" required>
                </div>
                <div class="form-group">
                    <label>Tanggal Acara</label>
                    <input type="date" name="tanggal_event" class="form-control" value="{{ $event->tanggal_event }}" required>
                </div>
                <div class="form-group">
                    <label>Poster Saat Ini</label><br>
                    @if($event->poster)
                        <img src="{{ asset('img/posters/' . $event->poster) }}" width="150" class="img-thumbnail mb-2">
                    @endif
                    <input type="file" name="poster" class="form-control">
                    <small class="text-muted">Kosongkan jika tidak ingin mengubah poster.</small>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-warning">Simpan Perubahan</button>
                <a href="{{ route('event') }}" class="btn btn-default">Batal</a>
            </div>
        </form>
    </div>
@endsection