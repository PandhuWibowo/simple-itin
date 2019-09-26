<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ObjekWisata extends Model
{
    use SoftDeletes;
    protected $table = "wisatas";
    protected $primaryKey = "wisata_id";
    protected $fillable = [
        "wisata_id", "nama_wisata", "slug", "kota_id", "alamat", "kontak", "waktu_operasional", "waktu_bagian", "website", "deskripsi", "image", "alt", "is_approved", "url"
    ];

    public $incrementing = false;

    //Relasi ke Kota - Minta Kota Id ke table kotas
    public function getKota(){
        return $this->belongsTo(Kota::class, "kota_id");
    }

    public function setDetailTag(){
        return $this->hasMany(DetailTag::class, "wisata_id", "wisata_id");
    }
}
