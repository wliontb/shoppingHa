
@extends('layouts.admin')

@section('title')
    <title>Quản lý | Shop Hạ</title>
@endsection

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
    @include('partials/content-header',['name'=>'index','key'=>'list'])
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            Trang chủ
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
