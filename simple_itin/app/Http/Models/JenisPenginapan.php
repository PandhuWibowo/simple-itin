<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class JenisPenginapan extends Model
{
    protected $table = "jenis_penginapans";
    protected $primaryKey = "jenis_penginapan_id";
    protected $fillable = [
        "jenis_penginapan_id", "nama_jenis_penginapan"
    ];

    public $incrementing = false;
}
