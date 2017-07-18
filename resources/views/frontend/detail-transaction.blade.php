@extends('layouts.frontend.app')

@section('css')
	



@endsection

@section('content')

  <div class="single-history">
        <div class="wr-single-history container">
           <div class="row">
               <div class="left col-md-8 col-sm-8">
                   <div class="panel panel-default pembelian">
                        <div class="panel-heading">
                            <h3 class="panel-title capslock">detail orderan</h3>
                        </div><!--END OF .PANEL-HEADING-->
                        <div class="panel-body">
                          @foreach($order->orderDetail as $orderDetail)
                            <div class="list-detail">
                                <div class="row">
                                    <div class="image col-md-2 col-sm-2">

                                      @if( $orderDetail->product->gallery->count() !=0 )

                                        @if( $orderDetail->product->getGalleryUtama->count() != 0 )
                                          @foreach($orderDetail->product->getGalleryUtama as $galleryUtama)
                                              <img src="{{ url($galleryUtama->path) }}" class="img-responsive">
                                          @endforeach
                                        @else
                                            <img src="{{ url($orderDetail->product->gallery->first()->path) }}" class="img-responsive">
                                        @endif

                                      @else

                                          <img src="{{ url('/frontend/images/empty.jpg') }}" class="img-responsive">

                                      @endif

                                    </div>
                                    <div class="nama-brg col-md-10 col-sm-10">
                                        <div class="nama pull-left">
                                            <a href="#">
                                                <p class="capital">{{ $orderDetail->product_name }}</p>
                                            </a>
                                            <span class="capital">quantity : {{ $orderDetail->qty }}</span>
                                        </div>
                                        <div class="harga pull-right">
                                            <p class="capital">Rp. {{ App\Helpers\Money::setRupiah($orderDetail->subtotal) }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div><!--END OF .LIST-DETAIL-->
                            <div class="list-detail">
                                <span class="capslock">status orderan</span>
                                <p class="capital">{{ $orderDetail->status }}</p>
                            </div><!--END OF .LIST-DETAIL-->
                            <div class="list-detail">
                                <div class="row">
                                    <div class="col-md-4 col-sm-4 col-xs-4">
                                        <span class="capslock">no.transaksi</span>
                                        <p class="capital">{{ $orderDetail->id }}</p>
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-4">
                                        <span class="capslock">jasa pengiriman</span>
                                        <p class="capital">{{ $order->courier }}</p>
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-4">
                                        <span class="capslock">no.resi</span>
                                        <p class="capital">BGD13423452</p>
                                    </div>
                                </div>
                            </div><!--END OF .LIST-DETAIL-->
                            <div class="list-detail">
                                <span class="capslock">keterangan</span>
                                <!-- <p class="capital">barang sudah diterima hari rabu, 12 juli 2017 pukul 16.00 WIB</p> -->
                            </div><!--END OF .LIST-DETAIL-->

                            <form id="addProduct-form-{{ $orderDetail->id }}" method="get" action="{{ url('/payment/product/'.$orderDetail->product_id) }}">
                              <input type="hidden" name="idProduct" value="{{ $orderDetail->product_id }}">
                              <input type="hidden" name="quant" class="form-control input-number" value="1" min="1" max="10">
                            </form>

                            <div class="list-detail">
                                <a onclick="event.preventDefault();document.getElementById('addProduct-form-{{ $orderDetail->id }}').submit();"> 
                                  <button class="btn capslock pull-right">
                                    beli lagi
                                  </button>
                                </a>
                            </div><!--END OF .LIST-DETAIL-->
                            <div class="clearfix"></div>
                          @endforeach
                        </div><!--END OF .PANEL-BODY-->
                    </div><!--END OF .PEMBELIAN-->
               </div><!--END OF .LEFT-->
               <div class="right col-md-4 col-sm-4">
                   <div class="panel panel-default status">
                        <div class="panel-heading">
                            <h3 class="panel-title capslock">status tagihan</h3>
                        </div>
                        <div class="panel-body">
                            <div class="list-status">
                                <span class="capslock">no.tagihan</span>
                                <p class="capslock">{{ $order->code }}</p>
                            </div>
                            <div class="list-status">
                                <span class="capslock">status</span>
                                <p class="capital">{{ $order->order_status }}</p>
                            </div>
                            <div class="list-status">
                                <span class="capslock">metode pembayaran</span>
                                <p class="capital">{{ $order->transactionMethod->name }}</p>
                            </div>
                            <div class="list-status">
                                <span class="capslock">total tagihan</span>
                                <p class="capital">Rp. {{ App\Helpers\Money::setRupiah($order->total) }}</p>
                            </div>
                            <div class="list-status">
                                <span class="capslock">alamat pengiriman</span>
                                <p class="capital">{{ $order->buyer_address }}</p>
                            </div>
                        </div>
                    </div><!--END OF .STATUS-->
               </div><!--END OF .RIGHT-->
           </div><!--END OF .ROW-->
        </div><!--END OF .WR-CHECKOUT-->
    </div><!--END OF .CHECKOUT-->
 

@endsection

@section('javascript')
	
	

@stop