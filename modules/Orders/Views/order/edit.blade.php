@extends('layouts.backend.app')

@section('csc')
    
    

@endsection

@section('content')

    @php
        if($order->order_status=="Menunggu Pembayaran"):
            $statusOrder = "true";
        else:
            $statusOrder = "false";
        endif;
    @endphp
        
        <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->                        
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="{{ url('/home') }}">Dashboard</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>Edit Order</span>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title"> <!-- Dashboard
            <small>dashboard & statistics</small> -->
        </h1>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->

        @if (count($errors) > 0)
            <div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                @foreach ($errors->all() as $error)
                    <li><strong>{{ $error }}</strong></li>
                @endforeach
            </div>
        @endif

        <div class="row">
            <div class="col-md-11">
                <!-- BEGIN SAMPLE TABLE PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-shopping-cart font-green"></i>
                            <span class="caption-subject font-green bold uppercase">Edit Order</span>
                        </div>
                    </div>
                    <div class="portlet-body">

                        <form method="post" enctype="multipart/form-data" class="form-horizontal">
                        {{ csrf_field() }}

                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Name <span class="required"> * </span></label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" placeholder="Name" name="name" value="{{ $order->buyer_name }}">
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
                                <label class="col-md-3 control-label">Email <span class="required"> * </span></label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" placeholder="Email" name="email" value="{{ $order->buyer_email }}">
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
                                <label class="col-md-3 control-label">No Telepon/Handphone <span class="required"> * </span></label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" placeholder="no_hp" name="no_hp" value="{{ $order->buyer_phone_number }}">
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
                                <label class="col-md-3 control-label">Address <span class="required"> * </span></label>
                                <div class="col-md-9">
                                    <textarea class="form-control" name="address" rows="5">{{ $order->buyer_address }}</textarea>
                                    @if($errors->has('address'))
                                        <span class="help-block"> 
                                            <strong style="color: red;"> {{ $errors->first('address') }} </strong> 
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Province <span class="required"> * </span></label>
                                <div class="col-md-9">
                                    <select name="province" class="form-control" id="province">
                                        <option value="0">--SELECT PROVINCE--</option>
                                        @foreach($provinces->rajaongkir->results as $province)
                                            <option value="{{ $province->province_id }}" @if($province->province_id==$order->buyer_province) selected @endif >{{ $province->province }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('province'))
                                        <span class="help-block"> 
                                            <strong style="color: red;"> {{ $errors->first('province') }} </strong> 
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-3 control-label">City <span class="required"> * </span></label>
                                <div class="col-md-9">
                                    <select name="city" class="form-control" id="city">
                                        <option value="0">--SELECT CITY--</option>
                                        @foreach($cities as $city)
                                            <option value="{{ $city->city_id }}" @if($city->city_id == $order->buyer_city) selected @endif >{{ $city->type }} {{ $city->city_name }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('city'))
                                        <span class="help-block"> 
                                            <strong style="color: red;"> {{ $errors->first('city') }} </strong> 
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Courier <span class="required"> * </span></label>
                                <div class="col-md-9">
                                    <select name="courier" class="form-control" id="courier">
                                        <option value="0">--SELECT COURIER--</option>
                                        <option value="jne" @if($order->courier=="jne") selected @endif >JNE</option>}
                                        <option value="pos" @if($order->courier=="pos") selected @endif >POS</option>
                                        <option value="tiki" @if($order->courier=="tiki") selected @endif >TIKI</option>
                                    </select>
                                    @if($errors->has('courier'))
                                        <span class="help-block"> 
                                            <strong style="color: red;"> {{ $errors->first('courier') }} </strong> 
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        @php
                            $service = json_decode($order->service);
                        @endphp

                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Service <span class="required"> * </span></label>
                                <div class="col-md-9">
                                    <select name="service" class="form-control" id="service">
                                        <option value="0">--SELECT SERVICE--</option>
                                        @foreach($costs as $key => $cost)
                                            <option value="{{ $key }}" @if($service->service==$cost->service) selected @endif >{{ $cost->service }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('service'))
                                        <span class="help-block"> 
                                            <strong style="color: red;"> {{ $errors->first('service') }} </strong> 
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Payment Method <span class="required"> * </span></label>
                                <div class="col-md-9">
                                    <select name="payment_method" class="form-control">
                                        <option value="0">--SELECT PAYMENT METHOD--</option>
                                        @foreach($transactionMethods as $transactionMethod)
                                            <option value="{{ $transactionMethod->id }}" @if($transactionMethod->id==$order->transaction_method_id) selected @endif >{{ $transactionMethod->name }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('payment_method'))
                                        <span class="help-block"> 
                                            <strong style="color: red;"> {{ $errors->first('payment_method') }} </strong> 
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="shipping_cost" id="shipping_cost" value="{{ $order->shipping_cost }}">

                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
                                    <div class="pull-right">
                                        <button type="submit" class="btn green">Update</button>
                                        <a href="{{ url('/dashboard/orders') }}" class="btn btn-default">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
                       
    </div>
    <!-- END CONTENT BODY -->

    

    
