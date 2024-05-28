<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class komentar extends Model
{
    use HasFactory;
    public function berita(){
        return $this->belongsTo(Berita::class, 'id_berita');
        }
    public function kategori(){
        return $this->belongsTo(Kategori::class, 'id_kategori');
        }
}
