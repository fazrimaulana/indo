<?php

namespace App\Helpers;


class RajaOngkir
{

	protected $key;

	public function __construct($key="8c627b663dc8013e260ed9978797f56c"){
		$this->key = $key;
	}

	public function provinsi(){

		$curl = curl_init();

		curl_setopt_array($curl, array(
  			CURLOPT_URL => "http://api.rajaongkir.com/starter/province",
  			CURLOPT_RETURNTRANSFER => true,
  			CURLOPT_ENCODING => "",
  			CURLOPT_MAXREDIRS => 10,
  			CURLOPT_TIMEOUT => 30,
  			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  			CURLOPT_CUSTOMREQUEST => "GET",
  			CURLOPT_HTTPHEADER => array(
    			"key: ".$this->key
  			),
		));

		$response = json_decode(curl_exec($curl));
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
	  		return "cURL Error #:" . $err;
		} else {
  			return $response;
		}

	}

	public function city(){

		$curl = curl_init();

		curl_setopt_array($curl, array(
  			CURLOPT_URL => "http://api.rajaongkir.com/starter/city",
  			CURLOPT_RETURNTRANSFER => true,
  			CURLOPT_ENCODING => "",
  			CURLOPT_MAXREDIRS => 10,
  			CURLOPT_TIMEOUT => 30,
  			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  			CURLOPT_CUSTOMREQUEST => "GET",
  			CURLOPT_HTTPHEADER => array(
    			"key: ".$this->key
  			),
		));

		$response = json_decode(curl_exec($curl));
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
  			return "cURL Error #:" . $err;
		} else {
  			return $response;
		}	

	}

	public function getCity($province){
		$curl = curl_init();

		curl_setopt_array($curl, array(
  			CURLOPT_URL => "http://api.rajaongkir.com/starter/city?province=".$province,
  			CURLOPT_RETURNTRANSFER => true,
  			CURLOPT_ENCODING => "",
  			CURLOPT_MAXREDIRS => 10,
  			CURLOPT_TIMEOUT => 30,
  			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  			CURLOPT_CUSTOMREQUEST => "GET",
  			CURLOPT_HTTPHEADER => array(
    			"key: ".$this->key
  			),
		));

		$response = json_decode(curl_exec($curl));
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
  			return "cURL Error #:" . $err;
		} else {
  			return $response->rajaongkir->results;
		}

	}

	public function getCost($origin, $destination, $weight, $courier){

		$curl = curl_init();

		curl_setopt_array($curl, array(
  			CURLOPT_URL => "http://api.rajaongkir.com/starter/cost",
  			CURLOPT_RETURNTRANSFER => true,
  			CURLOPT_ENCODING => "",
  			CURLOPT_MAXREDIRS => 10,
  			CURLOPT_TIMEOUT => 30,
  			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  			CURLOPT_CUSTOMREQUEST => "POST",
  			CURLOPT_POSTFIELDS => "origin=".$origin."&destination=".$destination."&weight=".$weight."&courier=".$courier,
  			CURLOPT_HTTPHEADER => array(
    			"content-type: application/x-www-form-urlencoded",
    			"key: ".$this->key
  			),
		));

		$response = json_decode(curl_exec($curl));
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
  			return "cURL Error #:" . $err;
		} else {
  			return $response;
		}
		
	}



}