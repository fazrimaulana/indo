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
                    <span>Transaction Methods</span>
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
                            <i class="fa fa-shopping-cart font-green"></i>
                            <span class="caption-subject font-green bold uppercase">Transaction Methods</span>
                        </div>
                    </div>
                    <div class="portlet-body">

                        <button class="btn btn-info btn-sm btn-4 pull-right" data-toggle="modal" data-target="#modalAddTransactionMethod">Add New</button>

                        <br /><br />

                        <div class="table-scrollable">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th> Name </th>
                                        <th> Description </th>
                                        <th> Action </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($transactionMethods as $method)
                                    <tr>
                                        <td> {{ $method->name }} </td>
                                        <td> {{ $method->description }} </td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="javascript:;" class="btn btn-info btn-sm btn-4 edit" data-id="{{ $method->id }}" data-name="{{ $method->name }}" data-description="{{ $method->description }}">Edit</a>
                                                <a href="javascript:;" class="btn btn-danger btn-sm btn-6 delete" data-id="{{ $method->id }}" >Delete</a>
                                                <a href="{{ url('/dashboard/transaction-methods/'.$method->id.'/detail') }}" class="btn btn-sm btn-success button-4">Detail</a>
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

    <!-- Modal Add Role -->
        <div class="modal fade" tabindex="-1" role="dialog" id="modalAddTransactionMethod" data-backdrop="static">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Transaction Method</h4>
                    </div>
                    <div class="modal-body">
                        
                        <form action="{{ url('/dashboard/transaction-methods/add') }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="Name" class="control-label">Name <span class="required"> * </span></label>
                                <input type="text" class="form-control" id="name" name="name">
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
        <!-- End Modal Add Role -->

        <!-- Modal Edit Role -->
        <div class="modal fade" tabindex="-1" role="dialog" id="modalEditTransactionMethod" data-backdrop="static">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Transaction Method</h4>
                    </div>
                    <div class="modal-body">
                        
                        <form action="{{ url('/dashboard/transaction-methods/edit') }}" method="post" id="formEditTransactionMethod">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" id="id">
                            <div class="form-group">
                                <label for="Name" class="control-label">Name <span class="required"> * </span></label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                            <div class="form-group">
                                <label for="description" class="control-label">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="4"></textarea>
                            </div>
                    </div>
                    <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <!-- End Modal Edit Role -->

        <div class="modal fade bs-example-modal-sm" id="modalDeleteTransactionMethod" tabindex="-1" role="dialog" aria-labelledby="deleteTransactionMethodModalLabel">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Delete Transaction Method</h4>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('/dashboard/transaction-methods/delete') }}" id="formDeleteTransactionMethod" method="post">
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

@endsection

@section('javascript')
    
    <script type="text/javascript">
        
        $('.edit').on('click', function(){
            var id = $(this).data("id");
            var name = $(this).data("name");
            var description = $(this).data("description");

            // var url = "{{ url('/dashboard/transaction-methods') }}";
            var $form = $("#formEditTransactionMethod");

            $form.find("#id").val(id);
            $form.find("#name").val(name);
            $form.find("#description").val(description);
            $("#modalEditTransactionMethod").modal({
                "show"      : true,
                "backdrop"  : "static"
            });


            // $.get(url+'/'+id+'/getData', function(data){

            //     $form.find("#id").val(data.id);
            //     $form.find("#name").val(data.name);
            //     $form.find("#description").val(data.description);

            //     $("#modalEditTransactionMethod").modal({
            //         "show"      : true,
            //         "backdrop"  : "static"
            //     });

            // });

        });

        $('.delete').on('click', function(){
            var id = $(this).data("id");
            var $form = $("#formDeleteTransactionMethod");

            $form.find("#id").val(id);

            $("#modalDeleteTransactionMethod").modal({
                "show"      : true,
                "backdrop"  : "static"
            });

        });

    </script>

@stop
