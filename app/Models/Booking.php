<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Parkirs;

class Booking extends Model
{
  
    use HasFactory;

    protected $fillable = [
        'lahan_terpilih',
        'jenis_pembayaran',
        'status_pembayaran',
        'tarif',
        'waktu_booking',
        'nomor_kendaraan',
        'kendaraan',
        'nama_pengguna',
        'email',
        'nama_parkir'
        
        
    ];

    public function user(){
        return $this->hasMany(User::class);
    }

    public function parkir(){
        return $this->hasMany(Parkirs::class);
    }
}
