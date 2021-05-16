
@extends('layouts.admin')

@section('title')
    <title>Quản lý sản phẩm | Shop Hạ</title>
@endsection
    <link rel="stylesheet" href="{{asset('admins/product/list.css')}}">
@section('css')

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
                        @foreach($products as $productItem)
                            <tr>
                                <th scope="row">{{$productItem->id}}</th>
                                <td>{{$productItem->name}}</td>
                                <td>{{$productItem->price}}</td>
                                <td><img src="{{$productItem->feature_image_path}}" class="thumbnail-img"></td>
                                <td>{{$productItem->category->name}}</td>
                                <td>
                                    <a href="{{route('products.edit',[$productItem->id])}}" class="btn btn-warning">Sửa</a>
                                    <a href="{{route('products.delete',[$productItem->id])}}" onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này ?')" class="btn btn-danger">Xóa</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
        {{$products->links()}}
    </div>
    <!-- /.content -->
@endsection
