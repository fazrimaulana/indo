<?php

namespace Modules\Products\Models;

use Illuminate\Database\Eloquent\Model;


class Gallery extends Model
{
	protected $table = "galleries";
	protected $primarykey = "id";

	protected $fillable = [
		"name", "path"
	];

	public function product()
    {
        return $this->belongsToMany('Modules\Products\Models\Product', 'product_gallery', 'gallery_id', 'product_id')->withPivot('set_utama');
    }

}