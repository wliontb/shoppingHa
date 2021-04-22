
@extends('layouts.admin')

@section('title')
    <title>Sửa danh mục | Shop Hạ</title>
@endsection

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
    @include('partials/content-header',['name'=>'category','key'=>'Edit'])
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <form class="col-md-6" action="{{route('categories.update',['id'=>$category->id])}}" method="post">
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
                        <input type="text" class="form-control" value="{{$category->name}}" name="name" placeholder="Nhập tên danh mục">
                    </div>
                    <button type="submit" class="btn btn-warning">Cập nhật</button>
                </form>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
