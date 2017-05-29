<?php

namespace Modules\Orders\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Modules\Orders\Models\Order;
use Modules\Orders\Models\TransactionMethod;
use Modules\Orders\Models\OrderDetail;
use Auth;

class OrderController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index()
	{
		$method_permission = "can_see_orders";
		if(Auth::user()->hasRole('root') || Auth::user()->can($method_permission) ){

			$orders = Order::orderBy('id', 'desc')->paginate(20);
			return view('Orders::order.index', [
					"orders" => $orders
				]);

        }else{
            return view('404');
        }
	}

	public function add()
	{
		$method_permission = "can_add_orders";
		if(Auth::user()->hasRole('root') || Auth::user()->can($method_permission) ){

			$transactionMethods = TransactionMethod::all();
			
			return view('Orders::order.add', [

					"transactionMethods" => $transactionMethods

				]);

        }else{
            return view('404');
        }
	}

	public function getData(Order $order)
	{
		$method_permission = "can_edit_orders";
		if(Auth::user()->hasRole('root') || Auth::user()->can($method_permission) ){
			
			return view('Orders::order.edit', [

					"order" => $order

				]);

        }else{
            return view('404');
        }
	}

	public function search(Request $request)
	{
		$method_permission = "can_see_orders";
		if(Auth::user()->hasRole('root') || Auth::user()->can($method_permission) ){

			if ($request->filter == "date") {
				$orders = Order::whereDate('created_at', $request->search)->orderBy('id', 'desc')->paginate(20);
			}else if($request->filter == "id"){
				$orders = Order::where('id', $request->search)->orderBy('id', 'desc')->paginate(20);
			}else{
				$orders = Order::where('buyer_name', 'like', '%'.$request->search.'%')->orderBy('id', 'desc')->paginate(20);
			}

			return view('Orders::order.index', [
					"orders" => $orders
				]);

        }else{
            return view('404');
        }
	}

	public function detail(Order $order)
	{
		$method_permission = "can_see_orders";
		if(Auth::user()->hasRole('root') || Auth::user()->can($method_permission) ){

			return view('Orders::order.detail', [
					"order" => $order
				]);

        }else{
            return view('404');
        }
	}

	public function delete(Request $request)
	{
		$method_permission = "can_delete_orders";
		if(Auth::user()->hasRole('root') || Auth::user()->can($method_permission) ){

			OrderDetail::where('order_id', $request->id)->delete();

			Order::find($request->id)->delete();

			return redirect()->back()->with('status', 'Delete Success');

        }else{
            return view('404');
        }
	}

	public function deleteCheck(Request $request)
	{
		$method_permission = "can_delete_orders";
		if(Auth::user()->hasRole('root') || Auth::user()->can($method_permission) ){

			if ($request->ajax()) {
				
				if ($request->idOrder!=null) {
					
					foreach ($request->idOrder as $idOrder) {
						
						OrderDetail::where('order_id', $idOrder)->delete();

						Order::find($idOrder)->delete();

					}
					return null;
				}

			}else{
				return view('404');
			}

        }else{
            return view('404');
        }
	}

}