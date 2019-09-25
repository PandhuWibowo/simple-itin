<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class JenisPenginapan extends Model
{
    use SoftDeletes;
    protected $table = "jenis_penginapans";
    protected $primaryKey = "jenis_penginapan_id";
    protected $fillable = [
        "jenis_penginapan_id", "nama_jenis_penginapan"
    ];

    public $incrementing = false;
}
