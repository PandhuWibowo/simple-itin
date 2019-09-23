<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    protected $table = "kotas";
    protected $primaryKey = "kota_id";
    protected $fillable = [
        "kota_id", "nama_kota", "kode_kota"
    ];

    public $timestamps = false;
}
