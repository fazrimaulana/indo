<?php

namespace Modules\Frontpage\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use Modules\Frontpage\Models\Slideshow;
use Modules\Products\Models\Gallery;

class FrontpageController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index()
	{
		$method_permission = "can_see_slideshow";
		if(Auth::user()->hasRole('root') || Auth::user()->can($method_permission) ){

			$slideshow = Slideshow::paginate(10);
			return view('Frontpage::slideshow.index', [
					"slideshow" => $slideshow
				]);

        }else{
            return view('404');
        }
	}

	public function add()
	{
		$method_permission = "can_add_slideshow";
		if(Auth::user()->hasRole('root') || Auth::user()->can($method_permission) ){

			return view('Frontpage::slideshow.add');

        }else{
            return view('404');
        }
	}

	public function store(Request $request)
	{
		$method_permission = "can_add_slideshow";
		if(Auth::user()->hasRole('root') || Auth::user()->can($method_permission) ){

			//return dd($request->all());

			$this->validate($request,[
					"image" => "required|image"
 				]);

			$nama      = date("YmdHis")."-".str_slug(pathinfo($request->file('image')->getClientOriginalName(), PATHINFO_FILENAME), '-');
            $extension = $request->file('image')->getClientOriginalExtension();
            $fullname  = $nama . "." . $extension;
            $path      = "uploads/slideshow";

            $request->file('image')->move($path, $fullname);

            $gallery = new Gallery();

            $gallery->name = $nama;
            $gallery->path = $path ."/". $fullname;

            $gallery->save();

            Slideshow::create([
            		"gallery_id" => $gallery->id,
            		"title" => $request->title
            	]);

            return redirect()->back()->with('status', 'Add Slideshow Success');

        }else{
            return view('404');
        }
	}

	
}