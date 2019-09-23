<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Tag extends Model
{
    use SoftDeletes;
    protected $table = "tags";
    protected $primaryKey = "tag_id";
    protected $fillable = [
        "tag_id", "nama_tag"
    ];

    public $incrementing = false;
}
