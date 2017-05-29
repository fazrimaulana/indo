@extends('layouts.backend.app')

@section('css')
    
    <link rel="stylesheet" type="text/css" href="{{ url('/backend/assets/iCheck/skins/square/blue.css') }}">

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
                    <a href="{{ url('/dashboard/users') }}">Users</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>Edit User</span>
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
                            <i class="fa fa-user font-green"></i>
                            <span class="caption-subject font-green bold uppercase">{{ $user->name }}</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        
                        <form action="{{ url('/dashboard/users/'.$user->id.'/edit') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                        {{ csrf_field() }}

                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-2 control-label">Username <span class="required"> * </span></label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" placeholder="Username" name="username" value="{{ $user->username }}">
                                    @if($errors->has('username'))
                                        <span class="help-block"> 
                                            <strong style="color: red;"> {{ $errors->first('username') }} </strong> 
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-2 control-label">Name <span class="required"> * </span></label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" placeholder="Name" name="name" value="{{ $user->name }}">
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
                                <label class="col-md-2 control-label">Date of Birth</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" placeholder="Date of Birth" name="date_of_birth" id="date_of_birth" value="{{ $user->date_of_birth }}">
                                    @if($errors->has('date_of_birth'))
                                        <span class="help-block"> 
                                            <strong style="color: red;"> {{ $errors->first('date_of_birth') }} </strong> 
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-2 control-label">Gender <span class="required"> * </span></label>
                                <div class="col-md-10">
                                    <input type="radio" name="gender" value="laki-laki" 

                                        @if($user->gender=="laki-laki")
                                            checked
                                        @endif

                                     > Laki-Laki
                                    <input type="radio" name="gender" value="perempuan" 

                                        @if($user->gender=="perempuan")
                                            checked
                                        @endif

                                     > Perempuan
                                    @if($errors->has('gender'))
                                        <span class="help-block"> 
                                            <strong style="color: red;"> {{ $errors->first('gender') }} </strong> 
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-2 control-label">No Handphone</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" placeholder="No Handphone" name="no_hp" value="{{ $user->no_hp }}">
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
                                <label class="col-md-2 control-label">Email <span class="required"> * </span></label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" placeholder="Email" name="email" value="{{ $user->email }}">
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
                                <label class="col-md-2 control-label">Address</label>
                                <div class="col-md-10">
                                    <textarea name="address" class="form-control" placeholder="Address">{{ $user->address }}</textarea>
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
                                <label class="col-md-2 control-label">Role <span class="required"> * </span></label>
                                <div class="col-md-10">
                                    <select name="role" class="form-control">
                                        <option value="">None</option>
                                        @foreach($roles as $role)
                                            <option value="{{ $role->id }}"

                                                @foreach($user->roles as $roleUser)
                                                    @if($roleUser->id == $role->id)
                                                        selected
                                                    @endif
                                                @endforeach

                                            >{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('role'))
                                        <span class="help-block"> 
                                            <strong style="color: red;"> {{ $errors->first('role') }} </strong> 
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        @if($user->photo!=null)
                            <img src="{{ url($user->photo) }}" class="img-responsive img-thumbnail" style="width: 300px;height: 200px;">
                            <br /><br />
                        @endif

                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-2 control-label">Photo</label>
                                <div class="col-md-10">
                                    <input type="file" class="form-control" name="image" accept="image/*">
                                    @if($errors->has('image'))
                                        <span class="help-block"> 
                                            <strong style="color: red;"> {{ $errors->first('image') }} </strong> 
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-2 col-md-8">
                                    <button type="submit" class="btn green">Update</button>
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

    <script type="text/javascript">
        
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });

        $('#date_of_birth').daterangepicker({
            autoUpdateInput: false,
            locale: {
                format: 'YYYY-MM-DD',
                cancelLabel: 'Clear'
              },
              singleDatePicker: true,
              singleClasses: "picker_1",
              showDropdowns: true,
            }, function(start, end, label) {
              console.log(start.toISOString(), end.toISOString(), label);
        });

        $('#date_of_birth').on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('YYYY-MM-DD'));
        });

    </script>
    
@stop