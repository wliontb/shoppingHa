
@extends('layouts.admin')

@section('title')
    <title>Thêm slide mới | Shop Hạ</title>
@endsection

@section('content')
    @include('partials.content-header',['name'=>'Sliers','key'=>'Add'])
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <form class="col-md-6" action="{{route('sliders.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <label for="" class="form-label">Tên slide</label>
                        <input type="text" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Nhập tên slide">
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="row mb-3">
                        <label for="" class="form-label">Mô tả</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" name="description" cols="30" rows="5">{{old('description')}}</textarea>
                        @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="row mb-3">
                        <label for="" class="form-label">Hình ảnh</label>
                        <input type="file" value="{{old('image_path')}}" class="form-control @error('image_path') is-invalid @enderror" name="image_path">
                        @error('image_path')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Thêm</button>
                </form>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
