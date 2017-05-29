<?php

namespace Modules\Products\Models;

use Illuminate\Database\Eloquent\Model;


class ProductGallery extends Model
{
	protected $table = "product_gallery";
	protected $primarykey = "id";

	protected $fillable = [
		"product_id", "gallery_id", "set_utama"
	];

}