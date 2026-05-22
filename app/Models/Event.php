<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = ['id','nama_event', 'lokasi', 'tanggal_event', 'poster'];
    public function tikets()
    {
        return $this->hasMany(Tiket::class);
    }
}
