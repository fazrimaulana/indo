<?php

namespace Modules\Confirmation\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;

use Modules\Confirmation\Models\Confirmation;
use Modules\Orders\Models\Order;
use File;

class ConfirmationController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index()
	{
		$method_permission = "can_see_confirmation";
		if(Auth::user()->hasRole('root') || Auth::user()->can($method_permission) ){

			$confirmations = Confirmation::orderBy('created_at', 'desc')->paginate(20);

			//return dd($confirmations);

			return view('Confirmation::index', [
					"confirmations" => $confirmations
				]);

        }else{
            return view('404');
        }
	}

	public function add()
	{
		$method_permission = "can_add_confirmation";
		if(Auth::user()->hasRole('root') || Auth::user()->can($method_permission) ){
			$banks = \DB::table('banks')->get();
			return view('Confirmation::add', [
					"banks" => $banks
				]);

        }else{
            return view('404');
        }
	}

	public function store(Request $request)
	{
		$method_permission = "can_add_confirmation";
		if(Auth::user()->hasRole('root') || Auth::user()->can($method_permission) ){

			// return dd($request->all());

			$this->validate($request, [
					"code" => "required",
					"confirmation_name" => "required",
					"bank_to" => "required",
					"bank_from" => "required",
					"account_bank_no" => "required",
					"account_name" => "required",
					"transfer_amount" => "required",
					"date_transfer" => "required"
				]);

			if ($request->image) {
				$nama      = date("YmdHis")."-".str_slug(pathinfo($request->file('image')->getClientOriginalName(), PATHINFO_FILENAME), '-');
            	$extension = $request->file('image')->getClientOriginalExtension();
            	$path      = "uploads/confirmation";
            	$fullname  = $nama . "." . $extension;
            	$request->file('image')->move($path, $fullname);
            	$transfer_img = $path.'/'.$fullname;

			}else{
				
				$transfer_img = null;

			}

			$order = Order::where('code', $request->code)->first();

			if ($order!=null) {

				Confirmation::create([
						"order_id" => $order->id,
						"confirmation_name" => $request->confirmation_name,
						"bank_to" => $request->bank_to,
						"bank_from" => $request->bank_from,
						"account_bank_no" => $request->account_bank_no,
						"account_name" => $request->account_name,
						"transfer_amount" => $request->transfer_amount,
						"transfer_img" => $transfer_img,
						"date_transfer" => $request->date_transfer,
						"read" => 0
					]);

				return redirect()->back()->with('status', 'Success');
			}else{
				return redirect()->back()->with('status_failed', 'Failed');
			}

        }else{
            return view('404');
        }
	}

	public function getData(Confirmation $confirmation)
	{
		$method_permission = "can_edit_confirmation";
		if(Auth::user()->hasRole('root') || Auth::user()->can($method_permission) ){
			$banks = \DB::table('banks')->get();
			return view('Confirmation::edit', [
					"confirmation" => $confirmation,
					"banks" => $banks
				]);
		}else{
			return view('404');
		}
	}

	public function update(Confirmation $confirmation, Request $request)
	{
		$method_permission = "can_edit_confirmation";
		if(Auth::user()->hasRole('root') || Auth::user()->can($method_permission) ){
			
			$this->validate($request, [
					"code" => "required",
					"confirmation_name" => "required",
					"bank_to" => "required",
					"bank_from" => "required",
					"account_bank_no" => "required",
					"account_name" => "required",
					"transfer_amount" => "required",
					"date_transfer" => "required"
				]);

			if ($request->image) {
				if ($confirmation->transfer_img!=null) {
					File::delete($confirmation->transfer_img);
				}
				$nama      = date("YmdHis")."-".str_slug(pathinfo($request->file('image')->getClientOriginalName(), PATHINFO_FILENAME), '-');
            	$extension = $request->file('image')->getClientOriginalExtension();
            	$path      = "uploads/confirmation";
            	$fullname  = $nama . "." . $extension;
            	$request->file('image')->move($path, $fullname);
            	$transfer_img = $path.'/'.$fullname;

			}else{
				
				$transfer_img = $confirmation->transfer_img;

			}

			$order = Order::where('code', $request->code)->first();

			if ($order!=null) {

				$confirmation->update([
						"order_id" => $order->id,
						"confirmation_name" => $request->confirmation_name,
						"bank_to" => $request->bank_to,
						"bank_from" => $request->bank_from,
						"account_bank_no" => $request->account_bank_no,
						"account_name" => $request->account_name,
						"transfer_amount" => $request->transfer_amount,
						"transfer_img" => $transfer_img,
						"date_transfer" => $request->date_transfer,
						"read" => 0
					]);

				return redirect()->back()->with('status', 'Success');
			}else{
				return redirect()->back()->with('status_failed', 'Failed');
			}

		}else{
			return view('404');
		}
	}

	public function delete(Request $request)
	{
		$method_permission = "can_delete_confirmation";
		if(Auth::user()->hasRole('root') || Auth::user()->can($method_permission) ){
			$confirmation = Confirmation::find($request->id);

			if ($confirmation->transfer_img!=null) {
				File::delete($confirmation->transfer_img);
			}

			$confirmation->delete();

			return redirect()->back()->with('status', 'Delete Success');

		}else{

		}
	}

	public function delete_check(Request $request)
	{
		$method_permission = "can_delete_confirmation";
		if(Auth::user()->hasRole('root') || Auth::user()->can($method_permission) ){
			
			if ($request->ajax()) {
				
				if($request->idconfirmation!=null)
				{	
					
					foreach ($request->idconfirmation as $id) {

						$confirmation = Confirmation::find($id);
						if ($confirmation->transfer_img!=null) {
							File::delete($confirmation->transfer_img);
						}
						$confirmation->delete();

					}

				}

				return null;

			}

        }else{
            return view('404');
        }
	}

	public function detail(Confirmation $confirmation)
	{
		$method_permission = "can_see_confirmation";
		if(Auth::user()->hasRole('root') || Auth::user()->can($method_permission) ){

			$confirmation->update([
					"read" => 1
				]);

			return view('Confirmation::detail', [
					"confirmation" => $confirmation
				]);

        }else{
            return view('404');
        }
	}

	public function konfirmasi(Order $order)
	{
		$method_permission = "can_edit_confirmation";
		if(Auth::user()->hasRole('root') || Auth::user()->can($method_permission) ){
			
			$order->update([
					"order_status" => "Konfirmasi Pembayaran"
				]);

			return redirect()->back();

		}else{
			return view('404');
		}
	}

	public function selesai(Order $order)
	{
		$method_permission = "can_edit_confirmation";
		if(Auth::user()->hasRole('root') || Auth::user()->can($method_permission) ){
			
			$order->update([
					"order_status" => "Selesai"
				]);

			return redirect()->back();

		}else{
			return view('404');
		}
	}

	public function search(Request $request)
	{
		$method_permission = "can_see_confirmation";
		if(Auth::user()->hasRole('root') || Auth::user()->can($method_permission) ){

			if ($request->filter == "date") {
				$confirmations = Confirmation::whereDate('date_transfer', $request->search)->orderBy('created_at', 'desc')->paginate(20);
			}else if($request->filter == "id"){

				$confirmations = Confirmation::whereHas('order', function($query) use($request){
					$query->where('code', $request->search);
				})->orderBy('created_at', 'desc')->paginate(20);

			}else{
				$confirmations = Confirmation::where('account_name', 'like', '%'.$request->search.'%')->orderBy('created_at', 'desc')->paginate(20);
			}
			
			return view('Confirmation::index', [
					"confirmations" => $confirmations
				]);
			

        }else{
            return view('404');
        }
	}

}