<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Modules\Categories\Models\Category;
use Modules\Products\Models\Product;
use Modules\Orders\Models\TransactionMethod;
use Modules\Orders\Models\Order;
use Modules\Orders\Models\OrderDetail;
use DB;
use Auth;
use App\Confirmation;
use Cart;
use App\Helpers\RajaOngkir;

class FrontendController extends Controller
{
    //
    // public function __construct()
    // {

    // }

	public function index()
	{
		
		$categoryVoucher = Category::where('name', 'e-voucher')->first();

		if ($categoryVoucher!=null) {
			
			$newProducts = Product::orderBy('id', 'desc')->whereHas('category', function($query) use($categoryVoucher){
				$query->where('parent_id', '!=', '2');
			})->paginate(8);

			$saleProducts = Product::where('discount', '!=', 0)->whereDate('end_time_discount', '>=', date('Y-m-d H:i:s'))->whereDate('start_time_discount', '<=', date('Y-m-d H:i:s'))->whereHas('category', function($query) use($categoryVoucher){
				$query->where('parent_id', '!=', '2');
			})->get();

			$popularProducts = Product::orderBy('view', 'desc')->whereHas('category', function($query) use($categoryVoucher){
				$query->where('parent_id', '!=', '2');
			})->paginate(8);

		}else {

			$newProducts = Product::orderBy('id', 'desc')->paginate(8);

			$saleProducts = Product::where('discount', '!=', 0)->whereDate('end_time_discount', '>=', date('Y-m-d H:i:s'))->get();

			$popularProducts = Product::orderBy('view', 'desc')->paginate(8);

		}

		$product = Product::where('name', 'PLN')->first();

		if ($product) {
			$pln = Product::where('parent_id', $product->id)->get();	
		}else{
			$pln = null;
		}

		return view('frontend.welcome', [
				"newProducts" => $newProducts,
				"saleProducts" => $saleProducts,
				"popularProducts" => $popularProducts,
				"pln" => $pln
			]);
	}

	public function about()
	{
		return view('frontend.about');
	}

