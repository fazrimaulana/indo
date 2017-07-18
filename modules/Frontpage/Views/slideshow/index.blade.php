@extends('layouts.backend.app')

@section('css')
    
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="{{ url('/backend/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('/backend/assets/pages/css/profile.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->

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
                <span>Slideshow</span>
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

    <!-- END PAGE HEADER-->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN PROFILE CONTENT -->
            <div class="profile-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="portlet light ">
                            <div class="portlet-title tabbable-line">
                                <div class="caption caption-md">
                                    <i class="icon-globe theme-font hide"></i>
                                    <span class="caption-subject font-blue-madison bold uppercase">Slideshow</span>
                                </div>
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a href="{{ url('/dashboard/frontpage/slideshow') }}">Slideshow</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/dashboard/frontpage/slideshow/add') }}">Add Slideshow</a>
                                    </li>
                                    <!-- <li>
                                        <a href="#tab_1_3" data-toggle="tab">Change Password</a>
                                    </li> -->
                                </ul>
                            </div>
                            <div class="portlet-body">
                                <div class="tab-content">
                                    
                                    <div class="pull-right">
                                        <button class="btn btn-sm btn-danger" id="delete_check" data-loading-text="Loading...">Delete</button>
                                    </div>

                                    <br /><br />

                                	<div class="table-scrollable">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th id="checkbox">
                                                        <input type="checkbox" value="" id="check_all" class="all">
                                                    </th>
                                                    <th>Image</th>
                                                    <th>Title</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($slideshow as $slide)
                                                <tr>
                                                    <td>
                                                        <form id="action">
                                                            <input type="checkbox" name="check_action" value="{{ $slide->id }}" class="check">
                                                        </form>
                                                    </td>
                                                    <td>
                                                            
                                                        <img src="{{ url($slide->gallery->path) }}" alt="{{ $slide->gallery->name }}" class="img-responsive" style="height: 100px; width: 100px;">

                                                    </td>
                                                    <td>{{ $slide->title }}</td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <a class="btn btn-info btn-sm btn-4 edit" data-id="{{ $slide->id }}" data-title="{{ $slide->title }}">Edit</a>
                                                            <a class="btn btn-danger btn-sm btn-6 delete" data-id="{{ $slide->id }}" >Delete</a>
                                                            <a href="{{ url('/dashboard/frontpage/slideshow/'.$slide->id.'/detail') }}" class="btn btn-sm btn-success button-4">Detail</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

                                        {{ $slideshow->render() }}

                                    </div>

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

<!-- Modal Edit Category -->
<div class="modal fade" tabindex="-1" role="dialog" id="modalEditSlideshow">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Slideshow</h4>
            </div>
            <div class="modal-body">
                <form action="{{ url('/dashboard/frontpage/slidwshow/edit') }}" method="post" accept-charset="utf-8" id="formEditSlideshow" enctype="multipart/form-data">
                    
                    <input type="hidden" name="id" class="form-control" id="id">
                    <div class="form-group">
                        <label class="control-label">Title</label>
                        <input type="text" class="form-control" name="title" placeholder="Title..." id="title" />
                    </div>
                    <div class="form-group">
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> 
                            </div>
                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                            <div>
                                <span class="btn default btn-file"></span>
                                <span class="fileinput-new"> Select image </span>
                                <span class="fileinput-exists"> Change </span>
                                <input type="file" name="image" accept="image/*">
                                <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Remove </a>
                            </div>
                        </div>
                        <div class="clearfix margin-top-10">
                                                                        
                        </div>
                    </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn green">Save Change</button>
                </form>
            </div>  
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
        <!-- End Modal Edit Category -->

@endsection

@section('javascript')

    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="{{ url('/backend/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js') }}" type="text/javascript"></script>
    <script src="{{ url('/backend/assets/global/plugins/jquery.sparkline.min.js') }}" type="text/javascript"></script>
    <script src="{{ url('/backend/assets/pages/scripts/profile.min.js') }}" type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->

    <script src="{{ url('/backend/assets/iCheck/icheck.js') }}" type="text/javascript"></script>

    <script type="text/javascript">
        
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

        $('.edit').on('click', function(){

            var id = $(this).data("id");
            var title = $(this).data("title");
            var $form = $('#formEditSlideshow');

            // $form.find('#id').val(id);
            // $form.find('#title').val(title);

            console.log(id);

            $('#modalEditSlideshow').modal({
                "show": true,
                "backdrop": "static"
            });

        });

    </script>

@stop