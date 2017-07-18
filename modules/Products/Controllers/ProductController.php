<?php

namespace Modules\Products\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use Modules\Products\Models\Product;
use Modules\Categories\Models\Category;
use Modules\Products\Models\Gallery;
use File;
use Modules\Products\Models\ProductGallery;

class ProductController extends Controller
{
	
	function __construct()
	{
		$this->middleware('auth');
	}

	public function index()
	{
		$method_permission = "can_see_products";
		if(Auth::user()->hasRole('root') || Auth::user()->can($method_permission) ){
			
			$products = Product::where('parent_id', 0)->paginate(20);
			return view('Products::index', [
					"products" => $products
				]);

        }else{
            return view('404');
        }
	}

	public function add()
	{
		$method_permission = "can_add_products";
		if(Auth::user()->hasRole('root') || Auth::user()->can($method_permission) ){
			
			$categories = Category::all();
			$productParent = Product::where('parent_id', 0)->get();
			return view('Products::add', [
					"categories" => $categories,
					"productParent" => $productParent
				]);

        }else{
            return view('404');
        }
	}

	public function store(Request $request)
	{
		$method_permission = "can_add_products";
		if(Auth::user()->hasRole('root') || Auth::user()->can($method_permission) ){

			if ($request->discount=="" || $request->discount=="0") {

				$this->validate($request, [

					"name"   => "required",
					"condition" => "required",
					"weight" => "required|integer",
					"stok"   => "required|integer",
					"price"  => "required|integer"

				]);

				$discount 	         = 0;
				$start_time_discount = null;
				$end_time_discount 	 = null;
			}else{

				$this->validate($request, [

					"name"   => "required",
					"condition" => "required",
					"weight" => "required|integer",
					"stok"   => "required|integer",
					"price"  => "required|integer",
					"start_time_discount"   => "required|date",
					"end_time_discount" => "required|date|after:start_time_discount"

				]);

				$discount            = $request->discount;
				$start_time_discount = $request->start_time_discount;
				$end_time_discount 	 = $request->end_time_discount;
			}

			if ($request->custom) {
				$custom = explode(" ", $request->custom);
				$datasCustom = json_encode( array("prefix" => $custom) );	
			}
			else
			{
				$datasCustom = null;
			}

			$product = new Product;
			$product->category_id = $request->category;
			$product->parent_id = $request->parent_id;
			$product->name = $request->name;
			$product->condition = $request->condition;
			$product->weight = $request->weight;
			$product->min_order = "1";
			$product->max_order = $request->stok;
			$product->price = $request->price;
			$product->description = $request->description;
			$product->stok = $request->stok;
			$product->view = 0;
			$product->discount = $discount;
			$product->start_time_discount = $start_time_discount;
			$product->end_time_discount = $end_time_discount;
			$product->custom = $datasCustom;

			$product->save();

			if ($request->gallery) {
                $product->gallery()->attach($request->gallery);   
            }   

            if($request->set_utama!="0")
            {
                ProductGallery::where('product_id', $product->id)->where('gallery_id', $request->set_utama)->update([
                    "set_utama" => "1"
                ]);
            }

			return redirect('/dashboard/products')->with('status', 'Add Product Success');

        }else{
            return view('404');
        }
	}

	public function storeGalleries(Request $request)
	{
		$method_permission = "can_add_products_gallery";
		if(Auth::user()->hasRole('root') || Auth::user()->can($method_permission) ){
			
			$this->validate($request,[
                "file" => "image"
            ]);

            $nama      = date("YmdHis")."-".str_slug(pathinfo($request->file('file')->getClientOriginalName(), PATHINFO_FILENAME), '-');
            $extension = $request->file('file')->getClientOriginalExtension();
            $fullname  = $nama . "." . $extension;
            $path      = "uploads/products";

            $request->file('file')->move($path, $fullname);

            $gallery = new Gallery();

            $gallery->name = $nama;
            $gallery->path = $path ."/". $fullname;

            $gallery->save();

            return response()->json($gallery->id);

        }else{
            return view('404');
        }
	}

	public function deleteGalleries(Request $request)
	{
		$method_permission = "can_delete_product_gallery";
		if(Auth::user()->hasRole('root') || Auth::user()->can($method_permission) ){
			
			if ($request->ajax()) {

				$gallery = Gallery::find($request->id);

            	File::delete($gallery->path);

            	$gallery->delete();

            	return response()->json($request->id);	
			}

        }else{
            return view('404');
        }
	}

	public function setUtamaGalleries(Request $request)
	{
		if($request->ajax()){
            return response()->json($request->id);
        }
        else{
            return abort('404');
        }
	}

	public function getData(Request $request, Product $product)
	{
		$method_permission = "can_edit_product";
		if(Auth::user()->hasRole('root') || Auth::user()->can($method_permission) ){
			
			$categories = Category::all();
			$productParent = Product::where('parent_id', 0)->where('id', '!=', $product->id)->get();

			return view('Products::edit', [
					"product" => $product,
					"categories" => $categories,
					"productParent" => $productParent
				]);

        }else{
            return view('404');
        }
	}

