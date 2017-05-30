<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Modules\Categories\Models\Category;

class FrontendController extends Controller
{
    //
    // public function __construct()
    // {

    // }

	public function index()
	{
		
		$categories = Category::all();

		return view('frontend.welcome', [
				"categories" => $categories
			]);
	}

}