@endsection

@section('javascript')
    
    <script type="text/javascript">

        var weight = "{{ $order->weight }}";
        
        var statusOrder = "{{ $statusOrder }}";
        if (statusOrder=="false") {
            $('input').prop('disabled', true);
            $('textarea').prop('disabled', true);
            $('select').prop('disabled', true);
            $('button').prop('disabled', true);
        }

        function getCity(id){
            
            var url = "{{ url('/getCity') }}";

            $.ajax({

                url: url,
                type: "GET",
                data: {id: id},
                success: function(data){

                    $('#city').empty();
                    $('#city').append(" <option value='0'>--SELECT CITY--</option> ");

                    $.each(data, function(i, v){

                        $('#city').append(" <option value='"+ v.city_id +"'>"+ v.type + ". " + v.city_name +"</option> ");

                        var city = $('#city').val();
                        var courier = $('#courier').val();

                        if (id!=0 && city!=0) {


                            $('#courier').prop('disabled', false);
                            $('#service').prop('disabled', false);

                            if (courier!=0) {

                                getService(153, city, weight, courier)

                            }

                        }else{

                            $('#courier').val('0').prop('disabled', true);
                            $('#service').empty().prop('disabled', true).append(" <option value='0'>--SELECT SERVICE--</option> ");
                            $('#shipping_cost').val('');

                        }

                    });

                }

            });

        }

        function getService(origin, destination, weight, courier){

            var url = "{{ url('/getService') }}";

            $.ajax({

                url: url,
                type: "GET",
                data: {origin: origin, destination: destination, weight: weight, courier: courier},
                success: function(data){

                    //console.log(data.rajaongkir.results);

                    $('#service').empty().append(" <option value=''>--SELECT SERVICE--</option> ");

                    $.each(data.rajaongkir.results['0']['costs'], function(i, v){

                        $('#service').append(" <option value='"+ i +"'>"+ v.service +"</option> ");

                    });

                    $('#shipping_cost').val('');

                }

            });

        }

        function getCost(origin, destination, weight, courier, index){

            var url = "{{ url('/getCost') }}";
            
            $.ajax({

                url: url,
                type: "GET",
                data: {origin: origin, destination: destination, weight: weight, courier: courier},
                success: function(data){

                    $('#shipping_cost').val(data.rajaongkir.results['0']['costs'][index]['cost']['0']['value']);

                }

            });

        }
        
        $('#province').on('change', function(){

            var id = $(this).val();

            getCity(id);

        });

        $('#city').on('change', function(){

            var province = $('#province').val();
            var city = $('#city').val();

            if (province!=0 && city!=0) {

                $('#courier').prop('disabled', false);
                $('#service').prop('disabled', false);

                var courier = $('#courier').val();

                if (courier!=0) {

                    getService(153, city, weight, courier);

                }

            }else{

                $('#courier').value('0').prop('disabled', true);
                $('#service').empty().prop('disabled', true).append(" <option value='0'>--SELECT SERVICE--</option> ");
                $('#shipping_cost').val('');

            }

        });

        $('#courier').on('change', function(){

            var province = $('#province').val();
            var city = $('#city').val();
            var courier = $(this).val();

            getService(153, city, weight, courier);

        });

        $('#service').on('change', function(){

            var index = $(this).val();
            var city = $('#city').val();
            var courier = $('#courier').val();

            getCost(153, city, weight, courier, index);

        });

    </script>
    
@stop
