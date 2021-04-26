
@extends('layouts.admin')

@section('title')
    <title>Thêm setting | Shop Hạ</title>
@endsection

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
    @include('partials.content-header',['name'=>'Settings','key'=>'Add'])
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <form class="col-md-6" action="{{route('settings.store')}}" method="post">
                    @csrf
                    <div class="row mb-3">
                        <label for="" class="form-label">Config Key</label>
                        @error('config_key')
                        <div class="col-12 alert alert-danger">{{ $message }}</div>
                        @enderror
                        <input
                            class="form-control @error('config_key') is-invalid @enderror"
                            type="text" name="config_key"
                            placeholder="Nhập config key">
                    </div>
                    @if(request()->type==='text')
                        <div class="row mb-3">
                            <label for="" class="form-label">Config value</label>
                            @error('config_value')
                            <div class="col-12 alert alert-danger">{{ $message }}</div>
                            @enderror
                            <input
                                class="form-control @error('config_value') is-invalid @enderror"
                                type="text" name="config_value"
                                placeholder="Nhập config value">
                        </div>
                    @elseif(request()->type==='textarea')
                        <div class="row mb-3">
                            <label for="" class="form-label">Config value</label>
                            @error('config_value')
                            <div class="col-12 alert alert-danger">{{ $message }}</div>
                            @enderror
                            <textarea
                                class="form-control @error('config_value') is-invalid @enderror"
                                name="config_value"
                                placeholder="Nhập config value"
                                rows="5"></textarea>
                        </div>
                    @endif

                    <button type="submit" class="btn btn-primary">Thêm</button>
                </form>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
