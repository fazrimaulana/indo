<?php

namespace Modules\Frontpage\Models;

use Illuminate\Database\Eloquent\Model;


class Slideshow extends Model
{
    protected $table = "slideshow";
    protected $primarykey = "id";

    protected $fillable = [
        "gallery_id", "title"
    ];

    public function gallery(){
    	return $this->belongsTo('Modules\Products\Models\Gallery', 'gallery_id', 'id');
    }

}