
@extends('layouts.admin')

@section('title')
    <title>Quản lý danh mục | Shop Hạ</title>
@endsection


@section('content')
    @include('partials.content-header',['name'=>'Danh mục','key'=>'thêm mới'])
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <form class="col-md-6" action="{{route('categories.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <label for="" class="form-label">Danh mục cha</label>
                        <select name="parent_id" class="form-control">
                            <option value="0">Chọn danh mục cha</option>
                            {!! $htmlOption !!}}
                        </select>
                    </div>
                    <div class="row mb-3">
                        <label for="" class="form-label">Tên danh mục</label>
                        <input type="text" class="form-control" name="name" placeholder="Nhập tên danh mục" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Ảnh đại diện</label>
                        <input type="file" class="form-control-file" name="feature_image_path" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Mô tả</label>
                        <textarea class="form-control" name="description" rows="5" required placeholder="Mô tả cho danh mục"></textarea>
                    </div>
                    <div class="row mb-3">
                        <label for="" class="form-label">Danh mục nổi bật ?</label>
                        <select name="recommend" class="form-control">
                            <option value="0">Không hiển thị</option>
                            <option value="1">Hiển thị ngoài trang chủ</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Thêm</button>
                </form>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
