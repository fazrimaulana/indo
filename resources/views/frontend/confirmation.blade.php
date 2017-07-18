@extends('layouts.frontend.app')

@section('css')

     <link rel="stylesheet" type="text/css" href="{{ url('/backend/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.css') }}">

@endsection

@section('content')

	<div class="page-konfirmasi">
        <div class="wr-page-konfirmasi container">

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


           <div class="row">
               <div class="left col-md-offset-2 col-md-8 col-sm-offset-2 col-sm-8">
                   <div class="panel panel-default konfirmasi">
                        <div class="panel-heading">
                            <h3 class="panel-title capslock">konfirmasi</h3>
                        </div>
                        <div class="panel-body">
                            	
                        <form method="post" accept-charset="utf-8" enctype="multipart/form-data" autocomplete="off">
                        {{ csrf_field() }}
                           	<div class="form-group">
	                            <label class="control-label">Kode Order <span class="required"> * </span></label>                                	
	                            <input type="text" class="form-control" placeholder="Kode Order" name="kode_order">
                                @if($errors->has('kode_order'))
	                                <span class="help-block"> 
                                        <strong style="color: red;"> {{ $errors->first('kode_order') }} </strong> 
                                    </span>
                                @endif                                	
	                        </div>

	                        <div class="form-group">
                                <label class="control-label">Nama Konfirmasi <span class="required"> * </span></label>                                   
                                <input type="text" class="form-control" placeholder="Nama Konfirmasi" name="nama_konfirmasi">
                                @if($errors->has('nama_konfirmasi'))
                                    <span class="help-block"> 
                                        <strong style="color: red;"> {{ $errors->first('nama_konfirmasi') }} </strong> 
                                    </span>
                                @endif                                  
                            </div>

                            <div class="form-group">
                                <label class="control-label">Transfer ke Bank <span class="required"> * </span></label>                                   
                                <select class="form-control" name="bank_to">
                                    @foreach($banks as $bank)
                                        <option value="{{ $bank->id }}">{{ $bank->name }} - {{ $bank->code }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('bank_to'))
                                    <span class="help-block"> 
                                        <strong style="color: red;"> {{ $errors->first('bank_to') }} </strong> 
                                    </span>
                                @endif                                  
                            </div>

                            <div class="form-group">
                                <label class="control-label">Dari Bank <span class="required"> * </span></label>                                   
                                <select class="form-control" name="bank_from">
                                    @foreach($banks as $bank)
                                        <option value="{{ $bank->id }}">{{ $bank->name }} - {{ $bank->code }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('bank_from'))
                                    <span class="help-block"> 
                                        <strong style="color: red;"> {{ $errors->first('bank_from') }} </strong> 
                                    </span>
                                @endif                                  
                            </div>

                            <div class="form-group">
                                <label class="control-label">Transfer dari No Rekening <span class="required"> * </span></label>                                   
                                <input type="text" class="form-control" placeholder="Transfer dari No Rekening " name="tf_dari_norek">
                                @if($errors->has('tf_dari_norek'))
                                    <span class="help-block"> 
                                        <strong style="color: red;"> {{ $errors->first('tf_dari_norek') }} </strong> 
                                    </span>
                                @endif                                  
                            </div>

                            <div class="form-group">
                                <label class="control-label">Nama <span class="required"> * </span></label>                                   
                                <input type="text" class="form-control" placeholder="Nama " name="name">
                                @if($errors->has('name'))
                                    <span class="help-block"> 
                                        <strong style="color: red;"> {{ $errors->first('name') }} </strong> 
                                    </span>
                                @endif                                  
                            </div>

                            <div class="form-group">
                                <label class="control-label">Jumlah Transfer <span class="required"> * </span></label>                                   
                                <input type="number" class="form-control" placeholder="Jumlah Transfer" name="jml_transfer">
                                @if($errors->has('jml_transfer'))
                                    <span class="help-block"> 
                                        <strong style="color: red;"> {{ $errors->first('jml_transfer') }} </strong> 
                                    </span>
                                @endif                                  
                            </div>

                            <div class="form-group">
                                <label class="control-label">Bukti Pembayaran <span class="required"> * </span></label>                                   
                                <input type="file" class="form-control" name="image" accept="image/*">
                                @if($errors->has('image'))
                                    <span class="help-block"> 
                                        <strong style="color: red;"> {{ $errors->first('image') }} </strong> 
                                    </span>
                                @endif                                  
                            </div>

                            <div class="form-group">
                                <label class="control-label">Tanggal Transfer <span class="required"> * </span></label>                                   
                                <input type="text" class="form-control" placeholder="Tanggal Transfer " name="tgl_transfer" id="tgl_transfer">
                                @if($errors->has('tgl_transfer'))
                                    <span class="help-block"> 
                                        <strong style="color: red;"> {{ $errors->first('tgl_transfer') }} </strong> 
                                    </span>
                                @endif                                  
                            </div>

	                        <button type="submit" class="btn btn-primary">Konfirmasi</button>

                        </form>

                        </div>
                    </div>
               </div>
               <!-- <div class="right col-md-6 col-sm-6">
                   <div class="panel panel-default status">
                        <div class="panel-heading">
                            <h3 class="panel-title capslock">status order</h3>
                        </div>
                        <div class="panel-body">
                            <div class="list-status">
                                <span class="capslock">nomer resi</span>
                                <p class="capslock">12345678910</p>
                            </div>
                            <div class="list-status">
                                <span class="capslock">status</span>
                                <h4 class="capslock">menunggu pembayaran</h4>
                            </div>
                            <div class="list-status">
                                <span class="capslock">total pembayaran</span>
                                <p class="capital">rp. 300.000</p>
                            </div>
                            <div class="list-status">
                                <span class="capslock">alamat pengiriman</span>
                                <p class="capital">jl.kutilang no.3</p>
                            </div>
                        </div>
                    </div>
               </div> -->
           </div><!--END OF .ROW-->
        </div><!--END OF .WR-CHECKOUT-->
    </div><!--END OF .CHECKOUT-->

@endsection

@section('javascript')
    
    <script type="text/javascript" src="{{ url('/backend/assets/global/plugins/moment.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('/backend/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js') }}"></script>

    <script type="text/javascript">
        
    $('#tgl_transfer').daterangepicker({
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