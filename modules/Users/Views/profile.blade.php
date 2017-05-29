@extends('layouts.backend.app')

@section('css')
    
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="{{ url('/backend/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('/backend/assets/pages/css/profile.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->
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
                                    <a href="{{ url('/home') }}">Home</a>
                                    <i class="fa fa-circle"></i>
                                </li>
                                <li>
                                    <a href="{{ url('/dashboard/users') }}">Users</a>
                                    <i class="fa fa-circle"></i>
                                </li>
                                <li>
                                    <span>Profile</span>
                                </li>
                            </ul>
                            <div class="page-toolbar">
                                
                            </div>
                        </div>
                        <!-- END PAGE BAR -->
                        <!-- BEGIN PAGE TITLE-->
                        <h1 class="page-title"> Profile
                        </h1>
                        <!-- END PAGE TITLE-->

                        @if (session('status_success'))
                            <div class="alert alert-info" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <li><strong>{{ session('status_success') }}</strong></li>
                            </div>
                        @endif

                        <!-- END PAGE HEADER-->
                        <div class="row">
                            <div class="col-md-12">
                                <!-- BEGIN PROFILE SIDEBAR -->
                                <div class="profile-sidebar">
                                    <!-- PORTLET MAIN -->
                                    <div class="portlet light profile-sidebar-portlet ">
                                        <!-- SIDEBAR USERPIC -->
                                        <div class="profile-userpic">
                                            @if($user->photo==null)
                                                <img src="{{ url('/backend/assets/pages/media/profile/profile_user.jpg') }}" class="img-responsive" alt=""> </div>
                                            @else
                                                <img src="{{ url($user->photo) }}" class="img-responsive" alt="" style="height: 150px; width: 150px;"> </div>
                                            @endif
                                        <!-- END SIDEBAR USERPIC -->
                                        <!-- SIDEBAR USER TITLE -->
                                        <div class="profile-usertitle">
                                            <div class="profile-usertitle-name"> {{ $user->name }} </div>
                                            <div class="profile-usertitle-job"> 

                                                @foreach($user->roles as $role)
                                                    {{ $role->display_name }},&nbsp
                                                @endforeach

                                            </div>
                                        </div>
                                        <!-- END SIDEBAR USER TITLE -->
                                        <!-- SIDEBAR MENU -->
                                        <div class="profile-usermenu">
                                            <ul class="nav">
                                                <li class="active">
                                                    <a href="{{ url('/dashboard/users/profile') }}">
                                                        <i class="icon-settings"></i> Account Settings </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- END MENU -->
                                    </div>
                                    <!-- END PORTLET MAIN -->
                                    
                                </div>
                                <!-- END BEGIN PROFILE SIDEBAR -->
                                <!-- BEGIN PROFILE CONTENT -->
                                <div class="profile-content">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="portlet light ">
                                                <div class="portlet-title tabbable-line">
                                                    <div class="caption caption-md">
                                                        <i class="icon-globe theme-font hide"></i>
                                                        <span class="caption-subject font-blue-madison bold uppercase">Profile Account</span>
                                                    </div>
                                                    <ul class="nav nav-tabs">
                                                        <li class="active">
                                                            <a href="#tab_1_1" data-toggle="tab">Personal Info</a>
                                                        </li>
                                                        <li>
                                                            <a href="#tab_1_2" data-toggle="tab">Change Avatar</a>
                                                        </li>
                                                        <li>
                                                            <a href="#tab_1_3" data-toggle="tab">Change Password</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="portlet-body">
                                                    <div class="tab-content">
                                                        <!-- PERSONAL INFO TAB -->
                                                        <div class="tab-pane active" id="tab_1_1">
                                                            <form action="{{ url('/dashboard/users/'.$user->id.'/edit') }}" enctype="multipart/form-data" method="post">
                                                            {{ csrf_field() }}
                                                                <div class="form-group">
                                                                    <label class="control-label">Username</label>
                                                                    <input type="text" class="form-control" value="{{ $user->username }}" name="username" /> 
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label">Name</label>
                                                                    <input type="text" class="form-control" value="{{ $user->name }}" name="name" /> 
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label">Date of Birth</label>
                                                                    <input type="text" class="form-control" value="{{ $user->date_of_birth }}" id="date_of_birth" name="date_of_birth" /> 
                                                                </div>                            
                                                                <div class="form-group">
                                                                    <label class="control-label">Gender</label><br />
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
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label">No HP</label>
                                                                    <input type="text" class="form-control" value="{{ $user->no_hp }}" name="no_hp" /> 
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label">Email</label>
                                                                    <input type="text" class="form-control" value="{{ $user->email }}" name="email" /> 
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label">Address</label>
                                                                    <textarea name="address" class="form-control">{{ $user->address }}</textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label">Role</label>
                                                                     <select name="role" class="form-control">
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
                                                                </div>
                                                                <div class="form-group" style="display: none;">
                                                                    <label class="control-label">Photo</label>
                                                                    <input type="file" accept="image/*" class="form-control" name="image" /> 
                                                                </div>                                   
                                                                <div class="margiv-top-10">
                                                                    <button type="submit" class="btn green"> Save Changes </button>
                                                                    <!-- <a href="javascript:;" class="btn default"> Cancel </a> -->
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <!-- END PERSONAL INFO TAB -->
                                                        <!-- CHANGE AVATAR TAB -->
                                                        <div class="tab-pane" id="tab_1_2">
                                                            <form action="{{ url('/dashboard/users/'.$user->id.'/change-photo') }}" method="post" enctype="multipart/form-data">
                                                            {{ csrf_field() }}
                                                                <div class="form-group">
                                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                        <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                                            <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> </div>
                                                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                                        <div>
                                                                            <span class="btn default btn-file">
                                                                                <span class="fileinput-new"> Select image </span>
                                                                                <span class="fileinput-exists"> Change </span>
                                                                                <input type="file" name="image"> </span>
                                                                            <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="clearfix margin-top-10">
                                                                        
                                                                    </div>
                                                                </div>
                                                                <div class="margin-top-10">
                                                                    <button type="submit" class="btn green"> Submit </a>
                                                                    <!-- <a href="javascript:;" class="btn default"> Cancel </a> -->
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <!-- END CHANGE AVATAR TAB -->
                                                        <!-- CHANGE PASSWORD TAB -->
                                                        <div class="tab-pane" id="tab_1_3">
                                                            <form action="{{ url('/dashboard/users/'.$user->id.'/change-password') }}" method="post">
                                                            {{ csrf_field() }}
                                                                <div class="form-group">
                                                                    <label class="control-label">Current Password</label>
                                                                    <input type="password" class="form-control" name="current_password" /> </div>
                                                                <div class="form-group">
                                                                    <label class="control-label">New Password</label>
                                                                    <input type="password" class="form-control" name="new_password" /> </div>
                                                                <div class="margin-top-10">
                                                                    <button type="submit" class="btn green"> Change Password </button>
                                                                    <!-- <a href="javascript:;" class="btn default"> Cancel </a> -->
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <!-- END CHANGE PASSWORD TAB -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END PROFILE CONTENT -->
                            </div>
                        </div>
                    </div>
                    <!-- END CONTENT BODY -->

@endsection

@section('javascript')
    
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="{{ url('/backend/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js') }}" type="text/javascript"></script>
    <script src="{{ url('/backend/assets/global/plugins/jquery.sparkline.min.js') }}" type="text/javascript"></script>
    <script src="{{ url('/backend/assets/pages/scripts/profile.min.js') }}" type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->

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