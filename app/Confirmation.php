<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Confirmation extends Model
{
    protected $table = "confirmations";
    protected $primarykey = "id";

    protected $fillable = [
    	"order_id", "confirmation_name", "bank_to", "bank_from", "account_bank_no", "account_name", "transfer_amount", "transfer_img", "date_transfer", "read"
    ];
}
