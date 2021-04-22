
@extends('layouts.admin')

@section('title')
    <title>Thêm menu mới | Shop Hạ</title>
@endsection

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
    @include('partials.content-header',['name'=>'Menus','key'=>'Add'])
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <form class="col-md-6" action="{{route('menus.store')}}" method="post">
                    @csrf
                    <div class="row mb-3">
                        <label for="" class="form-label">Menu cha</label>
                        <select name="parent_id" class="form-control">
                            <option value="0">Chọn menu cha</option>
                            {!! $optionSelect !!}}
                        </select>
                    </div>
                    <div class="row mb-3">
                        <label for="" class="form-label">Tên menu</label>
                        <input type="text" class="form-control" name="name" placeholder="Nhập tên menu">
                    </div>
                    <button type="submit" class="btn btn-primary">Thêm</button>
                </form>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
