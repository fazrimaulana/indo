<?php

namespace App\Helpers;

class Money
{
	
	public static function setRupiah($angka)
	{
		return number_format($angka, 2,',','.');
	}
	
}