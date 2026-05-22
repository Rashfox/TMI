<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tiket;
use App\Models\Event;

class TiketController extends Controller
{
    public function index()
    {
        $tiket = Tiket::with('event')->orderBy('created_at', 'desc')->get();
        return view('tiket.home', compact('tiket')); 
    }

    public function create()
    {
        $event = Event::select('id', 'nama_event')->get();
        return view('tiket.create', compact('event'));
    }

    public function store(Request $request)
    {
        $tanggal = Event::where('id', $request->event_id)->value('tanggal_event');
        $request->validate([
            'kode_tiket'  => 'required|string|max:255',
            'event_id'    => 'required|integer',
            'kategori'    => 'required|string|max:255',
            'harga'       => 'required|integer',
            'kuota_total' => 'required|integer',
            ]);
            
        if ($tanggal >= now()) {
            Tiket::create([
                'kode_tiket'     => $request->kode_tiket,
                'kode_event'     => $request->event_id,
                'kategori'       => $request->kategori,
                'harga'          => $request->harga,
                'kuota_total'    => $request->kuota_total,
                'kuota_tersedia' => $request->kuota_total,
            ]);
            return redirect()->route('tiket')->with('success', 'Kategori tiket baru berhasil didaftarkan!');
        }
        return redirect()->route('tiket')->with('error','Event telah berakhir');
    }
    public function edit($id)
{
    $tiket = Tiket::findOrFail($id); 
    $event = Event::select('id', 'nama_event')->get();
    
    return view('tiket.edit', compact('tiket', 'event'));
}
public function update(Request $request, $id)
{
    $request->validate([
        'kode_tiket'  => 'required|string|max:255',
        'kode_event'    => 'required|integer',
        'kategori'    => 'required|string|max:255',
        'harga'       => 'required|integer',
        'kuota_total' => 'required|integer',
    ]);

    $tiket = Tiket::findOrFail($id);

    // Hitung ulang kuota tersedia jika kuota total diubah oleh admin
    $selisihKuota = $request->kuota_total - $tiket->kuota_total;
    $kuotaTersediaBaru = $tiket->kuota_tersedia + $selisihKuota;

    $tiket->update([
        'kode_tiket'     => $request->kode_tiket,
        'kode_event'      => $request->kode_event,
        'kategori'       => $request->kategori,
        'harga'          => $request->harga,
        'kuota_total'    => $request->kuota_total,
        'kuota_tersedia' => $kuotaTersediaBaru < 0 ? 0 : $kuotaTersediaBaru, // Mencegah sisa kuota minus
    ]);

    return redirect()->route('tiket')->with('success', 'Data tiket berhasil diperbarui!');
    }
    public function delete($id){
        $tiket = Tiket::findOrFail($id);
    $tiket->delete();
    return redirect()->route('tiket')->with('success', 'Tiket berhasil dihapus!');
    }
}