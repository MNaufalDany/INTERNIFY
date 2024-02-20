<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pkl extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_siswa',
        'id_dudi',
        'tgl_masuk',
        'tgl_keluar',
        'nilai',
    ];


    public function siswa() 
    {
        return $this->belongsTo(Siswa::class, 'id_siswa', 'id');
    }
    public function dudi()
    {
        return $this->belongsTo(Dudi::class, 'id_dudi', 'id');
    }
}