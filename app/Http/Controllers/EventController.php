<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Tiket;
use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::orderBy('created_at', 'desc')->get();
        return view('event.home', compact('events')); 
    }

    public function create()
    {
        return view('event.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama_event' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'tanggal_event' => 'required|date',
            'poster' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $namaGambar = null;
        if ($request->hasFile('poster')) {
            $file = $request->file('poster');
            $namaGambar = 'poster-' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img/posters'), $namaGambar);
        }
        Event::create([
            'nama_event' => $request->nama_event,
            'lokasi' => $request->lokasi,
            'tanggal_event' => $request->tanggal_event,
            'poster' => $namaGambar, 
        ]);

        return redirect()->route('event')->with('success', 'Master Event baru berhasil didaftarkan!');
    }
    public function edit($id)
{
    $event = Event::findOrFail($id);
    return view('event.edit', compact('event'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'nama_event' => 'required|string|max:255',
        'lokasi' => 'required|string|max:255',
        'tanggal_event' => 'required|date',
        'poster' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    $event = Event::findOrFail($id);
    $namaGambar = $event->poster;

    if ($request->hasFile('poster')) {
        // Hapus poster lama jika ada
        if ($event->poster && file_exists(public_path('img/posters/' . $event->poster))) {
            unlink(public_path('img/posters/' . $event->poster));
        }

        $file = $request->file('poster');
        $namaGambar = 'poster-' . time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('img/posters'), $namaGambar);
    }

    $event->update([
        'nama_event' => $request->nama_event,
        'lokasi' => $request->lokasi,
        'tanggal_event' => $request->tanggal_event,
        'poster' => $namaGambar,
    ]);

    return redirect()->route('event')->with('success', 'Master Event berhasil diperbarui!');
}
    public function delete($id){
        $event = Event::findOrFail($id);

    if ($event->poster && file_exists(public_path('img/posters/' . $event->poster))) {
        unlink(public_path('img/posters/' . $event->poster));
    }

    $event->delete();
    return redirect()->route('event')->with('success', 'Event berhasil dihapus!');
    }
}