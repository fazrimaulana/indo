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
                    <a href="{{ url('/dashboard/categories') }}">Categories</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>Details</span>
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
                            <i class="fa fa-thumb-tack font-green"></i>
                            <span class="caption-subject font-green bold uppercase">{{ $category->name }}</span>
                        </div>
                    </div>
                    <div class="portlet-body">

                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#products" role="tab">Product</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#child" role="tab">Child</a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="products" role="tabpanel">
                                <hr>
                                <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Condition</th>
                                            <th>Price</th>
                                            <th>Stok</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($category->product as $product)
                                        <tr>
                                            <td><a href="{{ url('/dashboard/products/'.$product->id.'/detail') }}">{{ $product->name }}</a></td>
                                            <td>{{ $product->condition }}</td>
                                            <td>{{ $product->price }}</td>
                                            <td>{{ $product->stok }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                </div>
                            </div>
                            <div class="tab-pane" id="child" role="tabpanel">
                                
                                @php
                                    use Modules\Categories\Models\Category;
                                    $childCategory = Category::where('parent_id', $category->id)->get();
                                @endphp

                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Slug</th>
                                            <th>Description</th>
                                        </tr>
                                    </thead>    
                                    <tbody>

                                        @foreach($childCategory as $catChild)
                                        <tr>
                                            <td><a href="{{ url('/dashboard/categories/'.$catChild->id.'/detail') }}">__ {{ $catChild->name }}</a></td>
                                            <td>{{ $catChild->slug }}</td>
                                            <td>{{ $catChild->description }}</td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>

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