	public function contact()
	{
		return view('frontend.contact');
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

	public function checkProviderPaketData(Request $request)
	{
		if ($request->ajax()) {

			$products = Product::whereHas('category', function($query){
				$query->where('name', 'paket data');
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

	public function getProviderPaketData(Request $request)
	{
		if ($request->ajax()) {
			
			$product = Product::where('parent_id', $request->id)->get();

			return response()->json($product);

		}
	}

	public function getCategory(Request $request)
	{
		$category = Category::where('slug', $request->category)->first();

		$rajaOngkir = new RajaOngkir();
		$provinsi = $rajaOngkir->provinsi();
		$city = $rajaOngkir->city();
		
		return view('frontend.category', [
				"category" => $category,
				"provinsi" => $provinsi,
				"city"     => $city
			]);

	}

	public function checkoutPulsa(Request $request)
	{

		$this->validate($request, [
				"no_hp" => "required|size:12",
				"product" => "required"
			]);

		$product = Product::find($request->product);
		$transactionMethods = TransactionMethod::all();

		return view('frontend.checkout', [
				"no" => $request->no_hp,
				"product" => $product,
				"transactionMethods" => $transactionMethods
			]);
	}

	public function bayarEVoucher(Request $request)
	{

		$this->validate($request, [
				"name" => "required",
				"email" => "required|email",
				"no_hp" => "required|size:12",
				"metode_pembayaran" => "required"
			]);

		$product = Product::find($request->product);
		$discount = 0;

		if ($product->end_time_discount>=date('Y-m-d H:i:s') && $product->start_time_discount<=date('Y-m-d H:i:s')) {
			$total = $product->price - ( ($product->price*$product->discount) / 100 );
			$discount = $product->discount;
		}else{
			$total = $product->price;
			$discount = 0;
		}

		$order = new Order;
		$order->code = date('His').$request->product.date('Ymd');
		$order->transaction_method_id = $request->metode_pembayaran;
		$order->buyer_name = $request->name;
		$order->buyer_email = $request->email;
		$order->buyer_phone_number = $request->no_hp;
		$order->buyer_address = "null";
		$order->order_status = "Menunggu Pembayaran";
		$order->total = $total + $request->adm;

		$order->save();

		OrderDetail::create([
				"product_id" => $request->product,
				"order_id" => $order->id,
				"product_name" => $product->name,
				"qty" => 1,
				"product_price" => $product->price,
				"discount_price" => $discount,
				"adm_price" => $request->adm,
				"subtotal" => $order->total,
				"status" => "Diproses"
			]);

		return redirect('/');

	}

	public function checkoutPaket(Request $request)
	{
		$this->validate($request, [
				"no_hp" => "required|size:12",
				"product" => "required"
			]);

		$product = Product::find($request->product);
		$transactionMethods = TransactionMethod::all(); 
		return view('frontend.checkout', [
				"no" => $request->no_hp,
				"product" => $product,
				"transactionMethods" => $transactionMethods
			]);

	}

	public function checkoutPLN(Request $request)
	{
		$this->validate($request, [
				"idPLN" => "required|size:12",
				"product" => "required"
			]);

		$product = Product::find($request->product);
		$transactionMethods = TransactionMethod::all(); 
		return view('frontend.checkout', [
				"no" => $request->idPLN,
				"product" => $product,
				"transactionMethods" => $transactionMethods
			]);

	}

	public function confirmation()
	{
		$banks = DB::table('banks')->get();
		return view('frontend.confirmation', [
				"banks" => $banks
			]);
	}

	public function confirmationStore(Request $request)
	{
		//return dd($request->all());

		$this->validate($request, [
				"kode_order" => "required",
				"nama_konfirmasi" => "required",
				"bank_to" => "required",
				"bank_from" => "required",
				"tf_dari_norek" => "required",
				"name" => "required",
				"jml_transfer" => "required",
				// "image" => "required",
				"tgl_transfer" => "required"
			], [
				"required" => "Tidak boleh kosong"
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

		$order = Order::where('code', $request->kode_order)->first();

		if ($order!=null) {

			// $confirmation = DB::table('confirmations')->where('order_id', $order->id)->first();

			// if ($confirmation==null) {
				
				Confirmation::create([
					"order_id" => $order->id,
					"confirmation_name" => $request->nama_konfirmasi,
					"bank_to" => $request->bank_to,
					"bank_from" => $request->bank_from,
					"account_bank_no" => $request->tf_dari_norek,
					"account_name" => $request->name,
					"transfer_amount" => $request->jml_transfer,
					"transfer_img" => $transfer_img,
					"date_transfer" => $request->tgl_transfer
				]);

				return redirect()->back()->with('status', 'Konfirmasi terkirim');

			// }else{
			// 	return redirect()->back()->with('status', 'Konfirmasi sudah dilakukan, silahkan tunggu');
			// }

		}else
		{
			return redirect()->back()->with('status_failed', 'Kode Order tidak ditemukan, silahkan cek lagi kode order anda');
		}

	}

	public function myAccount()
	{
		
		$method_permission = "can_see_users";
		if(Auth::user()){
			return view('frontend.my-account');
        }else{
            return view('404');
        }

	}

	public function addCart(Request $request, Product $product)
	{
		if ($product->gallery->count() != 0) {
			if ($product->getGalleryUtama->count()!=0) {
				foreach ($product->getGalleryUtama as $galleryUtama) {
					$image = $galleryUtama->path;
				}
			}else{
				$image = $product->gallery->first()->path;
			}
		}else{
			$image = "frontend/images/empty.jpg";
		}

		if ($product->discount!=0 && $product->start_time_discount<=date('Y-m-d H:i:s') && $product->end_time_discount>=date('Y-m-d H:i:s')) {			
			$price = $product->price - ( ($product->price*$product->discount)/100 );
		}else{
			$price = $product->price;
		}

		if ($request->quant) {
			$quant = $request->quant;
		}else{
			$quant = 1;
		}

		Cart::add(array(
    		'id' => $product->id,
    		'name' => $product->name,
    		'price' => $price,
    		'quantity' => $quant,
    		'attributes' => array(
    				"image" => $image
    			)
		));


		return redirect()->back();

	}

	public function removeCart(Request $request)
	{
		Cart::remove($request->id);

		return redirect()->back();
	}

	public function carts()
	{
		$carts = Cart::getContent();
		return view('frontend.cart', [
				"carts" => $carts
			]);
	}

	public function getCartCheck(Request $request)
	{
		if ($request->ajax()) {
			$cart = Cart::get($request->id);
			return response()->json($cart);
		}else{
			return view('404');
		}
	}

	public function getCartUncheck(Request $request)
	{
		if ($request->ajax()) {
			$cart = Cart::get($request->id);
			return response()->json($cart);
		}else{
			return view('404');
		}
	}

	public function getCartPayment(Request $request)
	{

		// return dd($request->check_action);

		if ($request->check_action!=null) {

			foreach ($request->check_action as $check) {

				$cart = Cart::get($check);

				Cart::update($check, array(
						'quantity' => $request->quant[$check] - $cart->quantity
					));

				$carts[] = $cart;

			}

			// return dd($carts);

		}else{
			
			$carts = Cart::getContent();
			
		}

		$transactionMethods = TransactionMethod::all();
		$rajaOngkir = new RajaOngkir();
		$provinsi = $rajaOngkir->provinsi();
		$city = $rajaOngkir->city();

		return view('frontend.checkout-cart-product', [
					"carts" => $carts,
					"transactionMethods" => $transactionMethods,
					"provinsi" => $provinsi,
					"city" => $city
				]);

	}

	public function getCartOrder(Request $request)
	{
		$rajaOngkir = new RajaOngkir;
		$service = $rajaOngkir->getCost(153, $request->kota, $request->weight, $request->kurir);

		// return dd(json_encode( $service->rajaongkir->results[0]->costs[$request->paket] ));

		$products = Product::whereIn('id', $request->idProduct)->get();

		$total = 0;
		$productId = "";

		foreach ($products as $key => $product) {

			if ($product->end_time_discount>=date('Y-m-d H:i:s') && $product->start_time_discount<=date('Y-m-d H:i:s')) {
				$total += ( $product->price - ( ($product->price*$product->discount) / 100 ) ) * $request->quantity[$key];
			}else{
				$total += $product->price * $request->quantity[$key];
			}
			$productId += $product->id;

		}

			$order = new Order;
			$order->code = date('His').$productId.date('Ymd');
			$order->transaction_method_id = $request->metode_pembayaran;
			$order->buyer_name = $request->name;
			$order->buyer_email = $request->email;
			$order->buyer_phone_number = $request->no_hp;
			$order->buyer_address = $request->alamat;
			$order->buyer_province = $request->provinsi;
			$order->buyer_city = $request->kota;
			$order->weight = $request->weight;
			$order->courier = $request->kurir;
			$order->service = json_encode( $service->rajaongkir->results[0]->costs[$request->paket] );
			$order->shipping_cost = $request->ongkos;
			$order->order_status = "Menunggu Pembayaran";
			$order->total = $total + $request->ongkos;

			$order->save();

			$discount = 0;

		foreach ($products as $key => $product) {

			if ($product->end_time_discount>=date('Y-m-d H:i:s') && $product->start_time_discount<=date('Y-m-d H:i:s')) {
				$subTotal = ( $product->price - ( ($product->price*$product->discount) / 100 ) ) * $request->quantity[$key];

				$discount = $product->discount;

			}else{
				$subTotal = $product->price * $request->quantity[$key];

				$discount = 0;

			}

			OrderDetail::create([
					"product_id" => $product->id,
					"order_id" => $order->id,
					"product_name" => $product->name,
					"qty" => $request->quantity[$key],
					"product_price" => $product->price,
					"discount_price" => $discount,
					"subtotal" => $subTotal,
					"status" => "Diproses"
				]);

			Cart::remove($product->id);

		}

		return redirect('/');

	}

	public function deleteCartChecked(Request $request)
	{
		if($request->ajax()){
			
			if($request->idCart!=null){
				foreach ($request->idCart as $cart) {
					Cart::remove($cart);
				}
			}

			return null;

		}else{
			return view('404');
		}
	}

	public function getProduct(Product $product)
	{
		return view('frontend.single-product', [
				"product" => $product
			]);
	}

	public function getCity(Request $request){
		if ($request->ajax()) {
			$rajaOngkir = new RajaOngkir;
			$city = $rajaOngkir->getCity($request->id);

			return response()->json($city);

		}else{
			return view('404');
		}
	}

	public function getPaket(Request $request){

		if ($request->ajax()) {
			
			$rajaOngkir = new RajaOngkir;
			$cost = $rajaOngkir->getCost($request->origin, $request->destination, $request->weight, $request->courier);

			return response()->json($cost);


		}else{
			return view('404');
		}

	}

	public function getCost(Request $request){

		if ($request->ajax()) {
			
			$rajaOngkir = new RajaOngkir;
			$cost = $rajaOngkir->getCost($request->origin, $request->destination, $request->weight, $request->courier);

			return response()->json($cost);

		}else{
			return view('404');
		}

	}

	public function getPaymentProduct(Request $request, Product $product){
		
		//return dd($request->all());
		
		$transactionMethods = TransactionMethod::all();
		$rajaOngkir = new RajaOngkir();
		$provinsi = $rajaOngkir->provinsi();
		$city = $rajaOngkir->city();			

		return view('frontend.checkout-product', [
				"product" => $product,
				"quantity" => $request->quant,
				"transactionMethods" => $transactionMethods,
				"provinsi" => $provinsi,
				"city" => $city
			]);

	}

	public function getProductOrder(Request $request){

		// return dd($request->all());

		$product = Product::find($request->idProduct);

		$rajaOngkir = new RajaOngkir;
		$service = $rajaOngkir->getCost(153, $request->kota, $product->weight, $request->kurir);

		// return dd(json_encode( $service->rajaongkir->results[0]->costs[$request->paket] ));

		$total = 0;		

		if ($product->end_time_discount>=date('Y-m-d H:i:s') && $product->start_time_discount<=date('Y-m-d H:i:s')) {
			$total = ( $product->price - ( ($product->price*$product->discount) / 100 ) ) * $request->quantity;
		}else{
			$total = $product->price * $request->quantity;
		}
		

		$order = new Order;
		$order->code = date('His').$product->id.date('Ymd');
		$order->transaction_method_id = $request->metode_pembayaran;
		$order->buyer_name = $request->name;
		$order->buyer_email = $request->email;
		$order->buyer_phone_number = $request->no_hp;
		$order->buyer_address = $request->alamat;
		$order->buyer_province = $request->provinsi;
		$order->buyer_city = $request->kota;
		$order->weight = $request->weight;
		$order->courier = $request->kurir;
		$order->service = json_encode( $service->rajaongkir->results[0]->costs[$request->paket] );
		$order->shipping_cost = $request->ongkos;
		$order->order_status = "Menunggu Pembayaran";
		$order->total = $total + $request->ongkos;

		$order->save();		

		$discount = 0;

		if ($product->end_time_discount>=date('Y-m-d H:i:s') && $product->start_time_discount<=date('Y-m-d H:i:s')) {
			$subTotal = ( $product->price - ( ($product->price*$product->discount) / 100 ) ) * $request->quantity;

			$discount = $product->discount;

		}else{
			$subTotal = $product->price * $request->quantity;

			$discount = 0;
		}

		OrderDetail::create([
				"product_id" => $product->id,
				"order_id" => $order->id,
				"product_name" => $product->name,
				"qty" => $request->quantity,
				"product_price" => $product->price,
				"discount_price" => $discount,
				"subtotal" => $subTotal,
				"status" => "Diproses"
			]);			

		return redirect('/');

	} 

	public function getTransaksi(Request $request)
	{	
		if (Auth::user()) {
			if (Auth::user()->email == $request->email) {
				
				if ($request->search) {
					
					$orders = Order::where('code', $request->search)->orWhere('buyer_name', $request->search)->orWhere('buyer_phone_number', $request->search)->orderBy('id', 'desc')->get();

				}else{

					$orders = Order::where('buyer_email', $request->email)->orderBy('id', 'desc')->get();

				}

				return view('frontend.list-transaction', [
						"orders" => $orders
					]);

			}else{
				return view('404');
			}
		}
		else{
			return view('404');
		}
	}

	public function detailTransaksi(Request $request, Order $order)
	{
		if (Auth::user() && $order->buyer_email==Auth::user()->email) {
			// return dd($order);
			return view('frontend.detail-transaction', [
					"order" => $order
				]);
		}else{
			return view('404');
		}
	}

}
