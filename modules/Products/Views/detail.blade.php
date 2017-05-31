@extends('layouts.backend.app')

@section('css')
    
    <link rel="stylesheet" type="text/css" href="{{ url('/backend/assets/iCheck/skins/square/blue.css') }}">

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
                    <a href="{{ url('/dashboard/products') }}">Product</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>Detail</span>
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
                            <i class="fa fa-folder font-green"></i>
                            <span class="caption-subject font-green bold uppercase">{{ $product->name }}</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#product" role="tab">Product</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#picture" role="tab">Picture</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#variants" role="tab">Variants</a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="product" role="tabpanel">
                        

                                <form class="form-horizontal">

                                    <div class="form-body">
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Name <span class="required"> * </span></label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" placeholder="Name" name="name" value="{{ $product->name }}" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>
                                    <h4><b>Product Description</b></h4>
                                    <hr>

                                    <div class="form-body">
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Category</label>
                                            <div class="col-md-3">
                                                <select class="form-control" name="category" disabled>
                                                    @foreach($categories as $category)
                                                        <option value="{{ $category->id }}" 

                                                            @if($category->id == $product->category_id)
                                                                selected
                                                            @endif

                                                        >{{ title_case($category->name) }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-body">
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Variants Product</label>
                                            <div class="col-md-3">
                                                <select class="form-control" name="parent_id" disabled>
                                                    <option value="0">None</option>
                                                    @foreach($productParent as $parent)
                                                        <option value="{{ $parent->id }}" 

                                                            @if($parent->id == $product->parent_id)
                                                                selected
                                                            @endif

                                                        >{{ title_case($parent->name) }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-body">
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Condition <span class="required"> * </span></label>
                                            <div class="col-md-10">
                                                {{ $product->condition }}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-body">
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Weight <span class="required"> * </span></label>
                                            <div class="col-md-3">
                                                <input type="number" class="form-control" placeholder="Weight" name="weight" min="1" value="{{ $product->weight }}" readonly>
                                            </div>
                                            <label class="control-label">Gram</label>
                                        </div>
                                    </div>

                                    <div class="form-body">
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Stock <span class="required"> * </span></label>
                                            <div class="col-md-3">
                                                <input type="number" class="form-control" placeholder="Stock" name="stok" min="1" value="{{ $product->stok }}" readonly>
                                            </div>
                                            <label class="control-label">Buah</label>
                                        </div>
                                    </div>

                                    <div class="form-body">
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Price <span class="required"> * </span></label>
                                            <div class="col-md-3 input-group" style="padding-left: 15px;">
                                                <span class="input-group-addon">
                                                    Rp
                                                </span>
                                                <input type="number" class="form-control" placeholder="Price" name="price" min="0" style="width: 92%;" value="{{ $product->price }}" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-body">
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Description</label>
                                            <div class="col-md-10">
                                                <textarea name="description" class="form-control" placeholder="description" rows="8" readonly>{{ $product->description }}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-body">
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Discount</label>
                                            <div class="col-md-3">
                                                <input type="number" class="form-control" placeholder="Discount" name="discount" min="0" value="{{ $product->discount }}" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-body">
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Start Time Discount</label>
                                            <div class="col-md-3">
                                                <input type="text" class="form-control" placeholder="Start Time Discount" name="start_time_discount" id="start" value="{{ $product->start_time_discount }}" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-body">
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">End Time Discount</label>
                                            <div class="col-md-3">
                                                <input type="text" class="form-control" placeholder="end Time Discount" name="end_time_discount" id="end" value="{{ $product->end_time_discount }}" readonly>

                                            </div>
                                        </div>
                                    </div>

                                    @php
                                        $custom=null;
                                        if($product->custom!=null){
                                            $custom = json_decode($product->custom);
                                        } 
                                        @endphp
                                    <div class="form-body">
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Custom</label>
                                            <div class="col-md-10">
                                                <textarea name="custom" class="form-control" placeholder="custom" rows="8" readonly>@if($custom!=null)@foreach($custom->prefix as $prefix){{ $prefix }} @endforeach @endif</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </div>


                            <div class="tab-pane" id="picture" role="tabpanel">

                                <div class="mt-element-card mt-element-overlay">
                            <div class="row">
                                @foreach($product->gallery as $gallery)
                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                    <div class="mt-card-item">
                                        <div class="mt-card-avatar mt-overlay-4">
                                            <img src="{{ url($gallery->path) }}" style="height: 210px; width: 233,5px;

                                                    @if($gallery->pivot->set_utama == 1)
                                                        border: solid 5px red
                                                    @endif

                                            "/>
                                            <div class="mt-overlay">
                                                <h2>{{$gallery->name}}</h2>
                                                <div class="mt-info font-white">
                                                    <div class="mt-card-content">
                                                        <p class="mt-card-desc font-white">Manage Picture</p>
                                                        <div class="mt-card-social">
                                                            <ul>
                                                                <li>
                                                                    <a class="mt-card-btn" href="{{ url('/dashboard/products/'.$product->id.'/set-utama/'.$gallery->id) }}" title="Set Utama">
                                                                        <i class="fa fa-link"></i>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="mt-card-btn deleteProductGallery" href="javascript:;" title="Delete" data-id="{{ $gallery->id }}">
                                                                        <i class="fa fa-trash"></i>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="mt-card-btn" href="{{ url($gallery->path) }}" title="Detail">
                                                                        <i class="fa fa-eye"></i>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>

                            </div>


                            <div class="tab-pane" id="variants" role="tabpanel">

                                <button class="btn btn-sm btn-danger" id="delete_check">Delete</button>

                                <div class="table-scrollable">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th id="checkbox">
                                                    <input type="checkbox" value="" id="check_all" class="all">
                                                </th>
                                                <th>Name</th>
                                                <th>Condition</th>
                                                <th>Price</th>
                                                <th>Stok</th>
                                                <th>Category</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach($variants as $product)
                                                <tr>
                                                    <td>
                                                        <form id="action">
                                                            <input type="checkbox" name="check_action" value="{{ $product->id }}" class="check">
                                                        </form>
                                                    </td>
                                                    <td>{{ $product->name }}</td>
                                                    <td>{{ $product->condition }}</td>
                                                    <td>{{ $product->price }}</td>
                                                    <td>{{ $product->stok }}</td>
                                                    <td>{{ $product->category->name }}</td>
                                                    <td>
                                                        <div class="btn-group">
                                                    
                                                            <a href="{{ url('/dashboard/products/'.$product->id.'/edit') }}" class="btn btn-info btn-sm btn-4 edit" >Edit</a>
                                                            <a class="btn btn-danger btn-sm btn-6 delete" data-id="{{ $product->id }}" >Delete</a>
                                                            <a href="{{ url('/dashboard/products/'.$product->id.'/detail') }}" class="btn btn-sm btn-success button-4">Detail</a>

                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                    {{ $variants->render() }}
                                </div>
                                
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
                       
    </div>
    <!-- END CONTENT BODY -->

    <div class="modal fade bs-example-modal-sm" id="modalDeleteProduct" tabindex="-1" role="dialog" aria-labelledby="deleteProductModalLabel">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Delete Product</h4>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('/dashboard/products/delete') }}" id="formDeleteProduct" method="post">
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

        <div class="modal fade bs-example-modal-sm" id="modalDeleteProductGallery" tabindex="-1" role="dialog" aria-labelledby="deleteProductGalleryModalLabel">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Delete Picture</h4>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('/dashboard/products/delete/gallery') }}" id="formDeleteProductGallery" method="post">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <input type="hidden" name="id_product" class="form-control" id="id_product" value="{{ $product->id }}">
                            <input type="hidden" name="id_gallery" class="form-control" id="id_gallery">
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

    <script type="text/javascript">       

        $('.delete').on('click', function(){
            var id = $(this).data("id");
            var $form = $("#formDeleteProduct");

            $form.find("#id").val(id);

            $("#modalDeleteProduct").modal({
                "show"      : true,
                "backdrop"  : "static"
            });

        });

        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
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
            var url = "{{ url('/dashboard/products/delete-check') }}";
            var products = "{{ url()->current() }}";
            var arrayId = []; 

            if (id != "") {

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
                    data:{idproduct : arrayId},
                    success:function(data){
                        window.location = products;
                    }
                });

            }

        });

        $('.deleteProductGallery').on('click', function(){

            var id = $(this).data("id");
            var $form = $('#formDeleteProductGallery');

            $form.find('#id_gallery').val(id);

            $('#modalDeleteProductGallery').modal({

                "show" : true,
                "backdrop" : "static"

            });

        });

    </script>    

@stop