
@extends('layouts.admin')

@section('title')
    <title>Quản lý menu | Shop Hạ</title>
@endsection

@section('content')
    @include('partials.content-header',['name'=>'Menu','key'=>'List'])
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{route('menus.create')}}" class="btn btn-primary float-right">Thêm</a>
                </div>
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tên menu</th>
                            <th scope="col">Menu cha</th>
                            <th scope="col">Tác vụ</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($menus as $menu)
                            <tr>
                                <th scope="row">{{$menu->id}}</th>
                                <td>{{$menu->name}}</td>
                                <td>{{$menu->parent_id}}</td>
                                <td>
                                    <a href="{{route('menus.edit',[$menu->id])}}" class="btn btn-warning">Sửa</a>
                                    <a href="{{route('menus.delete',[$menu->id])}}" class="btn btn-danger">Xóa</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
        {{$menus->links()}}
    </div>
    <!-- /.content -->
@endsection
