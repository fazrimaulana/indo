<?php

namespace Modules\Categories\Models;

use Illuminate\Database\Eloquent\Model;


class Category extends Model
{
	protected $table = "categories";
	protected $primarykey = "id";

	protected $fillable = [
		"parent_id", "name", "slug", "description", "icon"
	];

	public function product()
	{
		return $this->hasMany('Modules\Products\Models\Product', 'category_id', 'id');
	}

}