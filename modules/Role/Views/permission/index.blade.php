@extends('layouts.backend.app')

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
                    <span>Permissions</span>
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

        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN SAMPLE TABLE PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-lock font-green"></i>
                            <span class="caption-subject font-green bold uppercase">Permission</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <button class="btn btn-info btn-sm btn-4 pull-right" data-toggle="modal" data-target="#modalAddPermission">Add New Permission</button>

                        <br /><br />

                        <div class="table-scrollable">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th> Name </th>
                                        <th> Display Name </th>
                                        <th> Description </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($permissions as $permission)
                                    <tr>
                                        <td>{{ $permission->name }}</td>
                                        <td>{{ $permission->display_name }}</td>
                                        <td>{{ $permission->description }}</td>
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

    <!-- Modal Add Permission -->
        <div class="modal fade" tabindex="-1" role="dialog" id="modalAddPermission" data-backdrop="static">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Permission</h4>
                    </div>
                    <div class="modal-body">
                        
                        <form action="{{ url('/dashboard/settings/permission/add') }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="Name" class="control-label">Name <span class="required"> * </span></label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                            <div class="form-group">
                                <label for="Display Name" class="control-label">Display Name <span class="required"> * </span></label>
                                <input type="text" class="form-control" id="display_name" name="display_name">
                            </div>
                            <div class="form-group">
                                <label for="description" class="control-label">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="4"></textarea>
                            </div>
                    </div>
                    <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <!-- End Modal Add Permission -->

@endsection
