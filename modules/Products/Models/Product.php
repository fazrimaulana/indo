<?php

namespace Modules\Products\Models;

use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
	protected $table = "products";
	protected $primarykey = "id";

	protected $fillable = [
		"category_id", "parent_id", "name", "condition", "weight", "min_order", "max_order", "price", "description", "stok", "view", "discount", "start_time_discount", "end_time_discount", "custom"
	];

	public function gallery()
    {
        return $this->belongsToMany('Modules\Products\Models\Gallery', 'product_gallery', 'product_id', 'gallery_id')->withPivot('set_utama');
    }

    public function category()
    {
    	return $this->belongsTo('Modules\Categories\Models\Category', 'category_id', 'id');
    }

    public function orderDetail()
    {
        return $this->hasMany('Modules\Orders\Models\OrderDetail', 'product_id', 'id');
    }

}