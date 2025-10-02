<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemilikPohon extends Model
{
    use HasFactory;

    protected $table = 'pemilik_pohon';

    protected $fillable = [
        'nama_pemilik',
        'umur_pemilik',
        'jenis_kelamin'
    ];

    public function pohon()
    {
        return $this->hasMany(Pohon::class, 'id_pemilik');
    }
}
