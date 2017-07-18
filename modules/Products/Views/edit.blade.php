@extends('layouts.backend.app')

@section('css')
    
    <link rel="stylesheet" type="text/css" href="{{ url('/backend/assets/iCheck/skins/square/blue.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ url('/backend/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ url('/backend/assets/global/plugins/dropzone/dropzone.min.css') }}">

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
                    <a href="{{ url('/dashboard/products') }}">Products</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>Edit Product</span>
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
            <div class="col-md-11">
                <!-- BEGIN SAMPLE TABLE PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-folder font-green"></i>
                            <span class="caption-subject font-green bold uppercase">Picture Product {{ $product->name }}</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        
                        <div class="mt-element-card mt-element-overlay">
                            <div class="row">
                                @foreach($product->gallery as $gallery)
                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                    <div class="mt-card-item">
                                        <div class="mt-card-avatar mt-overlay-4">
                                            <img src="{{ url($gallery->path) }}" style="height: 210px; width: 210px;

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
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-11">
                <!-- BEGIN SAMPLE TABLE PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-folder font-green"></i>
                            <span class="caption-subject font-green bold uppercase">Edit Product {{ $product->name }}</span>
                        </div>
                    </div>
                    <div class="portlet-body">

                        <form action="{{ url('/dashboard/products/'.$product->id.'/edit') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                        {{ csrf_field() }}
                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-2 control-label">Name <span class="required"> * </span></label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" placeholder="Name" name="name" value="{{ $product->name }}">
                                    @if($errors->has('name'))
                                        <span class="help-block"> 
                                            <strong style="color: red;"> {{ $errors->first('name') }} </strong> 
                                        </span>
                                    @endif
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
                                    <select class="form-control" name="category">
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" 

                                                @if($category->id == $product->category_id)
                                                    selected
                                                @endif

                                             >{{ title_case($category->name) }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('category'))
                                        <span class="help-block"> 
                                            <strong style="color: red;"> {{ $errors->first('category') }} </strong> 
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-2 control-label">Variants Product</label>
                                <div class="col-md-3">
                                    <select class="form-control" name="parent_id">
                                        <option value="0">None</option>
                                        @foreach($productParent as $parent)
                                            <option value="{{ $parent->id }}" 

                                                @if($parent->id == $product->parent_id)
                                                    selected
                                                @endif

                                             >{{ title_case($parent->name) }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('parent_id'))
                                        <span class="help-block"> 
                                            <strong style="color: red;"> {{ $errors->first('parent_id') }} </strong> 
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-2 control-label">Condition <span class="required"> * </span></label>
                                <div class="col-md-10">
                                    <input type="radio" class="form-control" name="condition" value="Baru" 

                                        @if($product->condition=="Baru")
                                            checked
                                        @endif

                                     > Baru &nbsp&nbsp&nbsp
                                    <input type="radio" class="form-control" name="condition" value="Bekas" 

                                        @if($product->condition=="Bekas")
                                            checked
                                        @endif

                                     > Bekas
                                    @if($errors->has('condition'))
                                        <span class="help-block"> 
                                            <strong style="color: red;"> {{ $errors->first('condition') }} </strong> 
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-2 control-label">Weight <span class="required"> * </span></label>
                                <div class="col-md-3">
                                    <input type="number" class="form-control" placeholder="Weight" name="weight" min="1" value="{{ $product->weight }}">
                                    @if($errors->has('weight'))
                                        <span class="help-block"> 
                                            <strong style="color: red;"> {{ $errors->first('weight') }} </strong> 
                                        </span>
                                    @endif
                                </div>
                                <label class="control-label">Gram</label>
                            </div>
                        </div>

                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-2 control-label">Stock <span class="required"> * </span></label>
                                <div class="col-md-3">
                                    <input type="number" class="form-control" placeholder="Stock" name="stok" min="1" value="{{ $product->stok }}">
                                    @if($errors->has('stok'))
                                        <span class="help-block"> 
                                            <strong style="color: red;"> {{ $errors->first('stok') }} </strong> 
                                        </span>
                                    @endif
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
                                    <input type="number" class="form-control" placeholder="Price" name="price" min="0" style="width: 92%;" value="{{ $product->price }}">
                                    @if($errors->has('price'))
                                        <span class="help-block"> 
                                            <strong style="color: red;"> {{ $errors->first('price') }} </strong> 
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-2 control-label">Picture</label>
                                <div class="col-md-10">
                                    <div class="dropzone" id="myAwesomeDropzone">
                    
                                    </div>
                                    @if($errors->has('picture'))
                                        <span class="help-block"> 
                                            <strong style="color: red;"> {{ $errors->first('picture') }} </strong> 
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-2 control-label">Description <span class="required"> * </span></label>
                                <div class="col-md-10">
                                    <textarea name="description" class="form-control" placeholder="description" rows="8">{{ $product->description }}</textarea>
                                    @if($errors->has('description'))
                                        <span class="help-block"> 
                                            <strong style="color: red;"> {{ $errors->first('description') }} </strong> 
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-2 control-label">Discount</label>
                                <div class="col-md-3">
                                    <input type="number" class="form-control" placeholder="Discount" name="discount" min="0" value="{{ $product->discount }}">
                                    @if($errors->has('discount'))
                                        <span class="help-block"> 
                                            <strong style="color: red;"> {{ $errors->first('discount') }} </strong> 
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-2 control-label">Start Time Discount</label>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" placeholder="Start Time Discount" name="start_time_discount" id="start" value="{{ $product->start_time_discount }}">
                                    @if($errors->has('start_time_discount'))
                                        <span class="help-block"> 
                                            <strong style="color: red;"> {{ $errors->first('start_time_discount') }} </strong> 
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-2 control-label">End Time Discount</label>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" placeholder="end Time Discount" name="end_time_discount" id="end" value="{{ $product->end_time_discount }}">
                                    @if($errors->has('end_time_discount'))
                                        <span class="help-block"> 
                                            <strong style="color: red;"> {{ $errors->first('end_time_discount') }} </strong> 
                                        </span>
                                    @endif
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
                                    <textarea name="custom" class="form-control" placeholder="custom" rows="8">@if($custom!=null)@foreach($custom->prefix as $prefix){{ $prefix }} @endforeach @endif</textarea>
                                    @if($errors->has('custom'))
                                        <span class="help-block"> 
                                            <strong style="color: red;"> {{ $errors->first('custom') }} </strong> 
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div id="show">
              
                        </div>

                        <input type="hidden" name="set_utama" class="last_click" value="0">

                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-2 col-md-10">
                                    <div class="pull-right">
                                        <button type="submit" class="btn green">Update</button>
                                        <a href="{{ url('/dashboard/products') }}" class="btn btn-default">Cancel</a>
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

    <script type="text/javascript" src="{{ url('/backend/assets/global/plugins/moment.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('/backend/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js') }}"></script>  

    <script type="text/javascript" src="{{ url('/backend/assets/global/plugins/dropzone/dropzone.min.js') }}"></script>  

    <script type="text/javascript">
        
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });

        $('#start').daterangepicker({
            locale: {
                format: 'YYYY-MM-DD HH:mm:ss'
              },
              singleDatePicker: true,
              singleClasses: "picker_1",
              showDropdowns: true,
              timePicker: true,
              timePickerSeconds: true,
              timePicker24Hour: true,
            }, function(start, end, label) {
              console.log(start.toISOString(), end.toISOString(), label);
        });

        $('#end').daterangepicker({
            locale: {
                format: 'YYYY-MM-DD HH:mm:ss'
              },
              singleDatePicker: true,
              singleClasses: "picker_1",
              showDropdowns: true,
              timePicker: true,
              timePickerSeconds: true,
              timePicker24Hour: true,
            }, function(start, end, label) {
              console.log(start.toISOString(), end.toISOString(), label);
        });

        Dropzone.options.myAwesomeDropzone = {
            url:"{{ url('/dashboard/products/galleries/add') }}",
            acceptedFiles:"image/*",
            parallelUploads: 1,
            addRemoveLinks: true,
            dictRemoveFile: "Delete",
            init: function() {
                myDropzone = this; 
            },
            sending: function(file, xhr, formData) {
                formData.append("_token", $('[name=_token').val());
            },
            success: function (file, response) {
                file.previewElement.classList.add("dz-success");
                
                $('#show').append(" <input type='hidden' name='gallery[]' class='"+ response +"' value='"+ response +"' <br />");

                file.previewElement.id = response;

                file._captionLabel = Dropzone.createElement("<a class='dz-remove _"+ response +"' href='javascript:;'>Set Utama</a>");
                file.previewElement.appendChild(file._captionLabel);

                $('._'+response).on('click', function(){
                    var url = "{{ url('/dashboard/products/galleries/') }}";
                    var last_click = $('.last_click').val();
                    $('#'+response).find('.dz-image').css('border', 'solid 5px red');

                    //untuk proses update data last click and new click send last click and response to controller
                    //lalu rubah last_click menjadi 0 dan response menjadi 1 di database nya
                    $.get(url+"/"+last_click+"/set_utama/"+response, function(data){
                        if (last_click!="0") {
                            $('.last_click').val(data);
                            $('#'+last_click).find('.dz-image').css('border', 'none');
                            $('#'+response).find('.dz-image').css('border', 'solid 5px red');
                        }
                        else
                        {
                            $('.last_click').val(data);
                        }
                    });

                });

            },
            removedfile: function (file){
                var id = file.previewElement.id;

                var last_click = $('.last_click').val();
                if (last_click == id) {
                    $('.last_click').val('0');
                }

                $('.'+id).remove();

                var url = "{{ url('dashboard/products/galleries/delete') }}";
                var formData = {
                    _token  : $('meta[name="csrf-token"]').attr('content'),
                    id      : id
                };

                $.ajax({
                    type : "DELETE",
                    url  : url,
                    data : formData
                    /*success: function(data){
                        console.log(data)
                    },  
                    error: function(data){
                        console.log('Error : '+data)
                    }*/
                });

                var _ref;
                return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;

            },
            error: function (file, response) {
                file.previewElement.classList.add("dz-error");
            }

        };

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