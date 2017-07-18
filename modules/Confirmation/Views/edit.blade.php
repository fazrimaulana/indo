@extends('layouts.backend.app')

@section('css')
    
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
                    <a href="{{ url('/dashboard/confirmations') }}">Confirmation</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>Edit Confirmation</span>
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
            <div class="col-md-10">

                @if (session('status'))
                <div class="alert alert-info" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                        <li><strong>{{ session('status') }}</strong></li>
                </div>
            @endif

        @if (session('status_failed'))
                <div class="alert alert-danger" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                        <li><strong>{{ session('status_failed') }}</strong></li>
                </div>
        @endif

                <!-- BEGIN SAMPLE TABLE PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-thumb-tack font-green"></i>
                            <span class="caption-subject font-green bold uppercase">Edit Confirmation</span>
                        </div>
                    </div>
                    <div class="portlet-body">

                        <form method="post" enctype="multipart/form-data" class="form-horizontal">
                        {{ csrf_field() }}

                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Order Code <span class="required"> * </span></label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" placeholder="Order Code" name="code" value="{{ $confirmation->order->code }}">
                                    @if($errors->has('code'))
                                        <span class="help-block"> 
                                            <strong style="color: red;"> {{ $errors->first('code') }} </strong> 
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Confirmation Name <span class="required"> * </span></label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" placeholder="Confirmation Name" name="confirmation_name" value="{{ $confirmation->confirmation_name }}">
                                    @if($errors->has('confirmation_name'))
                                        <span class="help-block"> 
                                            <strong style="color: red;"> {{ $errors->first('confirmation_name') }} </strong> 
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div> 

                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Bank to <span class="required"> * </span></label>
                                <div class="col-md-9">
                                    <select name="bank_to" class="form-control">
                                        @foreach($banks as $bank)
                                            <option value="{{ $bank->id }}" @if($bank->id==$confirmation->bank_to) selected @endif >{{ $bank->name }} - {{ $bank->code }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('bank_to'))
                                        <span class="help-block"> 
                                            <strong style="color: red;"> {{ $errors->first('bank_to') }} </strong> 
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Bank from <span class="required"> * </span></label>
                                <div class="col-md-9">
                                    <select name="bank_from" class="form-control">
                                        @foreach($banks as $bank)
                                            <option value="{{ $bank->id }}" @if($bank->id==$confirmation->bank_from) selected @endif>{{ $bank->name }} - {{ $bank->code }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('bank_from'))
                                        <span class="help-block"> 
                                            <strong style="color: red;"> {{ $errors->first('bank_from') }} </strong> 
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Account Bank No <span class="required"> * </span></label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" placeholder="Account Bank No" name="account_bank_no" value="{{ $confirmation->account_bank_no }}">
                                    @if($errors->has('account_bank_no'))
                                        <span class="help-block"> 
                                            <strong style="color: red;"> {{ $errors->first('account_bank_no') }} </strong> 
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div> 

                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Account Name <span class="required"> * </span></label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" placeholder="Account Name" name="account_name" value="{{ $confirmation->account_name }}">
                                    @if($errors->has('account_name'))
                                        <span class="help-block"> 
                                            <strong style="color: red;"> {{ $errors->first('account_name') }} </strong> 
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Transfer Amount <span class="required"> * </span></label>
                                <div class="col-md-9">
                                    <input type="number" class="form-control" placeholder="Transfer Amount" name="transfer_amount" value="{{ $confirmation->transfer_amount }}">
                                    @if($errors->has('transfer_amount'))
                                        <span class="help-block"> 
                                            <strong style="color: red;"> {{ $errors->first('transfer_amount') }} </strong> 
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>                      

                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Photo</label>
                                <div class="col-md-9">
                                    @if($confirmation->transfer_img!=null)
                                        <img src="{{ url($confirmation->transfer_img) }}" alt="" style="width: 200px; height: 200px;">
                                    @else
                                        <img src="{{ url('/frontend/images/empty.jpg') }}" alt="" style="width: 200px; height: 200px;">
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-3 control-label"></label>
                                <div class="col-md-9">
                                    <input type="file" class="form-control" name="image" accept="image/*">
                                    @if($errors->has('image'))
                                        <span class="help-block"> 
                                            <strong style="color: red;"> {{ $errors->first('image') }} </strong> 
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Date Transfer <span class="required"> * </span></label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" placeholder="Date Transfer" name="date_transfer" value="{{ $confirmation->date_transfer }}" id="date_transfer">
                                    @if($errors->has('date_transfer'))
                                        <span class="help-block"> 
                                            <strong style="color: red;"> {{ $errors->first('date_transfer') }} </strong> 
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
                                    <div class="pull-right">
                                        <button type="submit" class="btn green">Update</button>
                                        <a href="{{ url('/dashboard/confirmations') }}" class="btn btn-default">Cancel</a>
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

    <script type="text/javascript" src="{{ url('/backend/assets/global/plugins/moment.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('/backend/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js') }}"></script>

    <script type="text/javascript">
        
    $('#date_transfer').daterangepicker({
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

    </script>

@stop