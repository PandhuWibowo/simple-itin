<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetailTag extends Model
{
    use SoftDeletes;
    protected $table = "wisata_tags";
    protected $fillable = [
        "tag_id", "wisata_id"
    ];

    public $incrementing = false;

//    public function getTag(){
//        return $this->belongsTo(Tag::class, "tag_id");
//    }
//
//    public function getWisata(){
//        return $this->belongsTo(ObjekWisata::class, "wisata_id");
//    }
}
