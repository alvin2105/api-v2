<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class parkir extends Model
{
    use HasFactory;
   
    protected $fillable = [
        'nama_parkir',
        'lokasi_parkir',
        'jarak',
        'jam',
        'harga',
        'rating',
        'status_lahan' ,
        'total_lahan' ,
        'lahan_tersedia',
        'lahan_tidak_tersedia',
        'link_map',
        'tarif_1',
        'tarif_2',
        'tarif_3',
        'image_parkir',
        'link_image',
        
    ];
    public function booking(){
        return $this->belongsTo(Booking::class);
    }

   
}
