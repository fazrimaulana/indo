@extends('layouts.frontend.app')

@section('css')
	



@endsection

@section('content')
	
  
  <div class="history-transaksi">
        <div class="wr-history-transaksi container">
           <div class="heading-transaksi row">
               <div class="shortby col-md-6 col-sm-6 col-xs-6">
                    <form type="get">
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="No.Transaksi, Nama, No.Telepon...">
                            <div class="input-group-btn">
                            <button class="btn btn-default" type="submit">
                                <i class="glyphicon glyphicon-search"></i>
                            </button>
                            </div>
                        </div>
                    </form> 
               </div><!--END OF .SHORTBY-->
               <div class="download col-md-6 col-sm-6 col-xs-6">
                   <button class="btn btn-md capslock pull-right">
                       <i class="fa fa-download" aria-hidden="true"></i> unduh transaksi
                   </button>
               </div><!--END OF .DOWNLOAD-->
           </div><!--END OF .ROW-->
           <div class="transaksi">

           	@foreach($orders as $order)

              <div class="panel panel-default list-transaksi">
                <div class="panel-heading">
                  <div class="row">
                    <div class="col-md-9 col-sm-9 col-xs-9 detail">
                      <div class="col-md-4 col-sm-4 col-xs-4 col-custom">
                        <span class="capslock">no.tagihan</span>
                        <p class="capslock">{{ $order->code }}</p>
                      </div>
                      <div class="col-md-4 col-sm-4 col-xs-4 col-custom">
                        <span class="capslock">total tagihan</span>
                        <p class="capital">Rp. {{ App\Helpers\Money::setRupiah($order->total) }}</p>
                      </div>
                      <div class="col-md-4 col-sm-4 col-xs-4 col-custom">
                        <span class="capslock">status tagihan</span>
                        <p class="capital">{{ $order->order_status }}</p>
                      </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-3 action">
                      <a href="{{ url('/transaksi/detail/'.$order->id) }}" class="btn capslock pull-right">
                        <i class="fa fa-eye" aria-hidden="true"></i> lihat detail
                      </a>
                    </div>
                  </div>
                </div><!--END OF .PANEL-HEADING-->
                <div class="panel-body">
                  @foreach($order->orderDetail as $orderDetail)
                  <div class="row">
                    <div class="col-md-9 col-sm-9 col-xs-9 detail">
                      <div class="col-md-4 col-sm-4 col-xs-4 col-custom">
                        <span class="capslock">no.transaksi</span>
                        <p class="capslock">{{ $orderDetail->id }}</p>
                      </div>
                      <div class="col-md-4 col-sm-4 col-xs-4 col-custom">
                        <span class="capslock">barang</span> <br>
                        <a href="#">

                        	@if( $orderDetail->product->gallery->count() !=0 )

                        		@if( $orderDetail->product->getGalleryUtama->count() != 0 )
                        			@foreach($orderDetail->product->getGalleryUtama as $galleryUtama)
                        				<div class="image">
                            				<img src="{{ url($galleryUtama->path) }}">
                          				</div>
                        			@endforeach
                        		@else
                        			<div class="image">
                            			<img src="{{ url($orderDetail->product->gallery->first()->path) }}">
                          			</div>
                        		@endif

                        	@else

                        		<div class="image">
                            		<img src="{{ url('/frontend/images/empty.jpg') }}">
                          		</div>

                        	@endif

                        </a>
                      </div>
                      <div class="col-md-4 col-sm-4 col-xs-4 col-custom">
                        <span class="capslock">status pembelian</span>
                        <p class="capital">{{ $orderDetail->status }}</p>
                      </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-3 action">

                    	<form id="addProduct-form-{{ $orderDetail->id }}" method="get" action="{{ url('/payment/product/'.$orderDetail->product_id) }}">
                              <input type="hidden" name="idProduct" value="{{ $orderDetail->product_id }}">
                              <input type="hidden" name="quant" class="form-control input-number" value="1" min="1" max="10">
                        </form>

                      <a onclick="event.preventDefault();document.getElementById('addProduct-form-{{ $orderDetail->id }}').submit();" class="btn capslock pull-right">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i> beli lagi
                      </a>
                    </div>
                  </div>
                  @endforeach
                </div><!--END OF .PANEL-BODY-->
              </div><!--END OF .LIST-TRANSAKSI-->

            @endforeach  

           </div><!--END OF .TRANSAKSI-->
        </div><!--END OF .WR-HISTORY-TRANSAKSI-->
    </div><!--END OF .HISTORY-TRANSAKSI-->	
 

@endsection

@section('javascript')
	
	

@stop