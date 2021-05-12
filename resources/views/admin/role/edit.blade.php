@extends('layouts.admin')

@section('title')
    <title>Sửa vai trò | Shop Hạ</title>
@endsection

@section('css')
    <style>
        .card-header {
            background: #343a40;
            color: #fff;
        }
    </style>
@endsection

@section('content')
    @include('partials.content-header',['name'=>'Roles','key'=>'Edit'])
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <form action="{{route('roles.update',[$role->id])}}" method="post" enctype="multipart/form-data" style="width: 100%;">
                    <div class="col-md-12">
                        @csrf
                        <div class="form-group">
                            <label>Tên vai trò</label>
                            <input type="text"
                                   class="form-control"
                                   name="name"
                                   placeholder="Nhập tên vai trò"
                                   value="{{$role->name}}"
                            >

                        </div>

                        <div class="form-group">
                            <label>Mô tả vai trò</label>

                            <textarea
                                class="form-control"
                                name="description" rows="4">{{$role->display_name}}</textarea>

                        </div>


                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            @foreach($permissionParent as $permissionsParentItem)
                                <div class="card border-primary mb-3 col-md-12">
                                    <div class="card-header">
                                        <label>
                                            <input type="checkbox" value="" class="checkbox_wrapper">
                                        </label>
                                        Module {{ $permissionsParentItem->name }}
                                    </div>
                                    <div class="row">
                                        @foreach($permissionsParentItem->permissionChildren as $permissionsChildrentItem)
                                            <div class="card-body text-primary col-md-3">
                                                <h5 class="card-title">
                                                    <label>
                                                        <input type="checkbox" name="permission_id[]"
                                                               class="checkbox_childrent"
                                                               {{$permissionChecked->contains('id',$permissionsChildrentItem->id) ? 'checked' : ''}}
                                                               value="{{ $permissionsChildrentItem->id }}">
                                                    </label>
                                                    {{ $permissionsChildrentItem->name }}
                                                </h5>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach


                        </div>

                    </div>
                    <button type="submit" class="btn btn-warning">Sửa vai trò</button>
                </form>

            </div>
        </div>
    </div>
    <!-- /.content -->
@endsection

@section('js')
    <script>
        $('.checkbox_wrapper').on('click',function(){
           $(this).parents('.card').find('.checkbox_childrent').prop('checked', $(this).prop('checked'));
        });
    </script>
@endsection
