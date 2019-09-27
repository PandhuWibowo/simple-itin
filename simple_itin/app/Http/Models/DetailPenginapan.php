<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class DetailPenginapan extends Model
{
    protected $table = "penginapan_jenispenginapans";
    protected $fillable = [
        "penginapan_id", "jenis_penginapan_id"
    ];

    public $incrementing = false;
}
