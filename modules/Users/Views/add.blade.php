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
                    <a href="{{ url('/dashboard/users') }}">Users</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>Add User</span>
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
                <!-- BEGIN SAMPLE TABLE PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-user font-green"></i>
                            <span class="caption-subject font-green bold uppercase">Users</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        
                        <form action="{{ url('/dashboard/users/add') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                        {{ csrf_field() }}

                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-2 control-label">Name <span class="required"> * </span></label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" placeholder="Name" name="name" value="{{ old('name') }}">
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
                                <label class="col-md-2 control-label">Email <span class="required"> * </span></label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}">
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
                                <label class="col-md-2 control-label">Gender <span class="required"> * </span></label>
                                <div class="col-md-10">
                                    <input type="radio" name="gender" value="laki-laki"> Laki-Laki
                                    <input type="radio" name="gender" value="perempuan"> Perempuan
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
                                <label class="col-md-2 control-label">Username <span class="required"> * </span></label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" placeholder="Username" name="username" value="{{ old('username') }}">
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
                                <label class="col-md-2 control-label">Password <span class="required"> * </span></label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" placeholder="Password" name="password">
                                    @if($errors->has('password'))
                                        <span class="help-block"> 
                                            <strong style="color: red;"> {{ $errors->first('password') }} </strong> 
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
                                            <option value="{{ $role->id }}">{{ title_case($role->name) }}</option>
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

    <script type="text/javascript">
        
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });

    </script>
    
@stop