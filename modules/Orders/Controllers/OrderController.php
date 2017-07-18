<?php

namespace Modules\Orders\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Modules\Orders\Models\Order;
use Modules\Orders\Models\TransactionMethod;
use Modules\Orders\Models\OrderDetail;
use Auth;
use App\Helpers\RajaOngkir;

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
			
			$rajaOngkir = new RajaOngkir;

			$provinces = $rajaOngkir->provinsi();
			$cities = $rajaOngkir->getCity($order->buyer_province);

			// 153 -> Jakarta Selatan
			$costs = $rajaOngkir->getCost(153, $order->buyer_city, $order->weight, $order->courier);
			$transactionMethods = TransactionMethod::all();

			return view('Orders::order.edit', [

					"order" => $order,
					"provinces" => $provinces,
					"cities" => $cities,
					"costs" => $costs->rajaongkir->results[0]->costs,
					"transactionMethods" => $transactionMethods

				]);

        }else{
            return view('404');
        }
	}

	public function update(Request $request, Order $order)
	{
		//return dd($request->all());

		$this->validate($request, [
				"name" => "required",
				"email" => "required",
				"no_hp" => "required",
				"address" => "required",
				"province" => "required",
				"city" => "required",
				"courier" => "required",
				"service" => "required",
				"payment_method" => "required",
				"shipping_cost" => "required"
			]);

		$rajaOngkir = new RajaOngkir;
		$service = $rajaOngkir->getCost(153, $request->city, $order->weight, $request->courier);

		$order->transaction_method_id = $request->payment_method;
		$order->buyer_name = $request->name;
		$order->buyer_email = $request->email;
		$order->buyer_phone_number = $request->no_hp;
		$order->buyer_address = $request->address;
		$order->buyer_province = $request->province;
		$order->buyer_city = $request->city;
		$order->courier = $request->courier;
		$order->service = json_encode( $service->rajaongkir->results[0]->costs[$request->service] );;
		$order->shipping_cost = $request->shipping_cost;

		$order->save();

		return redirect()->back();


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