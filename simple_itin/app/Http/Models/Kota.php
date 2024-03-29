<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Kota extends Model
{
    use SoftDeletes;
    protected $table = "kotas";
    protected $primaryKey = "kota_id";
    protected $fillable = [
        "kota_id", "nama_kota", "kode_kota"
    ];

    public $incrementing = false;
}
