@extends('layouts.frontend.app')

@section('css')
	
<!-- 	<link rel="stylesheet" type="text/css" href="{{ url('/backend/assets/iCheck/skins/square/blue.css') }}">
 -->


@endsection

@section('content')
	
	<form method="post" class="form-horizontal">
  {{ csrf_field() }}

	<div class="checkout">
        <div class="wr-checkout container">
           <div class="row">
               <div class="right col-md-6 col-sm-6 pull-right">
                   <div class="panel panel-default cart">
                     <div class="panel-heading panel-heading-custom">
                        <h3 class="panel-title capslock"> Detail Pembelian
                             <!-- <a href="#" class="capital pull-right">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i> edit cart
                            </a> -->
                        </h3>
                     </div><!--END OF .PANEL-HEADING-->
                     <div class="panel-body list-cart">
                        <div class="list row">
                            <div class=" col-md-3 col-sm-3 col-xs-3">
                                <div class="image">

                                @if( $product->gallery->count() != 0 )

                                    @if( $product->getGalleryUtama->count() != 0 )
                                        @foreach($product->getGalleryUtama as $galleryUtama)
                                            <img src="{{ url($galleryUtama->path) }}" class="img-responsive" alt="a" style="height: 270px; width: 270px;" />
                                        @endforeach
                                    @else
                                        <img src="{{ url($newProduct->gallery->first()->path) }}" class="img-responsive" alt="a" style="height: 270px; width: 270px;" />
                                    @endif

                                @else
                                    <img src="{{ url('/frontend/images/empty.jpg') }}" class="img-responsive">
                                @endif
                                </div>
                            </div>
                            <div class=" col-md-6 col-sm-6 col-xs-6">
                                <div class="detail">
                                    <h4 class="capital">
                                        <p>No Tujuan : {{ $no }}</p>
                                    </h4>
                                    <!-- <p class="capital">code: 111111</p> -->
                                    <p class="capital">Barang : {{ $product->name }}</p>
                                </div>
                            </div>
                            <div class=" col-md-3 col-sm-3 col-xs-3">
                                <div class="harga pull-right">
                                    <p class="capital">Rp. {{ App\Helpers\Money::setRupiah($product->price) }}</p>
                                </div>
                            </div>
                        </div><!--END OF .LIST-->

                        @php
                          if ($product->end_time_discount>=date('Y-m-d H:i:s') && $product->start_time_discount<=date('Y-m-d H:i:s')) {
                            $total = $product->price - ( ($product->price*$product->discount) / 100 );
                          }else{
                            $total = $product->price;
                          }
                        @endphp

                        <div class="list row">
                            <div class=" col-md-6 col-sm-6 col-xs-6">
                                <div class="total">
                                    <p class="capital">Harga Barang: </p>
                                    @if($product->end_time_discount>=date('Y-m-d H:i:s'))
                                      <p class="capital">Discount:</p>
                                    @endif
                                    <p class="capital">Biaya Kode Order : </p>
                                  <p class="capital">Total Tagihan : </p>
                                </div>
                            </div>
                            <div class=" col-md-6 col-sm-6 col-xs-6">
                                <div class="harga pull-right">
                                    <p class="capital">Rp. {{ App\Helpers\Money::setRupiah($product->price) }}</p>
                                    @if($product->end_time_discount>=date('Y-m-d H:i:s'))
                                      <p class="capital">{{ $product->discount }}%</p>
                                    @endif
                                    <p class="capital">
                                      Rp. {{ App\Helpers\Money::setRupiah(500) }}
                                      <input type="hidden" name="adm" value="500">
                                    </p>
                                    <p class="capital">Rp. {{ App\Helpers\Money::setRupiah($total+500) }}</p>
                                </div>
                            </div>
                        </div><!--END OF .LIST-->

                        <div class="list row">
                            <div class=" col-md-12 col-sm-12 col-xs-12">
                                <div class="total">
                                    <button type="submit" class="btn btn-md btn-primary btn-block">Lanjut</button>
                                </div>
                            </div>
                        </div><!--END OF .LIST-->

                     </div><!--END OF .PANEL-BODY-->
                   </div><!--END OF .PANEL-->
               </div><!--END OF .RIGHT-->
               <div class="left col-md-6 col-sm-6 pull-left">
                   <div class="panel panel-default shipping">
                      <div class="panel-heading panel-heading-custom">
                        <h3 class="panel-title capslock">Isi Data Pembeli</h3>
                      </div><!--END OF .PANEL-HEADING-->
                      <div class="panel-body">
                        	<div class="form-body">
                            	<div class="form-group">
	                                <label class="col-md-4 control-label">Nama Pembeli <span class="required"> * </span></label>
                                	<div class="col-md-6">
	                                    <input type="text" class="form-control" placeholder="Name" name="name" 
	                                    @if(Auth::user())
	                                    	value="{{ Auth::user()->name }}"
	                                    @else
	                                    	value="{{ old('name') }}"
	                                    @endif
	                                    >
                                    	@if($errors->has('name'))
	                                        <span class="help-block"> 
                                            	<strong style="color: red;"> {{ $errors->first('name') }} </strong> 
                                        	</span>
                                    	@endif
                                	</div>
	                            </div>
                        	</div>

                        	<div class="form-body">
                            	<div class="form-group">
                                	<label class="col-md-4 control-label">Email <span class="required"> * </span></label>
                                	<div class="col-md-6">
	                                    <input type="text" class="form-control" placeholder="Email" name="email"
	                                    @if(Auth::user())
	                                    	value="{{ Auth::user()->email }}" 
	                                    @else
	                                    	value="{{ old('email') }}"
	                                    @endif
	                                    >
                                    	@if($errors->has('email'))
	                                        <span class="help-block"> 
    	                                        <strong style="color: red;"> {{ $errors->first('email') }} </strong> 
                                        	</span>
                                    	@endif
                                	</div>
	                            </div>
                        	</div>

                        	<div class="form-body">
                            	<div class="form-group">
                                	<label class="col-md-4 control-label">Telepon/Handphone <span class="required"> * </span></label>
                                	<div class="col-md-6">
	                                    <input type="text" class="form-control" placeholder="Telepon/Handphone" name="no_hp"
	                                    @if(Auth::user())
	                                    	value="{{ Auth::user()->no_hp }}" 
	                                    @else
	                                    	value="{{ old('no_hp') }}"
	                                    @endif
	                                    >
                                    	@if($errors->has('no_hp'))
	                                        <span class="help-block"> 
    	                                        <strong style="color: red;"> {{ $errors->first('no_hp') }} </strong> 
                                        	</span>
                                    	@endif
                                	</div>
	                            </div>
                        	</div>

                        	<!-- <div class="form-actions">
	                            <div class="row">
                                	<div class="col-md-10">
                                		<div class="pull-right">
                                			<button type="submit" class="btn btn-md btn-primary">Lanjut</button>
                                		</div>
                                	</div>
                            	</div>
                        	</div> -->

                      </div><!--END OF .PANEL-BODY-->
                  </div><!--END OF .PANEL-->

                  <div class="panel panel-default metode-payment">
                      <div class="panel-heading panel-heading-custom">
                        <h3 class="panel-title capslock">Metode Pembayaran</h3>
                      </div><!--END OF .PANEL-HEADING-->
                      <div class="panel-body">
                        
                          <div class="funkyradio">
                            @foreach($transactionMethods as $key => $method)
                            <div class="funkyradio-info">
                                <input type="radio" name="metode_pembayaran" id="radio{{$key}}" value="{{ $method->id }}" />
                                <label for="radio{{$key}}" class="capital">{{ $method->name }}</label>
                            </div>
                            @endforeach

                            @if($errors->has('metode_pembayaran'))
                                      <span class="help-block"> 
                                          <strong style="color: red;"> {{ $errors->first('metode_pembayaran') }} </strong> 
                                        </span>
                                    @endif

                          </div><!--END OF .FUNKYRADIO-->

                      	<!-- <div class="form-body">
                            <div class="form-group">
                                <div class="col-md-12">
                                	@foreach($transactionMethods as $method)
                                		<div class="radio">
                                			<input type="radio" name="metode_pembayaran" value="{{ $method->id }}" class="form-control input-lg"> {{ $method->name }}
                                		</div>
                        			@endforeach

                                   	@if($errors->has('metode_pembayaran'))
	                                    <span class="help-block"> 
    	                                    <strong style="color: red;"> {{ $errors->first('metode_pembayaran') }} </strong> 
                                       	</span>
                                  	@endif
                                </div>
	                        </div>
                        </div> -->
                      </div><!--END OF .PANEL-BODY-->
                  </div><!--END OF .PANEL-->

                 
                  
               </div><!--END OF .LEFT-->
           </div><!--END OF .ROW-->
        </div><!--END OF .WR-CHECKOUT-->
    </div><!--END OF .CHECKOUT-->

    </form>
 

@endsection

@section('javascript')
	
	<!-- <script src="{{ url('/backend/assets/iCheck/icheck.js') }}" type="text/javascript"></script> -->

	<script type="text/javascript">
		
		// $('input').iCheck({
  //           checkboxClass: 'icheckbox_square-blue',
  //           radioClass: 'iradio_square-blue',
  //           increaseArea: '20%' // optional
  //       });

	</script>

@stop