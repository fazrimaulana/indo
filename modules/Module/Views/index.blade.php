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
                    <span>Modules</span>
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
							<i class="fa fa-puzzle-piece font-green"></i>
							<span class="caption-subject font-green bold uppercase">Modules</span>
						</div>
					</div>
					<div class="portlet-body">
                        <div class="pull-right">
                            <button type="button" class="btn btn-sm btn-info" id="activedModule" data-loading-text="Loading...">Active</button>
                            <button type="button" class="btn btn-danger btn-sm" id="inactivedModule" data-loading-text="Loading...">Inactive</button>
                        </div>

                        <br /><br />

                        <div class="table-scrollable">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th id="checkbox">
                                            <input type="checkbox" value="" id="check_all" class="all">
                                        </th>
                                        <th> Name </th>
                                        <th> Description </th>
                                        <th> Author </th>
                                        <th> Status </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($modules as $module)
                                    <tr>
                                        <td> 

                                            <form id="action">
                                                <input type="checkbox" name="check_action" value="{{ $module->id }}" class="check">
                                            </form>

                                        </td>
                                        <td> {{ $module->name }} </td>
                                        <td> {{ $module->description }} </td>
                                        <td> {{ $module->author }} </td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ url('/dashboard/modules/'.$module->id.'/active') }}" class="btn btn-primary btn-sm 

                                                    @if($module->status=='active')
                                                        disabled
                                                    @endif

                                                 ">Active</a>
                                                <a href="{{ url('/dashboard/modules/'.$module->id.'/inactive') }}" class="btn btn-danger btn-sm

                                                    @if($module->status=='inactive')
                                                        disabled
                                                    @endif

                                                 ">Inactive</a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
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

        function checkAll(ele) {
            var checkboxes = document.getElementsByTagName('input');
            if (ele.checked) {
                for (var i = 0; i < checkboxes.length; i++) {
                    if (checkboxes[i].type == 'checkbox') {
                    checkboxes[i].checked = true;
                }}
            
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

        $('#activedModule').on('click', function(){

            var $form = $('form#action');
            var id = $form.serializeArray();
            var url = "{{ url('/dashboard/modules/check/change/active') }}";
            var urlModule = "{{ url('/dashboard/modules') }}";
            var arrayId = [];

            if(id!=""){

                $(this).button('loading');

                $.each(id, function(i, v){
                    arrayId.push(v.value);
                });

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type:'POST',
                    url:url,
                    data:{idModules : arrayId},
                    success:function(data){
                        $(this).button('reset');
                        window.location = urlModule;
                    }
                });
            }

        });

        $('#inactivedModule').on('click', function(){

            var $form = $('form#action');
            var id = $form.serializeArray();
            var url = "{{ url('/dashboard/modules/check/change/inactive') }}";
            var urlModule = "{{ url('/dashboard/modules') }}";
            var arrayId = [];

            if(id!=""){

                $(this).button('loading');

                $.each(id, function(i, v){
                    arrayId.push(v.value);
                });

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type:'POST',
                    url:url,
                    data:{idModules : arrayId},
                    success:function(data){
                        $(this).button('reset');
                        window.location = urlModule;
                    }
                });
            }

        });

    </script>
    
@stop

