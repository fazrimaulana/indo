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
                    <a href="{{ url('/dashboard/users') }}">Users</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>Change Password</span>
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
                            <i class="fa fa-lock font-green"></i>
                            <span class="caption-subject font-green bold uppercase">Change Password</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        
                        <form action="{{ url('/dashboard/users/'.$user->id.'/change-password') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                        {{ csrf_field() }}

                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Current Password <span class="required"> * </span></label>
                                <div class="col-md-7">
                                    <input type="password" class="form-control" placeholder="Current Password" name="current_password">
                                    @if($errors->has('current_password'))
                                        <span class="help-block"> 
                                            <strong style="color: red;"> {{ $errors->first('current_password') }} </strong> 
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-3 control-label">New Password <span class="required"> * </span></label>
                                <div class="col-md-7">
                                    <input type="password" class="form-control" placeholder="New Password" name="new_password" >
                                    @if($errors->has('new_password'))
                                        <span class="help-block"> 
                                            <strong style="color: red;"> {{ $errors->first('new_password') }} </strong> 
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-7">
                                    <button type="submit" class="btn green">Change</button>
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

    
    
@stop