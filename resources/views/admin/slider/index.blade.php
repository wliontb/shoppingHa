
@extends('layouts.admin')

@section('title')
    <title>Quản lý slider | Shop Hạ</title>
@endsection

@section('content')
    @include('partials.content-header',['name'=>'Slider','key'=>'List'])
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{route('sliders.create')}}" class="btn btn-primary float-right">Thêm</a>
                </div>
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tên slider</th>
                            <th scope="col">Mô tả</th>
                            <th scope="col">Hình ảnh</th>
                            <th scope="col">Tác vụ</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sliders as $key=>$slider)
                            <tr>
                                <th scope="row">{{$key+1}}</th>
                                <td>{{$slider->name}}</td>
                                <td>{{$slider->description}}</td>
                                <td><img class="img-size-50"  src="{{$slider->image_path}}" alt=""></td>
                                <td>
                                    <a href="{{route('sliders.edit',[$slider->id])}}" class="btn btn-warning">Sửa</a>
                                    <a href="{{route('sliders.delete',[$slider->id])}}" onclick="return confirm('Bạn có chắc muốn xóa slide này ?')" class="btn btn-danger">Xóa</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
        {{$sliders->links()}}
    </div>
    <!-- /.content -->
@endsection
