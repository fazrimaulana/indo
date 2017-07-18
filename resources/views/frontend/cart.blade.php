@extends('layouts.frontend.app')

@section('css')

     <link rel="stylesheet" type="text/css" href="{{ url('/backend/assets/iCheck/skins/square/green.css') }}">

@endsection

@section('content')

	<div class="page-cart">
        <div class="wr-page-cart container">
           <div class="row">
               <div class="col-md-12 col-sm-12 col-xs-12">
                   <div class="panel panel-default cart">
                     <div class="panel-heading panel-heading-custom">
                        <h3 class="panel-title capslock">REVIEW ORDER</h3>
                     </div><!--END OF .PANEL-HEADING-->
                     <div class="panel-body list-cart">

                        <div class="list row">
                            <div class=" col-md-1 col-sm-1 col-xs-1" id="checkbox" style="padding-right: 0px; width: 40px;">
                                <input type="checkbox" value="" id="check_all" class="all">
                            </div>
                            <div class="col-md-7 col-sm-7 col-xs-7">
                                Pilih Semua Transaksi
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-4">
                                <div class="harga">
                                    <a href="javascript:;" class="btn pull-right" id="delete_check">
                                        <i class="fa fa-times fa-lg" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div><!--END OF .LIST-->

                        <form id="action" action="{{ url('/cart/carts/payment') }}" method="POST">
                        {{ csrf_field() }}

                     	@foreach($carts as $cart)
                        <div class="list row">
                            <div class=" col-md-1 col-sm-1 col-xs-1" style="padding-right: 0px; width: 40px;">
                                    <input type="checkbox" name="check_action[]" value="{{ $cart->id }}" class="check" id="checkAction{{$cart->id}}">
                            </div>
                            <div class=" col-md-2 col-sm-2 col-xs-2">
                                <div class="image" >
                                    <img src="{{ url($cart->attributes->image) }}" class="img-responsive">
                                </div>
                            </div>
                            <div class="col-md-offset-1 col-md-4 col-sm-4 col-xs-4">
                                <div class="detail">
                                    <h4 class="capital">
                                        <a href="#">{{ $cart->name }}</a>
                                    </h4>
                                    <!-- <p class="capital">code: 111111</p> -->
                                </div>
                                <div class="qty">
                                    <p class="capital">quantity:</p>
                                    <div class="input-group col-md-4 col-sm-4 col-xs-4">
                                        
                                        <span class="input-group-btn">
                                            <button type="button" class="quantity-left-minus btn btn-danger btn-number"  data-type="minus" data-field="" data-id="{{ $cart->id }}">
                                              <span class="icon-min glyphicon glyphicon-minus"></span>
                                            </button>
                                        </span>
                                        <!-- <input type="text" id="quantity_{{ $cart->id }}" name="quantity" class="form-control input-number" value="{{ $cart->quantity }}" min="1" max="100"> -->

                                        <input type="text" name="quant[{{ $cart->id }}]" class="form-control input-number" value="{{ $cart->quantity }}" min="1" max="10" data-price="{{ $cart->price }}" id="inputPrice{{ $cart->id }}">

                                        <span class="input-group-btn">
                                            <button type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus" data-field="" data-id="{{ $cart->id }}">
                                                <span class="icon-plus glyphicon glyphicon-plus"></span>
                                            </button>
                                        </span>

                                    </div>
                                </div>
                            </div>
                            <div class=" col-md-4 col-sm-4 col-xs-4">
                                <div class="harga">
                                    <p class="capital pull-left" id="price{{ $cart->id }}">Rp. {{ App\Helpers\Money::setRupiah($cart->price*$cart->quantity) }}</p>
                                    <a href="{{ url('/cart/'.$cart->id.'/remove') }}" class="btn pull-right">
                                       <i class="fa fa-times fa-lg" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div><!--END OF .LIST-->
                        @endforeach
                        </form>
                        
                        <div class="list row">
                            <div class=" col-md-1 col-sm-1 col-xs-1" style="padding-right: 0px; width: 40px;">
                            </div>
                            <div class=" col-md-7 col-sm-7 col-xs-7">
                                <div class="total">
                                    <p class="capital">total harga barang:</p>
                                    <span class="capital">(harga belum termasuk ongkos kirim)</span>
                                </div>
                            </div>
                            <div class=" col-md-4 col-sm-4 col-xs-4">
                                <div class="harga">
                                    <p class="capital" id="price">Silahkan pilih transaksi yang ingin di bayar</p>
                                </div>
                            </div>
                        </div><!--END OF .LIST-->
                        <div class="list row">
                            <div class="belanja col-md-6 col-sm-6 col-xs-6">
                                <a href="{{ url('/') }}" class="capslock btn btn-md pull-left">lanjut belanja</a>
                            </div>
                            <div class="bayar col-md-6 col-sm-6 col-xs-6">
                                <a href="{{ url('/cart/carts/payment') }}" class="capslock btn btn-md pull-right" onclick="event.preventDefault();document.getElementById('action').submit();" >lanjut bayar</a>
                            </div>
                        </div><!--END OF .LIST-->
                     </div><!--END OF .PANEL-BODY-->
                   </div><!--END OF .PANEL-->
               </div>
           </div><!--END OF .ROW-->
        </div><!--END OF .WR-PAGE-CART-->
    </div><!--END OF .PAGE-CART-->

