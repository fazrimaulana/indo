<?php

namespace Modules\Categories\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;

use Modules\Categories\Models\Category;
use Modules\Products\Models\Product;

use Validator;

class CategoryController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index()
	{
		$method_permission = "can_see_categories";
		if(Auth::user()->hasRole('root') || Auth::user()->can($method_permission) ){
			$categories = Category::paginate(10);
			$categoriesParent = Category::where('parent_id', 0)->get();
			
            return view('Categories::index', [
            		"categories" => $categories,
            		"categoriesParent" => $categoriesParent
            	]);

        }else{
            return view('404');
        }
	}

	public function store(Request $request)
	{
		$method_permission = "can_add_categories";
		if(Auth::user()->hasRole('root') || Auth::user()->can($method_permission) ){

			$this->validate($request, [
					"name" => "required"
				]);

			Category::create([
					"parent_id" => $request->parent,
					"name" => strtolower($request->name),
					"slug" => str_slug($request->name, '-'),
					"description" => $request->description,
					"icon" => $request->icon
				]);

			return redirect()->back();

        }else{
            return view('404');
        }
	}

	// public function getData(Category $category, Request $request)
	// {

	// 	$method_permission = "can_edit_categories";
	// 	if(Auth::user()->hasRole('root') || Auth::user()->can($method_permission) ){
			
	// 		if($request->ajax())
	// 		{

	// 			if ($category->parent_id==0) {
	// 				$parentCategory = Category::where('parent_id', 0)->where('id', '!=', 1)->where('id', '!=', $category->id)->get();
	// 			}
	// 			else
	// 			{
	// 				$parentCategory = Category::where('parent_id', 0)->where('id', '!=', 1)->get();	
	// 			}
	// 			return response()->json(["category" => $category, "parent" => $parentCategory]);
	// 		}
	// 		else
	// 		{
	// 			return view('404');
	// 		}

 //        }else{
 //            return view('404');
 //        }

	// }

	public function update(Request $request)
	{
		$method_permission = "can_edit_categories";
		if(Auth::user()->hasRole('root') || Auth::user()->can($method_permission) ){
			
			$this->validate($request, [
					"name" => "required"
				]);

			Category::find($request->id)->update([
					"parent_id" => $request->parent,
					"name" => strtolower($request->name),
					"slug" => str_slug($request->name, '-'),
					"description" => $request->description,
					"icon" => $request->icon
				]);

			return redirect()->back();

        }else{
            return view('404');
        }
	}

	public function delete(Request $request)
	{
		$method_permission = "can_delete_categories";
		if(Auth::user()->hasRole('root') || Auth::user()->can($method_permission) ){

			$category = Category::find($request->id);

			if ($category->parent_id == 0) {
				
				$childCategory = Category::where('parent_id', $category->id)->get();

				if ($childCategory) {
					
					foreach ($childCategory as $child) {
						
						Product::where('category_id', $child->id)->update([
							"category_id" => 1
						]);

						$child->delete();

					}

				}

			}

			Product::where('category_id', $category->id)->update([
					"category_id" => 1
				]);

			$category->delete();			

			return redirect()->back();

        }else{
            return view('404');
        }
	}

	public function delete_check(Request $request)
	{
		$method_permission = "can_delete_categories";
		if(Auth::user()->hasRole('root') || Auth::user()->can($method_permission) ){
			
			if ($request->ajax()) {
				
				if($request->idcategory!=null)
				{	
					
					
					foreach ($request->idcategory as $idcategory) {
						
						$category = Category::find($idcategory);

						if ($category->parent_id == 0) {
					
							$childCategory = Category::where('parent_id', $category->id)->get();

							if ($childCategory) {
					
								foreach ($childCategory as $child) {
							
									Product::where('category_id', $child->id)->update([
										"category_id" => 1
									]);

									$child->delete();

								}

							}

						}

						Product::where('category_id', $idcategory)->update([
							"category_id" => 1
						]);

						$category->delete();	

					}

				}

				return null;

			}

        }else{
            return view('404');
        }
	}

	public function detail(Category $category)
	{
		$method_permission = "can_see_categories";
		if(Auth::user()->hasRole('root') || Auth::user()->can($method_permission) ){

			return view('Categories::detail', [
					"category" => $category
				]);

        }else{
            return view('404');
        }
	}

}