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
                    <span>Add Product</span>
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
                            <span class="caption-subject font-green bold uppercase">Add Product</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        
                        <form action="{{ url('/dashboard/products/add') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                        {{ csrf_field() }}

                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-2 control-label">Name <span class="required"> * </span></label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" placeholder="Name" name="name">
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
                                            <option value="{{ $category->id }}">{{ title_case($category->name) }}</option>
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
                                            <option value="{{ $parent->id }}">{{ title_case($parent->name) }}</option>
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
                                    <input type="radio" class="form-control" name="condition" value="Baru"> Baru &nbsp&nbsp&nbsp
                                    <input type="radio" class="form-control" name="condition" value="Bekas"> Bekas
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
                                    <input type="number" class="form-control" placeholder="Weight" name="weight" min="1">
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
                                    <input type="number" class="form-control" placeholder="Stock" name="stok" value="1" min="1">
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
                                    <input type="number" class="form-control" placeholder="Price" name="price" min="0" value="0" style="width: 92%;">
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
                                <label class="col-md-2 control-label">Description</label>
                                <div class="col-md-10">
                                    <textarea name="description" class="form-control" placeholder="description" rows="8"></textarea>
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
                                    <input type="number" class="form-control" placeholder="Discount" name="discount" min="0" value="0">
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
                                    <input type="text" class="form-control" placeholder="Start Time Discount" name="start_time_discount" id="start" value="<?php echo"".date('Y-m-d H:i:s'); ?>">
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
                                    <input type="text" class="form-control" placeholder="end Time Discount" name="end_time_discount" id="end" value="<?php echo"".date('Y-m-d H:i:s'); ?>">
                                    @if($errors->has('end_time_discount'))
                                        <span class="help-block"> 
                                            <strong style="color: red;"> {{ $errors->first('end_time_discount') }} </strong> 
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-2 control-label">Custom</label>
                                <div class="col-md-10">
                                    <textarea name="custom" class="form-control" placeholder="custom" rows="8"></textarea>
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
                                <div class="col-md-offset-2 col-md-9">
                                    <button type="submit" class="btn green">Simpan</button>
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

    </script>
    
@stop