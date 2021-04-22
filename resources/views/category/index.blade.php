
@extends('layouts.admin')

@section('title')
    <title>Quản lý danh mục | Shop Hạ</title>
@endsection

@section('content')
    @include('partials/content-header',['name'=>'category','key'=>'List'])
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{route('categories.create')}}" class="btn btn-primary float-right">Thêm</a>
                </div>
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tên danh mục</th>
                            <th scope="col">Danh mục cha</th>
                            <th scope="col">Tác vụ</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <th scope="row">{{$category->id}}</th>
                                <td>{{$category->name}}</td>
                                <td>{{$category->parent_id}}</td>
                                <td>
                                    <a href="{{route('categories.edit',[$category->id])}}" class="btn btn-warning">Sửa</a>
                                    <a href="{{route('categories.delete',[$category->id])}}" class="btn btn-danger">Xóa</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
        {{$categories->links()}}
    </div>
    <!-- /.content -->
@endsection
