@extends('layouts.admin')

@section('title')
    <title>Thêm sản phẩm mới | Shop Hạ</title>
@endsection

@section('css')
    <link href="{{asset('vendors/select2/select2.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('admins/product/add.css')}}" rel="stylesheet"/>
@endsection

@section('content')
    @include('partials.content-header',['name'=>'Products','key'=>'Add'])
    <!-- Main content -->
    <form action="" method="post" enctype="multipart/form-data">
        @csrf
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="" class="form-label">Danh mục</label>
                            <select name="parent_id" class="form-control select2_init" multiple>
                                <option value="">Chọn danh mục</option>
                                {!! $htmlOption !!}}
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="" class="form-label">Tên sản phẩm</label>
                            <input type="text" class="form-control" name="name" placeholder="Nhập tên sản phẩm">
                        </div>
                        <div class="form-group mb-3">
                            <label for="" class="form-label">Giá sản phẩm</label>
                            <input type="text" class="form-control" name="price" placeholder="Nhập giá sản phẩm">
                        </div>
                        <div class="form-group mb-3">
                            <label for="" class="form-label">Ảnh đại diện</label>
                            <input type="file" class="form-control-file" name="feature_image_path">
                        </div>
                        <div class="form-group mb-3">
                            <label for="" class="form-label">Ảnh chi tiết</label>
                            <input type="file" multiple class="form-control-file" name="image_path[]">
                        </div>
                        <div class="form-group mb-3">
                            <label for="" class="form-label">Từ khóa cho sản phẩm</label>
                            <select class="form-control tags_select_choose" name="tags[]" multiple="multiple">
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group mb-3">
                            <label for="" class="form-label">Nội dung sản phẩm</label>
                            <textarea name="content" id="" cols="30" rows="10" class="my-editor form-control">

                            </textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Thêm</button>
                    </div>

                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
    </form>
    <!-- /.content -->
@endsection

@section('js')
    <script src="{{asset('vendors/select2/select2.min.js')}}"></script>
    <script src="https://cdn.tiny.cloud/1/7kg9j2idlpj2xmx9agbn3bbh8dstsoik5rshg7wabk6cpc6o/tinymce/5/tinymce.min.js"></script>
    <script src="{{asset('admins/product/add.js')}}"></script>
@endsection
