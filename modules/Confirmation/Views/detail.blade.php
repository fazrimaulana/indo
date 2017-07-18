@extends('layouts.backend.app')

@section('css')
    

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
                    <a href="{{ url('/dashboard/confirmations') }}">Confirmation</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>Detail Confirmation</span>
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

        <div class="row">
            <div class="col-md-6">
                <!-- BEGIN SAMPLE TABLE PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-thumb-tack font-green"></i>
                            <span class="caption-subject font-green bold uppercase">Detail Confirmation</span>
                        </div>
                    </div>
                    <div class="portlet-body">

                        <div class="row">
                            <div class="col-md-offset-3 col-md-6">
                               @if($confirmation->transfer_img!=null)
                                 <img src="{{ url($confirmation->transfer_img) }}" alt="" style="width: 200px; height: 200px">
                               @else
                                 <img src="{{ url('/frontend/images/empty.jpg') }}" alt="" style="width: 200px; height: 200px">
                               @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                               <label class="control-label">Code Order</label>
                            </div>
                            <div class="col-md-1">
                               <label class="control-label">:</label>
                            </div>
                            <div class="col-md-7">
                               <label class="control-label">{{ $confirmation->order->code }}</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                               <label class="control-label">Confirmation Name</label>
                            </div>
                            <div class="col-md-1">
                               <label class="control-label">:</label>
                            </div>
                            <div class="col-md-7">
                               <label class="control-label">{{ $confirmation->confirmation_name }}</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                               <label class="control-label">Bank to</label>
                            </div>
                            <div class="col-md-1">
                               <label class="control-label">:</label>
                            </div>
                            <div class="col-md-7">
                               <label class="control-label">{{ $confirmation->bankTo->name }}</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                               <label class="control-label">Bank from</label>
                            </div>
                            <div class="col-md-1">
                               <label class="control-label">:</label>
                            </div>
                            <div class="col-md-7">
                               <label class="control-label">{{ $confirmation->bankFrom->name }}</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                               <label class="control-label">No Account Bank </label>
                            </div>
                            <div class="col-md-1">
                               <label class="control-label">:</label>
                            </div>
                            <div class="col-md-7">
                               <label class="control-label">{{ $confirmation->account_bank_no }}</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                               <label class="control-label">Account Name</label>
                            </div>
                            <div class="col-md-1">
                               <label class="control-label">:</label>
                            </div>
                            <div class="col-md-7">
                               <label class="control-label">{{ $confirmation->account_name }}</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                               <label class="control-label">Transfer Amount</label>
                            </div>
                            <div class="col-md-1">
                               <label class="control-label">:</label>
                            </div>
                            <div class="col-md-7">
                               <label class="control-label">Rp. {{ App\Helpers\Money::setRupiah($confirmation->transfer_amount) }}</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                               <label class="control-label">date Transfer</label>
                            </div>
                            <div class="col-md-1">
                               <label class="control-label">:</label>
                            </div>
                            <div class="col-md-7">
                               <label class="control-label">{{ $confirmation->date_transfer }}</label>
                            </div>
                        </div>  

                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <!-- BEGIN SAMPLE TABLE PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-thumb-tack font-green"></i>
                            <span class="caption-subject font-green bold uppercase">Detail Orders</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        
                        <div class="portlet box green">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-shopping-cart"></i>Order Details 
                                </div>
                                <div class="actions">
                                    <!-- <a href="javascript:;" class="btn btn-default btn-sm">
                                    <i class="fa fa-pencil"></i> Edit </a> -->
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="row static-info">
                                    <div class="col-md-5 name"> Order #: </div>
                                    <div class="col-md-7 value">
                                        <a href="{{ url('/dashboard/orders/'.$confirmation->order->id.'/detail') }}">{{ $confirmation->order->code }}</a>
                                    </div>
                                </div>
                                <div class="row static-info">
                                    <div class="col-md-5 name"> Order Date  </div>
                                    <div class="col-md-7 value"> {{ $confirmation->order->created_at }} </div>
                                </div>
                                <div class="row static-info">
                                    <div class="col-md-5 name"> Order Status: </div>
                                    <div class="col-md-7 value">
                                        <span class="label label-success"> {{ $confirmation->order->order_status }} </span>
                                    </div>
                                </div>
                                <div class="row static-info">
                                    <div class="col-md-5 name"> Total: </div>
                                    <div class="col-md-7 value"> Rp. {{ App\Helpers\Money::setRupiah($confirmation->order->total) }} </div>
                                </div>
                                <div class="row static-info">
                                    <div class="col-md-5 name"> Transaction Method: </div>
                                    <div class="col-md-7 value"> {{ $confirmation->order->transactionMethod->name }} </div>
                                </div>

                                <div class="row static-info">
                                    <!-- <div class="col-md-5 name"> Transaction Method: </div> -->
                                    <div class="col-md-offset-5 col-md-7 value">
                                        @if($confirmation->order->order_status == "Menunggu Pembayaran")
                                            <a href="{{ url('/dashboard/confirmations/'. $confirmation->order_id .'/konfirmasi') }}" class="btn btn-sm btn-info">Konfirmasi Pembayaran</a>
                                        @elseif($confirmation->order->order_status == "Konfirmasi Pembayaran")
                                            <a href="{{ url('/dashboard/confirmations/'. $confirmation->order_id .'/selesai') }}" class="btn btn-sm btn-info">Selesai</a>
                                        @endif
                                    </div>
                                </div>

                            </div>
                        </div>
                            
                    </div>
                </div>
            </div>

        </div>
                       
    </div>
    <!-- END CONTENT BODY -->


@endsection

@section('javascript')

    

@stop