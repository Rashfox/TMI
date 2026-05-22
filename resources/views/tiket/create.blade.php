@extends('adminlte::page')

@section('title', 'Tambah Tiket Baru')

@section('content_header')
    <h1>Buat Master Tiket</h1>
@endsection

@section('content')
    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title"><i class="fas fa-ticket-alt mr-1"></i> Form Input Tiket Baru</h3>
        </div>
        <form action="{{ route('tiket.store') }}" method="POST">
            @csrf
            <div class="card-body">
                
                <div class="form-group">
                    <label>Kode Tiket</label>
                    <input type="text" name="kode_tiket" class="form-control" placeholder="Contoh: VIP2222" required>
                </div>

                <div class="form-group">
                    <label>Nama Event / Konser</label>
                    <select name="event_id" class="form-control" required>
                        <option value="">-- Pilih Event --</option>
                        @foreach ( $event as $ev )
                            <option value="{{ $ev->id }}">{{ $ev->nama_event }}</option> 
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Kategori</label>
                    <select name="kategori" class="form-control" required>
                        <option value="Reguler">Reguler</option>
                        <option value="VIP">VIP</option>
                        <option value="VVIP">VVIP</option>
                        <option value="VVVIP">VVVIP</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="harga">Harga Tiket (Rp)</label>
                    <input type="number" name="harga" id="harga" class="form-control" placeholder="Contoh: 150000" min="0" required>
                </div>

                <div class="form-group">
                    <label for="kuota_total">Kuota Jumlah Tiket</label>
                    <input type="number" name="kuota_total" id="kuota_total" class="form-control" placeholder="Contoh: 50" min="1" required>
                    <small class="text-muted">Jumlah maksimal tiket yang dapat dijual untuk kelas kategori ini.</small>
                </div>
            </div>
            
            <div class="card-footer">
                <button type="submit" class="btn btn-success">Simpan Tiket</button>
                <a href="{{ route('tiket') }}" class="btn btn-default">Batal</a>
            </div>
        </form>
    </div>
@endsection