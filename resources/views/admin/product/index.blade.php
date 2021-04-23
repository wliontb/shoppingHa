
@extends('layouts.admin')

@section('title')
    <title>Quản lý sản phẩm | Shop Hạ</title>
@endsection

@section('content')
    @include('partials.content-header',['name'=>'Products','key'=>'List'])
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{route('products.create')}}" class="btn btn-primary float-right">Thêm</a>
                </div>
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Giá sản phẩm</th>
                            <th scope="col">Hình ảnh</th>
                            <th scope="col">Danh mục</th>
                            <th scope="col">Tác vụ</th>
                        </tr>
                        </thead>
                        <tbody>
{{--                        @foreach($categories as $category)--}}
                            <tr>
                                <th scope="row">1</th>
                                <td>Iphone 15</td>
                                <td>1000$</td>
                                <td>-</td>
                                <td>Điện thoại</td>
                                <td>
                                    <a href="" class="btn btn-warning">Sửa</a>
                                    <a href="" class="btn btn-danger">Xóa</a>
                                </td>
                            </tr>
{{--                        @endforeach--}}
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
{{--        {{$categories->links()}}--}}
    </div>
    <!-- /.content -->
@endsection
