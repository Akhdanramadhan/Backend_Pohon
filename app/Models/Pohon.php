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
        'umur_pohon',
        'tinggi_pohon',
        'lokasi_pohon',
        'id_pemilik'
    ];

    public function pemilik()
    {
        return $this->belongsTo(PemilikPohon::class, 'id_pemilik');
    }
}
