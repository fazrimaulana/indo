<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Modules\Categories\Models\Category;
use Modules\Products\Models\Product;

class FrontendController extends Controller
{
    //
    // public function __construct()
    // {

    // }

	public function index()
	{
		
		$categories = Category::where('parent_id', 0)->get();

		return view('frontend.welcome', [
				"categories" => $categories
			]);
	}

	public function checkProvider(Request $request)
	{
		if ($request->ajax()) {

			$products = Product::whereHas('category', function($query){
				$query->where('name', 'pulsa');
			})->where('parent_id', 0)->get();

			$id = null;

			foreach ($products as $product) {
				$json = json_decode($product->custom);
				foreach ($json->prefix as $prefix) {
					if ($prefix==$request->custom) {
						$id = $product->id;
						break;						
					}
				}	
			}

			return response()->json(["id" => $id]);

		}
	}

	public function getProvider(Request $request)
	{
		if ($request->ajax()) {
			
			$product = Product::where('parent_id', $request->id)->get();

			return response()->json($product);

		}
	}

}
