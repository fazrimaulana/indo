@extends('layouts.backend.app')

@section('css')
    
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="{{ url('/backend/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('/backend/assets/pages/css/profile.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->

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
                <a href="{{ url('/dashboard/frontpage/slideshow') }}">Slideshow</a>
                <i class="fa fa-circle"></i>                                           
            </li>
            <li>
                <span>Add</span>
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

    <!-- END PAGE HEADER-->
    <div class="row">
        <div class="col-md-10">
            <!-- BEGIN PROFILE CONTENT -->

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

            <div class="profile-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="portlet light ">
                            <div class="portlet-title tabbable-line">
                                <div class="caption caption-md">
                                    <i class="icon-globe theme-font hide"></i>
                                    <span class="caption-subject font-blue-madison bold uppercase">Add Slideshow</span>
                                </div>
                                <ul class="nav nav-tabs">
                                    <li>
                                        <a href="{{ url('/dashboard/frontpage/slideshow') }}">Slideshow</a>
                                    </li>
                                    <li class="active">
                                        <a href="{{ url('/dashboard/frontpage/slideshow/add') }}">Add Slideshow</a>
                                    </li>
                                    <!-- <li>
                                        <a href="#tab_1_3" data-toggle="tab">Change Password</a>
                                    </li> -->
                                </ul>
                            </div>
                            <div class="portlet-body">
                                <div class="tab-content">
                                    <form method="post" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label class="control-label">Title</label>
                                            <input type="text" class="form-control" name="title" placeholder="Title..." />
                                        </div>
                                        <div class="form-group">
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                    <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> 
                                                </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                <div>
                                                    <span class="btn default btn-file">
                                                    <span class="fileinput-new"> Select image </span>
                                                    <span class="fileinput-exists"> Change </span>
                                                    <input type="file" name="image" accept="image/*"> </span>
                                                    <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                </div>
                                            </div>
                                            <div class="clearfix margin-top-10">
                                                                        
                                            </div>
                                        </div>
                                        <div class="margin-top-10">
                                            <button type="submit" class="btn green"> Save </a>
                                            <!-- <a href="javascript:;" class="btn default"> Cancel </a> -->
                                        </div>
                                    </form>                            
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

@stop