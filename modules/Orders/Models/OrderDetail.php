<?php

namespace Modules\Orders\Models;

use Illuminate\Database\Eloquent\Model;


class OrderDetail extends Model
{
	protected $table = "order_details";
	protected $primarykey = "id";

	protected $fillable = [
		"product_id", "order_id", "product_name", "qty", "product_price", "discount_price", "subtotal"
	];

	public function order()
	{
		return $this->belongsTo('Modules\Orders\Models\Order', 'order_id', 'id');
	}

	public function product()
	{
		return $this->belongsTo('Modules\Products\Models\Product', 'product_id', 'id');
	}

}