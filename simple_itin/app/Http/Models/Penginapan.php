<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Penginapan extends Model
{
    use SoftDeletes;
    protected $table = "penginapans";
    protected $primaryKey = "penginapan_id";
    protected $fillable = [
        "penginapan_id", "nama_penginapan", "slug", "kota_id", "waktu_operasional", "waktu_bagian", "deskripsi", "alamat", "image", "alt", "url", "is_approved"
    ];

    public $incrementing = false;

    public function getPenginapan(){
        return $this->belongsToMany(JenisPenginapan::class, "penginapan_jenispenginapans", "penginapan_id", "jenis_penginapan_id");
    }
}
