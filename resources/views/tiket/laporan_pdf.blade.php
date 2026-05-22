<!DOCTYPE html>
<html>
<head>
    <title>Laporan Data Tiket Global</title>
    <style>
        body { font-family: 'Helvetica', Arial, sans-serif; color: #333; font-size: 12px; }
        .header { text-align: center; margin-bottom: 30px; border-bottom: 2px solid #000; padding-bottom: 10px; }
        .header h2 { margin: 0; padding: 0; text-transform: uppercase; color: #111; }
        .header p { margin: 5px 0 0 0; font-size: 11px; color: #555; }
        .meta-info { margin-bottom: 15px; width: 100%; }
        .meta-info td { font-size: 11px; }
        .table-data { width: 100%; border-collapse: collapse; margin-top: 10px; }
        .table-data th { background-color: #f2f2f2; color: #000; font-weight: bold; padding: 8px; border: 1px solid #ddd; text-align: left; }
        .table-data td { padding: 8px; border: 1px solid #ddd; }
        .badge { background-color: #e9ecef; padding: 3px 6px; border-radius: 4px; font-size: 10px; font-weight: bold; }
        .text-right { text-align: right; }
        .footer { position: fixed; bottom: 0; width: 100%; text-align: right; font-size: 9px; color: #777; }
    </style>
</head>
<body>

    <div class="header">
        <h2>E-TICKET SYSTEM</h2>
        <p>Email: support@etiket.com | Dokumen Laporan Sistem Otomatis</p>
    </div>

    <table class="meta-info">
        <tr>
            <td><strong>Jenis Laporan:</strong> Rekapitulasi Data Tiket Masuk</td>
            <td style="text-align: right;"><strong>Tanggal Cetak:</strong> {{ $tanggal }}</td>
        </tr>
    </table>

    <table class="table-data">
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="15%">Kode Tiket</th>
                <th>Nama Event / Konser</th>
                <th>Kategori</th>
                <th>Harga Satuan</th>
                <th width="15%">Sisa Kuota</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tiket as $key => $t)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td><span class="badge">{{ $t->kode_tiket }}</span></td>
                <td><strong>{{ $t->event->nama_event ?? 'Event Tidak Ditemukan' }}</strong></td>
                <td>{{ $t->kategori }}</td>
                <td>Rp {{ number_format($t->harga, 0, ',', '.') }}</td>
                <td>{{ $t->kuota_tersedia }} / {{ $t->kuota_total }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        Dicetak secara otomatis oleh Sistem Manajemen Tiket Rash Project. Halaman 1 dari 1
    </div>

</body>
</html>