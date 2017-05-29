@extends('layouts.backend.app')

@section('css')
    
    <link rel="stylesheet" type="text/css" href="{{ url('/backend/assets/iCheck/skins/square/green.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ url('/backend/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.css') }}">

@endsection

@section('content')
        
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
                    <span>Orders</span>
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

        @if (session('status'))
                <div class="alert alert-info" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                        <li><strong>{{ session('status') }}</strong></li>
                </div>
        @endif


        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN SAMPLE TABLE PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-shopping-cart font-green"></i>
                            <span class="caption-subject font-green bold uppercase">Orders</span>
                        </div>
                    </div>
                    <div class="portlet-body">

                        <div class="row">
                            <div class="col-md-4">
                                <a href="{{ url('/dashboard/orders/add') }}" class="btn btn-primary btn-sm">Add New Order</a>

                                <button class="btn btn-sm btn-danger" id="delete_check" data-loading-text="Loading...">Delete</button>
                            </div>

                            
                            <form action="{{ url('/dashboard/orders/search') }}" method="get">
                                <div class="col-md-2 col-md-offset-3">
                                    
                                    <select name="filter" id="filter" class="form-control">
                                        <option value="id">Code Order</option>
                                        <option value="date">Date</option>
                                        <option value="name">Name</option>
                                    </select>
                                    
                                </div>
                                <div class="col-md-3" style="padding-left: 0px; margin-left: 0px;">
                                    <div class="input-group">
                                        <input type="text" class="form-control search" name="search" id="search" placeholder="Search for...">
                                        <span class="input-group-btn">
                                            <button class="btn btn-success" type="submit">Go!</button>
                                        </span>
                                    </div>
                                </div>
                            </form>

                        </div>

                        <div class="table-scrollable">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th id="checkbox">
                                            <input type="checkbox" value="" id="check_all" class="all">
                                        </th>
                                        <th> Name </th>
                                        <th> Email </th>
                                        <th> Phone </th>
                                        <th> Status </th>
                                        <th> Total </th>
                                        <th> Action </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders as $order)
                                    <tr>
                                        <td>
                                           <form id="action">
                                                <input type="checkbox" name="check_action" value="{{ $order->id }}" class="check">
                                        </td>
                                        <td> {{ $order->buyer_name }} </td>
                                        <td> {{ $order->buyer_email }} </td>
                                        <td> {{ $order->buyer_phone_number }} </td>
                                        <td> {{ $order->order_status }} </td>
                                        <td> {{ $order->total }} </td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ url('/dashboard/orders/'.$order->id.'/edit') }}" class="btn btn-info btn-sm btn-4 edit">Edit</a>
                                                <a href="javascript:;" class="btn btn-danger btn-sm btn-6 delete" data-id="{{ $order->id }}" >Delete</a>
                                                <a href="{{ url('/dashboard/orders/'.$order->id.'/detail') }}" class="btn btn-sm btn-success button-4">Detail</a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </form>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
                       
    </div>
    <!-- END CONTENT BODY -->

    <div class="modal fade bs-example-modal-sm" id="modalDeleteOrder" tabindex="-1" role="dialog" aria-labelledby="deleteOrderModalLabel">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Delete Order</h4>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('/dashboard/orders/delete') }}" id="formDeleteOrder" method="post">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <input type="hidden" name="id" class="form-control" id="id">
                            <p><b>Yakin ingin menghapus data ini ???</b></p>
                    </div>
                    <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    
@endsection

@section('javascript')
    
    <script src="{{ url('/backend/assets/iCheck/icheck.js') }}" type="text/javascript"></script>

    <script type="text/javascript" src="{{ url('/backend/assets/global/plugins/moment.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('/backend/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js') }}"></script>  
    
    <script type="text/javascript">
        
        $('.delete').on('click', function(){
            var id = $(this).data("id");
            var $form = $("#formDeleteOrder");

            $form.find("#id").val(id);

            $("#modalDeleteOrder").modal({
                "show"      : true,
                "backdrop"  : "static"
            });

        });

        function setDaterangepicker(id){

            $(id).daterangepicker({
                locale: {
                    format: 'YYYY-MM-DD'
                },
                singleDatePicker: true,
                singleClasses: "picker_1",
                  showDropdowns: true,
                }, function(start, end, label) {
                  console.log(start.toISOString(), end.toISOString(), label);
            });

        }

        $('#filter').on('change', function(){

            var filter = $(this).val();

            if (filter=="date") {

                $('.search').replaceWith(" <input type='text' class='form-control search' name='search' id='date' placeholder='Search for...'> ");

                setDaterangepicker("#date");


            }else{
                
                $('.search').replaceWith(" <input type='text' class='form-control search' name='search' id='search' placeholder='Search for...'> ");
            }

        });

        $('input').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
            increaseArea: '20%' // optional
        });

        function checkAll(ele) {
            var checkboxes = document.getElementsByTagName('input');
            if (ele.checked) {
                for (var i = 0; i < checkboxes.length; i++) {
                    if (checkboxes[i].type == 'checkbox') {
                    checkboxes[i].checked = true;
                }}
                console.log(10);
            
            } else {
                for (var i = 0; i < checkboxes.length; i++) {
                    console.log(i)
                    if (checkboxes[i].type == 'checkbox') {
                        checkboxes[i].checked = false;
                    }
                }
            }
        }

        $(function () {
            var checkAll = $('input.all');
            var checkboxes = $('input.check');

            checkAll.on('ifChecked ifUnchecked', function(event) {        
                if (event.type == 'ifChecked') {
                    checkboxes.iCheck('check');
                } else {
                    checkboxes.iCheck('uncheck');
                }
            });

            checkboxes.on('ifChanged', function(event){
                if(checkboxes.filter(':checked').length == checkboxes.length) {
                        document.getElementById("check_all").checked = true;
                } else {
                    document.getElementById("check_all").checked = false;
                }
                checkAll.iCheck('update');
            });
        });

        $('#delete_check').on('click', function(){

            var $form = $('form#action');
            var id = $form.serializeArray();
            var url = "{{ url('/dashboard/orders/delete_check') }}";
            var orders = "{{ url('/dashboard/orders') }}";
            var arrayId = []; 

            if (id!="") {

                $(this).button('loading');

                $.each(id, function(i, v){
                    arrayId.push(v.value);
                });

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type:'POST',
                    url:url,
                    data:{idOrder : arrayId},
                    success:function(data){
                        $(this).button('reset');
                        window.location = orders;
                    }
                });

            }

        });

    </script>

@stop
