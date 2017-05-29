@extends('layouts.backend.app')

@section('css')
    
    <link rel="stylesheet" type="text/css" href="{{ url('/backend/assets/iCheck/skins/square/green.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ url('/backend/assets/global/plugins/fontawesome-iconpicker-1.3.0/dist/css/fontawesome-iconpicker.min.css') }}">

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
                    <span>Categories</span>
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
                            <i class="fa fa-thumb-tack font-green"></i>
                            <span class="caption-subject font-green bold uppercase">Categories</span>
                        </div>
                    </div>
                    <div class="portlet-body">

                        <div class="pull-right">
                            <button class="btn btn-info btn-sm btn-info" data-toggle="modal" data-target="#modalAddCategory">Add New Category</button>
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
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        use Modules\Categories\Models\Category;
                                    @endphp

                                    @foreach($categoriesParent as $key => $category)
                                    <tr>
                                        <td>
                                                <form id="action">
                                                @if($category->name!="lainnya")
                                                    <input type="checkbox" name="check_action" value="{{ $category->id }}" class="check">
                                                @endif
                                                </form>
                                        </td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->slug }}</td>
                                        <td>{{ $category->description }}</td>
                                        <td>
                                            <div class="btn-group">
                                                @if($category->name!="lainnya")
                                                    <a class="btn btn-info btn-sm btn-4 edit" data-id="{{ $category->id }}" data-toggle="modal" data-target="#modalEditCategory_{{ $category->id }}">Edit</a>
                                                    <a class="btn btn-danger btn-sm btn-6 delete" data-id="{{ $category->id }}" >Delete</a>
                                                @endif
                                                    <a href="{{ url('/dashboard/categories/'.$category->id.'/detail') }}" class="btn btn-sm btn-success button-4">Detail</a>
                                            </div>
                                        </td>
                                    </tr>

                                    @php
                                        $categoryChild = Category::where('parent_id', $category->id)->get();
                                    @endphp

                                        @foreach($categoryChild as $catChild)

                                        <tr>
                                            <td>
                                                <form id="action">
                                                    <input type="checkbox" name="check_action" value="{{ $catChild->id }}" class="check">
                                                </form>
                                            </td>
                                            <td>__ {{ $catChild->name }}</td>
                                            <td>{{ $catChild->slug }}</td>
                                            <td>{{ $catChild->description }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a class="btn btn-info btn-sm btn-4 edit" data-id="{{ $catChild->id }}" data-toggle="modal" data-target="#modalEditCategory_{{ $catChild->id }}">Edit</a>
                                                    <a class="btn btn-danger btn-sm btn-6 delete" data-id="{{ $catChild->id }}" >Delete</a>
                                                    <a href="{{ url('/dashboard/categories/'.$catChild->id.'/detail') }}" class="btn btn-sm btn-success button-4">Detail</a>
                                                </div>
                                            </td>
                                        </tr>

        <!-- Modal Edit Category -->
        <div class="modal fade" tabindex="-1" role="dialog" id="modalEditCategory_{{ $catChild->id }}" data-backdrop="static">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Category</h4>
                    </div>
                    <div class="modal-body">
                        
                        <form action="{{ url('/dashboard/categories/edit') }}" method="post" id="formEditCategory">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" id="id" value="{{ $catChild->id }}">
                            <div class="form-group">
                                <label for="Name" class="control-label">Name <span class="required"> * </span></label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $catChild->name }}">
                            </div>
                            <div class="form-group">
                                <label for="Parent" class="control-label">Parent</label>
                                <select name="parent" class="form-control">
                                    <option value="0">Empty</option>
                                    @foreach($categoriesParent as $categoryParent)
                                        @if($categoryParent->id!=1)
                                            <option value="{{ $categoryParent->id }}" @if($categoryParent->id == $catChild->parent_id) selected  @endif >{{ $categoryParent->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="description" class="control-label">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="4">{{ $catChild->description }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="Icon" class="control-label">Icon</label>
                                <input type="text" class="form-control" id="icon" name="icon" value="{{ $catChild->icon }}">
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
        <!-- End Modal Edit Category -->

                                    @endforeach

        <!-- Modal Edit Category -->
        <div class="modal fade" tabindex="-1" role="dialog" id="modalEditCategory_{{$category->id}}" data-backdrop="static">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Category</h4>
                    </div>
                    <div class="modal-body">
                        
                        <form action="{{ url('/dashboard/categories/edit') }}" method="post" id="formEditCategory">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" id="id" value="{{ $category->id }}">
                            <div class="form-group">
                                <label for="Name" class="control-label">Name <span class="required"> * </span></label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}">
                            </div>
                            <div class="form-group">
                                <label for="Parent" class="control-label">Parent</label>
                                <select name="parent" class="form-control">
                                    <option value="0">Empty</option>
                                    @foreach($categoriesParent as $categoryParent)
                                        @if($categoryParent->id!=1 && $categoryParent->id!=$category->id)
                                            <option value="{{ $categoryParent->id }}">{{ $categoryParent->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="description" class="control-label">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="4">{{ $category->description }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="Icon" class="control-label">Icon</label>
                                <input type="text" class="form-control" id="icon" name="icon" value="{{ $category->icon }}">
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
        <!-- End Modal Edit Category -->

                                @endforeach
                                </tbody>
                            </table>
                            {{ $categories->render() }}

                        </div>
                    </div>
                </div>
            </div>
        </div>
                       
    </div>
    <!-- END CONTENT BODY -->

    <!-- Modal Add Category -->
        <div class="modal fade" tabindex="-1" role="dialog" id="modalAddCategory" data-backdrop="static">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Category</h4>
                    </div>
                    <div class="modal-body">
                        
                        <form action="{{ url('/dashboard/categories/add') }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="Name" class="control-label">Name <span class="required"> * </span></label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                            <div class="form-group">
                                <label for="Parent" class="control-label">Parent</label>
                                <select name="parent" class="form-control">
                                    <option value="0">Empty</option>
                                    @foreach($categoriesParent as $categoryParent)
                                        @if($categoryParent->id!=1)
                                            <option value="{{ $categoryParent->id }}">{{ $categoryParent->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="description" class="control-label">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="4"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="Icon" class="control-label">Icon</label>
                                <input type="text" class="form-control" id="icon" name="icon">
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
        <!-- End Modal Add Category -->
        

        <div class="modal fade bs-example-modal-sm" id="modalDeleteCategory" tabindex="-1" role="dialog" aria-labelledby="deleteCategoryModalLabel">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Delete Category</h4>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('/dashboard/categories/delete') }}" id="formDeleteCategory" method="post">
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

    <script src="{{ url('/backend/assets/iCheck/icheck.js') }}" type="text/javascript"></script>

    <script type="text/javascript" src="{{ url('/backend/assets/global/plugins/fontawesome-iconpicker-1.3.0/dist/js/fontawesome-iconpicker.js') }}"></script>
    
    <script type="text/javascript">

        $('#icon').iconpicker();
        $("#formEditCategory").find("#icon").iconpicker();
        
        // $('.edit').on('click', function(){
        //     var id = $(this).data("id");
        //     var url = "{{ url('/dashboard/categories') }}";
        //     var $form = $("#formEditCategory");

        //     $.get(url+'/'+id+'/getData', function(data){

        //         $form.find("#id").val(data.category.id);
        //         $form.find("#name").val(data.category.name);
        //         $form.find(".parent").empty();
        //         $form.find(".parent").append("  <option value='0'>Empty</option> ");
        //         $form.find("#description").val(data.category.description);
        //         $form.find("#icon").val(data.category.icon);

        //         $.each(data.parent, function(index, value){
        //             $form.find(".parent").append(" <option value='"+ value.id +"'> "+ value.name +" </option>");
        //         });

        //         $form.find("#parent").val(data.category.parent_id);

        //         $("#modalEditCategory").modal({
        //             "show"      : true,
        //             "backdrop"  : "static"
        //         });

        //     });

        // });

        $('.delete').on('click', function(){
            var id = $(this).data("id");
            var $form = $("#formDeleteCategory");

            $form.find("#id").val(id);

            $("#modalDeleteCategory").modal({
                "show"      : true,
                "backdrop"  : "static"
            });

        });

        $('input').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
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

        $('#delete_check').on('click', function(){

            var $form = $('form#action');
            var id = $form.serializeArray();
            var url = "{{ url('/dashboard/categories/delete_check') }}";
            var categories = "{{ url('/dashboard/categories') }}";
            var arrayId = []; 

            if (id!="") { 

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
                    data:{idcategory : arrayId},
                    success:function(data){
                        $(this).button('reset');
                        window.location = categories;
                    }
                });

            }

        });

    </script>

@stop