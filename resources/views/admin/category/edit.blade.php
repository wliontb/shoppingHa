@extends('layouts.admin')

@section('title')
    <title>Sửa danh mục | Shop Hạ</title>
@endsection

@section('content')
    @include('partials.content-header',['name'=>'Danh mục','key'=>'sửa'])
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <form class="col-md-6" action="{{route('categories.update',['id'=>$category->id])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <label for="" class="form-label">Danh mục cha</label>
                        <select name="parent_id" class="form-control">
                            <option value="0">Chọn danh mục cha</option>
                            {!! $htmlOption !!}
                        </select>
                    </div>
                    <div class="row mb-3">
                        <label for="" class="form-label">Tên danh mục</label>
                        <input type="text" class="form-control" required value="{{$category->name}}" name="name" placeholder="Nhập tên danh mục">
                    </div>
                    <div class="row mb-3">
                        <label for="" class="form-label">Mô tả</label>
                        <textarea name="description" class="form-control" required placeholder="Nhập mô tả cho danh mục" rows="3">{{$category->description}}</textarea>
                    </div>
                    <div class="row mb-3">
                        <label for="" class="form-label">Danh mục nổi bật ?</label>
                        <select name="recommend" class="form-control">
                            <option value="0" {{$category->recommend==0 ? 'selected' : ''}}>Không hiển thị</option>
                            <option value="1" {{$category->recommend==1 ? 'selected' : ''}}>Hiển thị ngoài trang chủ</option>
                        </select>
                    </div>
                    <div class="row mb-3">
                        <label for="" class="form-label">Ảnh đại diện</label>
                        <input type="file" class="form-control-file" name="feature_image_path">
                        <img src="{{$category->feature_image_path}}" alt="">
                    </div>
                    <button type="submit" class="btn btn-warning">Cập nhật</button>
                </form>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
