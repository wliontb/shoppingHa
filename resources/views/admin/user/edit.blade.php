@extends('layouts.admin')

@section('title')
    <title>Sửa người dùng | Shop Hạ</title>
@endsection

@section('css')
    <link href="{{asset('vendors/select2/select2.min.css')}}" rel="stylesheet"/>
    <style>
        .select2-selection__choice {
            background: #343a40 !important;
        }
    </style>
@endsection

@section('content')
    @include('partials.content-header',['name'=>'Users','key'=>'Edit'])
    <!-- Main content -->
    <form action="{{route('users.update',[$user->id])}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="" class="form-label">Tên người dùng</label>
                            <input type="text" class="form-control" name="name" value="{{$user->name}}" placeholder="Nhập tên người dùng">
                        </div>
                        <div class="form-group mb-3">
                            <label for="" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" value="{{$user->email}}" placeholder="Nhập email">
                        </div>
                        <div class="form-group mb-3">
                            <label for="" class="form-label">Mật khẩu</label>
                            <input type="password" class="form-control" name="password" placeholder="Nhập mật khẩu">
                        </div>
                        <div class="form-group mb-3">
                            <label for="" class="form-label">Vai trò</label>
                            <select name="role_id[]" class="form-control select2_init" multiple>
                                <option value=""></option>
                                @foreach($roles as $role)
                                    <option
                                        {{$rolesOfUser->contains('id', $role->id) ? 'selected' : ''}}
                                        value="{{$role->id}}">{{$role->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Sửa</button>
                    </div>

                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
    </form>
    <!-- /.content -->
@endsection

@section('js')
    <script src="{{asset('vendors/select2/select2.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('.select2_init').select2({
                placeholder : 'Chọn vai trò'
            });
        });
    </script>
@endsection
