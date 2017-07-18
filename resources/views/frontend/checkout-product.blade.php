@extends('layouts.frontend.app')

@section('css')
	


@endsection

@section('content')
	
	<form method="post" action="{{ url('/payment/product/order') }}" class="form-horizontal" autocomplete="off">
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
                      @php
                        $totalHargaBarang = 0;
                        $weightProduct = $product->weight * $quantity;
                      @endphp
                        <div class="list row">
                            <div class=" col-md-3 col-sm-3 col-xs-3">
                                <div class="image">

                                  @if( $product->gallery->count() != 0 )

                                    @if( $product->getGalleryUtama->count() != 0 )
                                        @foreach($product->getGalleryUtama as $galleryUtama)
                                            <img src="{{ url($galleryUtama->path) }}" class="img-responsive" alt="a" style="height: 150px; width: 270px;" />
                                        @endforeach
                                    @else
                                        <img src="{{ url($product->gallery->first()->path) }}" class="img-responsive" alt="a" style="height: 150px; width: 270px;" />
                                    @endif

                                  @else
                                    <img src="{{ url('/frontend/images/empty.jpg') }}" class="img-responsive">
                                  @endif
                                
                                </div>
                            </div>
                            <div class=" col-md-5 col-sm-5 col-xs-5">
                                <div class="detail">
                                    <h4 class="capital">
                                        <p></p>
                                    </h4>
                                    <!-- <p class="capital">code: 111111</p> -->
                                    <p class="capital"><label class="control-label">Barang : {{ $product->name }}</label></p>
                                    <p class="capital"><label class="control-label">Quantity : {{ $quantity }}</label></p>

                                    <input type="hidden" name="idProduct" value="{{ $product->id }}">
                                    <input type="hidden" name="quantity" value="{{ $quantity }}">
                                    <input type="hidden" name="weight" value="{{ $weightProduct }}">

                                </div>
                            </div>
                            <div class=" col-md-4 col-sm-4 col-xs-4">
                                <div class="harga pull-right">
                                    <p class="capital">
                                    @if($product->discount!=0 && $product->start_time_discount<=date('Y-m-d H:i:s') && $product->end_time_discount>=date('Y-m-d H:i:s'))

                                      <label class="control-label">Rp. {{ App\Helpers\Money::setRupiah( ($product->price - ( ($product->price*$product->discount)/100 ) ) * $quantity ) }}</label>

                                      @php
                                        $totalHargaBarang = ( $product->price - ( ( $product->price*$product->discount )/100 ) ) * $quantity;
                                      @endphp

                                    @else
                                      <label class="control-label">Rp. {{ App\Helpers\Money::setRupiah($product->price * $quantity) }}</label>

                                      @php
                                        $totalHargaBarang = $product->price * $quantity;
                                      @endphp

                                    @endif
                                    </p>
                                </div>
                            </div>
                        </div><!--END OF .LIST-->                        

                        <div class="list row">
                          <div class=" col-md-12 col-sm-12 col-xs-12">

                            <div class="form-body">
                              <div class="form-group">
                                <label class="col-md-4 control-label">Kurir <span class="required"> * </span></label>
                                <div class="col-md-6">
                                      
                                    <select name="kurir" class="form-control" id="kurir" disabled="true">
                                      <option value="0">--PILIH KURIR--</option>
                                      <option value="jne">JNE</option>
                                      <option value="pos">POS</option>
                                      <option value="tiki">TIKI</option>
                                    </select>

                                    @if($errors->has('kurir'))
                                        <span class="help-block"> 
                                          <strong style="color: red;"> {{ $errors->first('kurir') }} </strong> 
                                        </span>
                                    @endif
                                </div>
                              </div>
                            </div>

                            <div class="form-body">
                              <div class="form-group">
                                <label class="col-md-4 control-label">Paket <span class="required"> * </span></label>
                                <div class="col-md-6">
                                      
                                  <select name="paket" class="form-control" id="paket" disabled="true">
                                    <option value="0">--PILIH PAKET--</option> 
                                  </select>

                                  @if($errors->has('paket'))
                                    <span class="help-block"> 
                                      <strong style="color: red;"> {{ $errors->first('paket') }} </strong> 
                                    </span>
                                  @endif
                                </div>
                              </div>
                            </div>

                          </div>
                        </div><!--END OF .LIST-->

                        <div class="list row">
                          <div class=" col-md-12 col-sm-12 col-xs-12">
                            <div class=" col-md-6 col-sm-6 col-xs-6">
                              <div class="total">
                                <p class="capital"><label class="control-label">Total Harga Barang:</label></p>
                                <p class="capital"><label class="control-label">Biaya Kirim:</label></p>
                              </div>
                            </div>
                            <div class=" col-md-6 col-sm-6 col-xs-6">
                              <div class="harga pull-right">
                                <p class="capital"><label class="control-label">Rp. {{ App\Helpers\Money::setRupiah($totalHargaBarang) }}</label></p>
                                <p class="capital"><label class="control-label" id="ongkos"></label></p>

                                <input type="hidden" name="ongkos" class="form-control" id="inputOngkos">

                              </div>
                            </div>
                                
                          </div>
                        </div><!--END OF .LIST-->

                        <div class="list row">
                          <div class=" col-md-12 col-sm-12 col-xs-12">
                            <div class=" col-md-6 col-sm-6 col-xs-6">
                              <div class="total">
                                <p class="capital"><label class="control-label">Total Belanja:</label></p>
                              </div>
                            </div>
                            <div class=" col-md-6 col-sm-6 col-xs-6">
                              <div class="harga pull-right">
                                <p class="capital"><label class="control-label" id="totalBelanja"></label></p>
                              </div>
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

                          <div class="form-body">
                              <div class="form-group">
                                  <label class="col-md-4 control-label">Alamat <span class="required"> * </span></label>
                                  <div class="col-md-6">
                                      <textarea class="form-control" name="alamat" rows="10">
                                          
                                        @if(Auth::user())
                                          {{ Auth::user()->address }}
                                        @endif

                                      </textarea>
                                      @if($errors->has('alamat'))
                                          <span class="help-block"> 
                                              <strong style="color: red;"> {{ $errors->first('alamat') }} </strong> 
                                          </span>
                                      @endif
                                  </div>
                              </div>
                          </div>

                          <div class="form-body">
                              <div class="form-group">
                                  <label class="col-md-4 control-label">Provinsi <span class="required"> * </span></label>
                                  <div class="col-md-6">
                                      
                                      <select name="provinsi" class="form-control" id="provinsi">
                                          <option value="0">--PILIH PROVINSI--</option>
                                        @foreach($provinsi->rajaongkir->results as $prov)
                                          <option value="{{ $prov->province_id }}">{{ $prov->province }}</option>
                                        @endforeach
                                      </select>

                                      @if($errors->has('provinsi'))
                                          <span class="help-block"> 
                                              <strong style="color: red;"> {{ $errors->first('provinsi') }} </strong> 
                                          </span>
                                      @endif
                                  </div>
                              </div>
                          </div>

                          <div class="form-body">
                              <div class="form-group">
                                  <label class="col-md-4 control-label">Kota <span class="required"> * </span></label>
                                  <div class="col-md-6">
                                      
                                      <select name="kota" class="form-control" id="kota">
                                        <option value="0">--PILIH KOTA/KABUPATEN--</option>
                                      </select>

                                      @if($errors->has('kota'))
                                          <span class="help-block"> 
                                              <strong style="color: red;"> {{ $errors->first('kota') }} </strong> 
                                          </span>
                                      @endif
                                  </div>
                              </div>
                          </div>

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
                      </div><!--END OF .PANEL-BODY-->
                  </div><!--END OF .PANEL-->

                 
                  
               </div><!--END OF .LEFT-->
           </div><!--END OF .ROW-->
        </div><!--END OF .WR-CHECKOUT-->
    </div><!--END OF .CHECKOUT-->

    </form>
 

