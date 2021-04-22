
@extends('layouts.admin')

@section('title')
    <title>Quản lý | Shop Hạ</title>
@endsection

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
    @include('partials/content-header',['name'=>'category','key'=>'Add'])
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <form class="col-md-6" action="{{route('categories.store')}}" method="post">
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
                        <input type="text" class="form-control" name="name" placeholder="Nhập tên danh mục">
                    </div>
                    <button type="submit" class="btn btn-primary">Thêm</button>
                </form>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
