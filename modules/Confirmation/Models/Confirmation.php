<?php

namespace Modules\Confirmation\Models;

use Illuminate\Database\Eloquent\Model;


class Confirmation extends Model
{
    protected $table = "confirmations";
    protected $primarykey = "id";

    protected $fillable = [
    	"order_id", "confirmation_name", "bank_to", "bank_from", "account_bank_no", "account_name", "transfer_amount", "transfer_img", "date_transfer", "read"
    ];

    public function order(){
    	return $this->belongsTo('Modules\Orders\Models\Order', 'order_id', 'id');
    }

    public function bankTo(){
    	return $this->belongsTo('App\Bank', 'bank_to', 'id');
    }

    public function bankFrom(){
    	return $this->belongsTo('App\Bank', 'bank_from', 'id');
    }

}