@endsection

@section('javascript')
	
	<script type="text/javascript">

    var totalHargaBarang = "{{ $totalHargaBarang }}";
    var weightProduct = "{{ $weightProduct }}";

    function setRupiah($total){
        return $total.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.") +",00";
    }

    function getCity(id){
      
      var url = "{{ url('/getCity') }}";

      $.ajax({

          url: url,
          type: "GET",
          data: {id: id},
          success: function(data){
            
            $('#kota').empty();
            $('#kota').append(" <option value='0'>--PILIH KOTA/KABUPATEN--</option> ");

            $.each(data, function(i, v){

                $('#kota').append(" <option value='"+ v.city_id +"'>"+ v.type + ". " + v.city_name +"</option> ");

                var kota = $('#kota').val();

                if (id!=0 && kota!=0) {

                    $('#kurir').prop('disabled', false);
                    $('#paket').prop('disabled', false);
                    if ($('#kurir').val()!=0) {

                      var kurir = $('#kurir').val();

                      // 153 -> Jakarta Selatan, 100 -> berat barang
                      getPaket(153, kota, weightProduct, kurir);

                    }

                }else{

                    $('#kurir').val('0');
                    $('#kurir').prop('disabled', true);
                    $('#paket').empty();
                    $('#paket').append(" <option value='0'>--PILIH PAKET--</option> ");
                    $('#paket').prop('disabled', true);
                    $('#ongkos').replaceWith(" <label class='control-label' id='ongkos'></label> ");
                    $('#inputOngkos').val('');
                    $('#totalBelanja').replaceWith(" <label class='control-label' id='totalBelanja'></label> ");

                }

            });

          }

      });

    }

    function getPaket(origin, destination, weight, courier){

      var url = "{{ url('/getPaket') }}";

      $.ajax({

          url: url,
          type: "GET",
          data: {origin: origin, destination: destination, weight: weight, courier: courier},
          success: function(data){

              // console.log(data.rajaongkir.results);

              $('#paket').empty();
              $('#paket').append(" <option value=''>--PILIH PAKET--</option> ");

              $.each(data.rajaongkir.results['0']['costs'], function(i, v){
                  // console.log(v);
                  $('#paket').append(" <option value='"+ i +"'>"+ v.service +"</option> ");
              });

              $('#ongkos').replaceWith(" <label class='control-label' id='ongkos'></label> ");
              $('#inputOngkos').val('');
              $('#totalBelanja').replaceWith(" <label class='control-label' id='totalBelanja'></label> ");

          }

      });

    }

    function getCost(origin, destination, weight, courier, index){

        var url = "{{ url('/getCost') }}";
        var statusIndex = false;

        $.ajax({

            url: url,
            type: "GET",
            data: {origin: origin, destination: destination, weight: weight, courier: courier},
            success: function(data){

                $('#ongkos').replaceWith(" <label class='control-label' id='ongkos'>Rp. "+ setRupiah(data.rajaongkir.results['0']['costs'][index]['cost']['0']['value']) +"</label> ");

                $('#inputOngkos').val(data.rajaongkir.results['0']['costs'][index]['cost']['0']['value']);

                $('#totalBelanja').replaceWith(" <label class='control-label' id='totalBelanja'>Rp. "+ setRupiah(  parseInt(data.rajaongkir.results['0']['costs'][index]['cost']['0']['value']) + parseInt(totalHargaBarang) ) +"</label> ");

            }

        }); 

    }
   
    $('#provinsi').on('change', function(){

      var id = $(this).val();

      getCity(id);

    });

    $('#kota').on('change', function(){

        var provinsi = $('#provinsi').val();
        var kota = $(this).val();

        if ( provinsi!=0 && kota!=0 ) {

          $('#kurir').prop('disabled', false);
          $('#paket').prop('disabled', false);

          if ($('#kurir').val()!=0) {

              var kurir = $('#kurir').val();

              // 153 -> Jakarta Selatan
              getPaket(153, kota, weightProduct, kurir);

          }

        }else{

          $('#kurir').prop('disabled', true);
          $('#kurir').value('0');
          $('#paket').empty();
          $('#paket').append(" <option value='0'>--PILIH PAKET--</option> ");
          $('#paket').prop('disabled', true);
          $('#ongkos').replaceWith(" <label class='control-label' id='ongkos'></label> ");
          $('#inputOngkos').val('');

        }

    });

    $('#kurir').on('change', function(){

      var provinsi = $('#provinsi').val();
      var kota = $('#kota').val();
      var kurir = $(this).val();

      // 153 -> Jakarta Selatan
      getPaket(153, kota, weightProduct, kurir);


    });

    $('#paket').on('change', function(){

        var index = $(this).val();
        var kota = $('#kota').val();
        var kurir = $('#kurir').val();

        // 153 -> Jakarta Selatan
        getCost(153, kota, weightProduct, kurir, index);

    });

  </script>  

@stop