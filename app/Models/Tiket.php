<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tiket extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'kode_event','kode_tiket', 'kategori', 'harga', 'kuota_total', 'kuota_tersedia'];

    public function event()
    {
        return $this->belongsTo(Event::class, 'kode_event');
    }
}