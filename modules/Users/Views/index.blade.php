@extends('layouts.backend.app')

@section('css')
    
    <link rel="stylesheet" type="text/css" href="{{ url('/backend/assets/iCheck/skins/square/green.css') }}">

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
                    <span>Users</span>
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

        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN SAMPLE TABLE PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-user font-green"></i>
                            <span class="caption-subject font-green bold uppercase">Users</span>
                        </div>
                    </div>
                    <div class="portlet-body">

                        <div class="pull-right">
                            <a href="{{ url('/dashboard/users/add') }}" id="new-user" class="btn btn-info btn-sm"></i> Add New User</a>
                            <button class="btn btn-sm btn-danger" id="delete_checked">Delete</button>
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
                                        <th> Email </th>
                                        <th> Role </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                    <tr>
                                        <td>
                                            <form id="action">
                                                <input type="checkbox" name="check_action" value="{{ $user->id }}" class="check">
                                        </td>
                                        <td>
                                            <h5>{{ $user->name }}</h5>
                                            <a href="{{ url('/dashboard/users/'.$user->id.'/edit') }}" >Edit</a> 
                                            @if($user->hasRole('root')==false && $user->hasRole('administrator')==false)
                                            | <a href="javascript:;" style="color: red;" data-id="{{ $user->id }}" class="delete">Delete</a> 
                                            @endif
                                            | 
                                            <a href="{{ url('/dashboard/users/'.$user->id.'/change-password') }}" >Change Password</a> 
                                            @if(Auth::user()->hasRole('root') || Auth::user()->hasRole('administrator') ) 
                                            |<a href="{{ url('/dashboard/users/'.$user->id.'/profile') }}" > Detail</a> 
                                            @endif
                                        </td>
                                        <td>{{ $user->email }}</td>
                                        <td>

                                            @foreach($user->roles as $userRole)

                                                <a href="{{ url('/dashboard/settings/role/'.$userRole->id.'/detail') }}">{{ $userRole->name }}</a>, &nbsp

                                            @endforeach

                                        </td>
                                    </tr> 
                                    </form>
                                    @endforeach
                                </tbody>
                            </table>

                            {{ $users->render() }}

                        </div>
                    </div>
                </div>
            </div>
        </div>
                       
    </div>
    <!-- END CONTENT BODY -->

    <!-- Modal Delete Post -->
        <div class="modal fade bs-example-modal-sm" id="modalDeleteUser" tabindex="-1" role="dialog" aria-labelledby="deleteUserModalLabel">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Delete User</h4>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('/dashboard/users/delete') }}" id="formDeleteUser" method="post">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <input type="hidden" name="id" class="form-control" id="id">
                            <p><b>Yakin ingin menghapus data ini ???</b></p>
                    </div>
                    <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- End Modal Delete Post -->

@endsection

@section('javascript')

    <script src="{{ url('/backend/assets/iCheck/icheck.js') }}" type="text/javascript"></script>
    
    <script type="text/javascript">

        $('input').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
            increaseArea: '20%' // optional
        });
        
        $('.delete').on('click', function(){

            var id = $(this).data("id");
            var $form = $('#formDeleteUser');

            $form.find('#id').val(id);

            $('#modalDeleteUser').modal({
                "show" : true,
                "backdrop" : "static"
            });

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

        $('#delete_checked').on('click', function(){

            var $form = $('form#action');
            var id = $form.serializeArray();
            var url = "{{ url('/dashboard/users/delete-users') }}";
            var users = "{{ url('/dashboard/users') }}";
            var arrayId = []; 

            if(id!=""){

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
                    data:{iduser : arrayId},
                    success:function(data){
                        window.location = users;
                    }
                });

            }

        });

    </script>

@stop