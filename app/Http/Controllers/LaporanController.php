<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tiket;
use App\Models\Event;
use Barryvdh\DomPDF\Facade\Pdf;
class LaporanController extends Controller
{
    public function index(){
        return view("laporan.index");
    }
    public function tiketReport(){
        $tiket = Tiket::with('event')->orderBy('created_at', 'desc')->get();
        $tanggal = date('d F Y');
        $pdf = Pdf::loadView('tiket.laporan_pdf', compact('tiket', 'tanggal'));
        $pdf->setPaper('a4', 'portrait');
        return $pdf->download('Laporan_Data_Tiket_Global.pdf');
    }
}