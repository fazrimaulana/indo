<?php

namespace Modules\Orders\Models;

use Illuminate\Database\Eloquent\Model;


class Order extends Model
{
	protected $table = "orders";
	protected $primarykey = "id";

	protected $fillable = [
		"code", "transaction_method_id", "buyer_name", "buyer_email", "buyer_phone_number", "buyer_address", "buyer_province", "buyer_city", "weight", "courier", "service", "shipping_cost", "order_status", "total"
	];

	public function transactionMethod()
	{
		return $this->belongsTo('Modules\Orders\Models\TransactionMethod', 'transaction_method_id', 'id');
	}

	public function orderDetail()
	{
		return $this->hasMany('Modules\Orders\Models\OrderDetail', 'order_id', 'id');
	}

}