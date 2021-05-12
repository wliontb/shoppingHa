
@extends('layouts.admin')

@section('title')
    <title>Danh sách vai trò | Shop Hạ</title>
@endsection

@section('css')

@endsection

@section('content')
    @include('partials.content-header',['name'=>'Roles','key'=>'List'])
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{route('roles.create')}}" class="btn btn-primary float-right">Thêm</a>
                </div>
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tên vai trò</th>
                            <th scope="col">Mô tả vai trò</th>
                            <th scope="col">Tác vụ</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($roles as $role)
                            <tr>
                                <th scope="row">{{$role->id}}</th>
                                <td>{{$role->name}}</td>
                                <td>{{$role->display_name}}</td>
                                <td>
                                    <a href="{{route('roles.edit',[$role->id])}}" class="btn btn-warning">Sửa</a>
                                    <a data-url="" class="action_delete btn btn-danger">Xóa</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
        {{$roles->links()}}
    </div>
    <!-- /.content -->
@endsection

@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="{{asset('admins/main.js')}}"></script>
@endsection
