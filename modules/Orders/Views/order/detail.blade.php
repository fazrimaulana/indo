@extends('layouts.backend.app')

@section('csc')
    
    

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
                    <span>Order Detail</span>
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
            <div class="col-md-12">
                <!-- BEGIN SAMPLE TABLE PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-shopping-cart font-green"></i>
                            <span class="caption-subject font-green bold uppercase">Order Detail</span>
                        </div>
                    </div>
                    <div class="portlet-body">

                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="portlet box green">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-shopping-cart"></i>Order Details 
                                        </div>
                                        
                                    </div>
                                    <div class="portlet-body">
                                        <div class="row static-info">
                                            <div class="col-md-5 name"> Order #: </div>
                                            <div class="col-md-7 value">
                                                {{ $order->code }}
                                            </div>
                                        </div>
                                        <div class="row static-info">
                                            <div class="col-md-5 name"> Order Date  </div>
                                            <div class="col-md-7 value"> {{ $order->created_at }} </div>
                                        </div>
                                        <div class="row static-info">
                                            <div class="col-md-5 name"> Courier  </div>
                                            <div class="col-md-7 value"> {{ $order->courier }} </div>
                                        </div>
                                        @php
                                            $service = json_decode($order->service);
                                        @endphp
                                        <div class="row static-info">
                                            <div class="col-md-5 name"> Service  </div>
                                            <div class="col-md-7 value"> {{ $service->service }} </div>
                                        </div>
                                        <div class="row static-info">
                                            <div class="col-md-5 name"> Order Status: </div>
                                            <div class="col-md-7 value">
                                                <span class="label label-success"> {{ $order->order_status }} </span>
                                            </div>
                                        </div>
                                        <div class="row static-info">
                                            <div class="col-md-5 name"> Total: </div>
                                            <div class="col-md-7 value"> Rp. {{ number_format($order->total) }} </div>
                                        </div>
                                        <div class="row static-info">
                                            <div class="col-md-5 name"> Transaction Method: </div>
                                            <div class="col-md-7 value"> {{ $order->transactionMethod->name }} </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="portlet box blue">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-user"></i>Customer Information 
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="row static-info">
                                            <div class="col-md-5 name"> Customer Name: </div>
                                            <div class="col-md-7 value"> {{ $order->buyer_name }} </div>
                                        </div>
                                        <div class="row static-info">
                                            <div class="col-md-5 name"> Email: </div>
                                            <div class="col-md-7 value"> {{ $order->buyer_email }} </div>
                                        </div>
                                        <div class="row static-info">
                                            <div class="col-md-5 name"> State: </div>
                                            <div class="col-md-7 value"> {{ $order->buyer_address }} </div>
                                        </div>
                                        <div class="row static-info">
                                            <div class="col-md-5 name"> Phone Number: </div>
                                            <div class="col-md-7 value"> {{ $order->buyer_phone_number }} </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="portlet green-meadow box">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-shopping-cart"></i>Shopping Cart
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        
                                        <div class="table-scrollable">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th> Product </th>
                                                        <th> Original Price </th>
                                                        <th> Discount </th>
                                                        <th> Discount Amount </th>
                                                        <th> Price </th>
                                                        <th> Quantity </th>
                                                        <th> Total </th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @php

                                                        $totalPurchases = 0;

                                                    @endphp

                                                    @foreach($order->orderDetail as $orderDetail)

                                                    @php

                                                        
                                                        $discountAmount = ($orderDetail->product_price * $orderDetail->discount_price) / 100;

                                                        $price = $orderDetail->product_price - $discountAmount;

                                                        $total = $price * $orderDetail->qty;

                                                        $totalPurchases += $total;

                                                    @endphp

                                                    <tr>
                                                        <td>{{ $orderDetail->product_name }}</td>
                                                        <td>Rp. {{ App\Helpers\Money::setRupiah($orderDetail->product_price) }}</td>
                                                        <td>{{ $orderDetail->discount_price }}%</td>
                                                        <td>Rp. {{ App\Helpers\Money::setRupiah($discountAmount) }}</td>
                                                        <td>Rp. {{ App\Helpers\Money::setRupiah($price) }}</td>
                                                        <td>{{ $orderDetail->qty }}</td>
                                                        <td>Rp. {{ App\Helpers\Money::setRupiah($total) }}</td>
                                                    </tr>

                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4"> </div>
                            <div class="col-md-8">
                                <div class="well">
                                    <div class="row static-info align-reverse">
                                        <div class="col-md-5 name"> Total Purchases: </div>
                                        <div class="col-md-5 value"> 
                                            Rp. {{ App\Helpers\Money::setRupiah($totalPurchases) }}
                                        </div>
                                    </div>
                                    <div class="row static-info align-reverse">
                                        <div class="col-md-5 name"> Shipping Cost: </div>
                                        <div class="col-md-5 value"> 
                                            Rp.  {{ App\Helpers\Money::setRupiah($order->shipping_cost) }}
                                        </div>
                                    </div>
                                    <div class="row static-info align-reverse">
                                        <div class="col-md-5 name"> Total: </div>
                                        <div class="col-md-5 value"> 
                                            Rp. {{ App\Helpers\Money::setRupiah($order->total) }}
                                        </div>
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