	public function update(Request $request, Product $product)
	{	
		$method_permission = "can_edit_products";
		if(Auth::user()->hasRole('root') || Auth::user()->can($method_permission) ){

			if ($request->discount=="" || $request->discount=="0") {

				$this->validate($request, [

					"name"   => "required",
					"weight" => "required|integer",
					"stok"   => "required|integer",
					"price"  => "required|integer"


				]);

				$discount 	         = 0;
				$start_time_discount = null;
				$end_time_discount 	 = null;
			}else{

				$this->validate($request, [

					"name"   => "required",
					"weight" => "required|integer",
					"stok"   => "required|integer",
					"price"  => "required|integer",
					"start_time_discount"   => "required|date",
					"end_time_discount" => "required|date|after:start_time_discount"


				]);

				$discount            = $request->discount;
				$start_time_discount = $request->start_time_discount;
				$end_time_discount 	 = $request->end_time_discount;
			}

			if ($request->custom) {
				$custom = explode(" ", $request->custom);
				$datasCustom = json_encode( array("prefix" => $custom) );	
			}
			else
			{
				$datasCustom = null;
			}

			$product->update([

					"category_id" => $request->category,
					"parent_id" => $request->parent_id,
					"name" => $request->name,
					"condition" => $request->condition,
					"weight" => $request->weight,
					"min_order" => $product->min_order,
					"max_order" => $request->stok,
					"price" => $request->price,
					"description" => $request->description,
					"stok" => $request->stok,
					"view" => $product->view,
					"discount" => $discount,
					"start_time_discount" => $start_time_discount,
					"end_time_discount" => $end_time_discount,
					"custom" => $datasCustom

				]);

			if ($request->gallery) {
                $product->gallery()->attach($request->gallery);   
            }   

            if($request->set_utama!="0")
            {
                ProductGallery::where('product_id', $product->id)->update([
                		"set_utama" => 0
                	]);
                ProductGallery::where('product_id', $product->id)->where('gallery_id', $request->set_utama)->update([
                    "set_utama" => "1"
                ]);
            }

			return redirect('/dashboard/products')->with('status', 'Update Product Success');

        }else{
            return view('404');
        }
	}

	public function productGallerySetUtama(Request $request)
	{
		$method_permission = "can_edit_products";
		if(Auth::user()->hasRole('root') || Auth::user()->can($method_permission) ){

            
            ProductGallery::where('product_id', $request->id_product)->where('set_utama', 1)->update([
             		"set_utama" => 0
                ]);

            ProductGallery::where('product_id', $request->id_product)->where('gallery_id', $request->id_gallery)->update([
                	"set_utama" => "1"
                ]);
            

			return redirect()->back();

        }else{
            return view('404');
        }
	}

	public function productGalleryDelete(Request $request)
	{
		$method_permission = "can_delete_product_gallery";
		if(Auth::user()->hasRole('root') || Auth::user()->can($method_permission) ){
			
			ProductGallery::where('product_id', $request->id_product)->where('gallery_id', $request->id_gallery)->delete();

			$gallery = Gallery::find($request->id_gallery);

            File::delete($gallery->path);

            $gallery->delete();

            return redirect()->back();
			

        }else{
            return view('404');
        }
	}

	public function delete(Request $request)
	{
		$method_permission = "can_delete_products";
		if(Auth::user()->hasRole('root') || Auth::user()->can($method_permission) ){
			
			$product = Product::find($request->id);

			if ($product->parent_id==0) {
				
				$childProduct = Product::where('parent_id', $product->id)->get();

				foreach ($childProduct as $child) {
					
					foreach ($child->gallery as $gallery) {
						
						File::delete($gallery->path);

						$gallery->delete();

					}

					$child->delete();

				}

			}

			foreach ($product->gallery as $gallery) {
				
				File::delete($gallery->path);

				$gallery->delete();

			}

			$product->delete();

            return redirect()->back()->with('status', 'Delete Product Success');
			

        }else{
            return view('404');
        }
	}

	public function deleteChecked(Request $request)
	{
		$method_permission = "can_delete_products";
		if(Auth::user()->hasRole('root') || Auth::user()->can($method_permission) ){
			
			if ($request->ajax())
			{
				if ($request->idproduct!=null) 
				{
					foreach ($request->idproduct as $idproduct) {
						
						$product = Product::find($idproduct);

						if ($product->parent_id==0) {
							
							$childProduct = Product::where('parent_id', $product->id)->get();

							foreach ($childProduct as $child) {
								
								foreach ($child->gallery as $gallery) {
						
									File::delete($gallery->path);

									$gallery->delete();

								}

								$child->delete();

							}

						}

						foreach ($product->gallery as $gallery) {
					
							File::delete($gallery->path);

							$gallery->delete();

						}

						$product->delete();

					}
				}	

				return null;
				
			}		

        }else{
            return view('404');
        }
	}

	public function detail(Product $product)
	{
		$method_permission = "can_see_products";
		if(Auth::user()->hasRole('root') || Auth::user()->can($method_permission) ){
			
			$variants = Product::where('parent_id', $product->id)->paginate(10);
			$categories = Category::all();
			$productParent = Product::where('parent_id', 0)->where('id', '!=', $product->id)->get();

			return view('Products::detail', [
					"product" => $product,
					"variants" => $variants,
					"categories" => $categories,
					"productParent" => $productParent
				]);

        }else{
            return view('404');
        }
	}

	public function search(Request $request)
	{
		$method_permission = "can_see_products";
		if(Auth::user()->hasRole('root') || Auth::user()->can($method_permission) ){
			
			if ($request->filter == "date") {
				$products = Product::where('parent_id', 0)->whereDate('created_at', $request->search)->paginate(20);
			}else if($request->filter == "id"){
				$products = Product::where('parent_id', 0)->where('id', $request->search)->paginate(20);
			}else{
				$products = Product::where('parent_id', 0)->where('name', 'like', '%'.$request->search.'%')->paginate(20);
			}
			
			return view('Products::index', [
					"products" => $products
				]);

        }else{
            return view('404');
        }
	}

}