@endsection

@section('javascript')

    <script src="{{ url('/backend/assets/iCheck/icheck.js') }}" type="text/javascript"></script>
    
    <script type="text/javascript">

        $('input').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
            increaseArea: '20%' // optional
        });

        var totalPrice = 0;

        function setRupiah($total){
            return $total.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.") +",00";
        }

        $(function () {
            var checkAll = $('input.all');
            var checkboxes = $('input.check');

            // jika check all di click
            checkAll.on('ifChecked ifUnchecked', function(event) {        
                if (event.type == 'ifChecked') {
                    checkboxes.iCheck('check');
                } else {
                    checkboxes.iCheck('uncheck');
                }
            });

            // jika checkbox di rubah
            checkboxes.on('ifChanged', function(event){
                if(checkboxes.filter(':checked').length == checkboxes.length) {
                        document.getElementById("check_all").checked = true;
                } else {
                    document.getElementById("check_all").checked = false;
                }
                checkAll.iCheck('update');
            });

            // jika check
            checkboxes.on('ifChecked ifUnchecked', function(event) {        
                if (event.type == 'ifChecked') {
                    $(this).iCheck('check');
                    var url = "{{ url('/') }}";
                    $.get(url + '/cart/carts/' + $(this).val() + '/check', function(data){
                        var quantity = $('#inputPrice'+data.id).val();
                        totalPrice += (data.price*quantity);
                        $('#price').replaceWith(" <p class='capital' id='price'>Rp. "+ setRupiah(totalPrice) +"</p> ");
                    });

                } else {
                    $(this).iCheck('uncheck');
                    var url = "{{ url('/') }}";
                    $.get(url + '/cart/carts/' + $(this).val() + '/uncheck', function(data){
                        var quantity = $('#inputPrice'+data.id).val();
                        totalPrice -= (data.price*quantity);
                        $('#price').replaceWith(" <p class='capital' id='price'>Rp. "+ setRupiah(totalPrice) +"</p> ");
                    });
                }
            });

        });
        
        //script untuk quantity

        $(document).ready(function(){

            var quantitiy=0;
            $('.quantity-right-plus').click(function(e){
                
                e.preventDefault();
                  
                var id = $(this).data("id");
                var input = $('#inputPrice'+id);
                var quantity = parseInt($('#inputPrice'+id).val());

                var price = input.data("price");
                      
                input.val(quantity + 1);
                price *= (quantity+1);

                $('#price'+id).replaceWith(" <p class='capital pull-left' id='price"+id+"'>Rp. "+ setRupiah(price) +"</p> ");

                if($('#checkAction'+id).prop('checked') ==  true){
                    totalPrice += input.data("price"); 
                    $('#price').replaceWith(" <p class='capital' id='price'>Rp. "+ setRupiah(totalPrice) +"</p> ");
                }

            });

            $('.quantity-left-minus').click(function(e){
                  
                e.preventDefault();
                  
                var id = $(this).data("id");
                var input = $('#inputPrice'+id);
                var quantity = parseInt(input.val());
                var price = input.data("price");
                
                if(quantity>1){

                    $('#inputPrice'+id).val(quantity - 1);
                    price *= (quantity-1);

                    $('#price'+id).replaceWith(" <p class='capital pull-left' id='price"+id+"'>Rp. "+ setRupiah(price) +"</p> ");

                    if($('#checkAction'+id).prop('checked') ==  true){
                        totalPrice -= input.data("price"); 
                        $('#price').replaceWith(" <p class='capital' id='price'>Rp. "+ setRupiah(totalPrice) +"</p> ");
                    }

                }
                
            });
              
        });


        $('#delete_check').on('click', function(){

            var $form = $('form#action');
            var id = $form.serializeArray();
            var url = "{{ url('/cart/carts/delete_check') }}";
            var carts = "{{ url('/cart/carts') }}";
            var arrayId = [];                 
                
            $.each(id, function(i, v){
                if (v.name=="check_action[]") {
                    arrayId.push(v.value);
                }
            });

            if (arrayId!="") {

                $(this).button('loading');

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type:'POST',
                    url:url,
                    data:{idCart : arrayId},
                    success:function(data){
                        $(this).button('reset');
                        window.location = carts;
                    }
                });

            } 

        });


    </script>

@stop