<?php

namespace Modules\Orders\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Modules\Orders\Models\TransactionMethod;

use Auth;

class TransactionMethodController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index()
	{
		$method_permission = "can_see_transaction_method";
		if(Auth::user()->hasRole('root') || Auth::user()->can($method_permission) ){

			$transactionMethods = TransactionMethod::all();
            return view('Orders::transaction-method.index', [

            		"transactionMethods" => $transactionMethods

            	]);

        }else{
            return view('404');
        }
	}

	public function store(Request $request)
	{
		$method_permission = "can_add_transaction_method";
		if(Auth::user()->hasRole('root') || Auth::user()->can($method_permission) ){

			$this->validate($request, [
					"name" => "required"
				]);

			TransactionMethod::create([
					"name" => $request->name,
					"description" => $request->description
				]);

            return redirect()->back()->with('status', 'Add Transaction Method Success');

        }else{
            return view('404');
        }
	}

	public function getData(TransactionMethod $transactionMethod, Request $request)
	{
		$method_permission = "can_edit_transaction_method";
		if(Auth::user()->hasRole('root') || Auth::user()->can($method_permission) ){

			if ($request->ajax()) {
				
				return response()->json($transactionMethod);

			}
			else{
				return view('404');
			}

        }else{
            return view('404');
        }
	}

	public function update(Request $request)
	{
		$method_permission = "can_edit_transaction_method";
		if(Auth::user()->hasRole('root') || Auth::user()->can($method_permission) ){

			$this->validate($request, [
					"name" => "required"
				]);

			TransactionMethod::find($request->id)->update([
					"name" => $request->name,
					"description" => $request->description
				]);

            return redirect()->back()->with('status', 'Update Transaction Method Success');

        }else{
            return view('404');
        }
	}

	public function delete(Request $request)
	{
		$method_permission = "can_delete_transaction_method";
		if(Auth::user()->hasRole('root') || Auth::user()->can($method_permission) ){

			TransactionMethod::find($request->id)->delete();

            return redirect()->back()->with('status', 'Delete Transaction Method Success');

        }else{
            return view('404');
        }
	}

}