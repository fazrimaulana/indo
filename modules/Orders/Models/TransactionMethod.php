<?php

namespace Modules\Orders\Models;

use Illuminate\Database\Eloquent\Model;


class TransactionMethod extends Model
{
	protected $table = "transaction_methods";
	protected $primarykey = "id";

	protected $fillable = [
		"name", "description"
	];

	public function order()
	{
		return $this->hasMany('Modules\Orders\Models\Order', 'transaction_method_id', 'id');
	}

}