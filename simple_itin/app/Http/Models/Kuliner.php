<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kuliner extends Model
{
    use SoftDeletes;
    protected $table = "kuliners";
    protected $primaryKey = "kuliner_id";
    protected $fillable = [
        "kuliner_id", "nama_kuliner", "slug", "kota_id", "waktu_operasional", "waktu_bagian", "deskripsi", "alamat", "image", "alt", "url", "is_approved"
    ];

    public $incrementing = false;

    //Relasi ke Kota - Minta Kota Id ke table kotas
    public function getKota(){
        return $this->belongsTo(Kota::class, "kota_id");
    }
}
