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

//    public function setDetailTag(){
//        return $this->hasMany(DetailTag::class, "tag_id", "tag_id");
//    }

    public function getObjekWisata()
    {
        return $this->belongsToMany(ObjekWisata::class, "wisata_tags", "tag_id", "wisata_id");
    }
}
