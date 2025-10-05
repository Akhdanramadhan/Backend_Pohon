<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pohon extends Model
{
    use HasFactory;

    protected $table = 'pohon';

    protected $fillable = [
        'nama_pohon',
        'jenis_pohon',
        'tanggal_tanam',
        'tinggi_pohon',
        'satuan_tinggi',
        'lokasi_pohon',
        'latitude',
        'longitude',
        'id_pemilik',
    ];

    public function pemilik()
    {
        return $this->belongsTo(PemilikPohon::class, 'id_pemilik');
    }
}
