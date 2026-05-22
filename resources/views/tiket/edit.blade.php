@extends('adminlte::page')

@section('title', 'Edit Tiket')

@section('content_header')
    <h1>Edit Kategori Tiket</h1>
@endsection

@section('content')
    <div class="card card-warning">
        <div class="card-header text-white">
            <h3 class="card-title"><i class="fas fa-edit mr-1"></i> Form Ubah Data Tiket</h3>
        </div>
        
        <form action="{{ route('tiket.update', $tiket->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="card-body">
                
                <div class="form-group">
                    <label>Kode Tiket</label>
                    <input type="text" name="kode_tiket" class="form-control" value="{{ $tiket->kode_tiket }}" required>
                </div>

                <div class="form-group">
                    <label>Nama Event / Konser</label>
                    <select name="kode_event" class="form-control" required>
                        <option value="">-- Pilih Event --</option>
                        @foreach ($event as $ev)
                            <option value="{{ $ev->id }}" {{ $tiket->kode_event == $ev->id ? 'selected' : '' }}>
                                {{ $ev->nama_event }}
                            </option> 
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Kategori</label>
                    <select name="kategori" class="form-control" required>
                        <option value="Reguler" {{ $tiket->kategori == 'Reguler' ? 'selected' : '' }}>Reguler</option>
                        <option value="VIP" {{ $tiket->kategori == 'VIP' ? 'selected' : '' }}>VIP</option>
                        <option value="VVIP" {{ $tiket->kategori == 'VVIP' ? 'selected' : '' }}>VVIP</option>
                        <option value="VVVIP" {{ $tiket->kategori == 'VVVIP' ? 'selected' : '' }}>VVVIP</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="harga">Harga Tiket (Rp)</label>
                    <input type="number" name="harga" id="harga" class="form-control" value="{{ $tiket->harga }}" min="0" required>
                </div>

                <div class="form-group">
                    <label for="kuota_total">Kuota Jumlah Tiket</label>
                    <input type="number" name="kuota_total" id="kuota_total" class="form-control" value="{{ $tiket->kuota_total }}" min="1" required>
                    <small class="text-muted">Mengubah jumlah kuota akan otomatis menyesuaikan sisa ketersediaan tiket.</small>
                </div>
            </div>
            
            <div class="card-footer">
                <button type="submit" class="btn btn-warning text-white"><strong>Simpan Perubahan</strong></button>
                <a href="{{ route('tiket') }}" class="btn btn-default">Batal</a>
            </div>
        </form>
    </div>
@endsection