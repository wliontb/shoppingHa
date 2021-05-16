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
    <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="" class="form-label">Danh mục</label>
                            <select name="category_id" class="form-control">
                                <option value="">Chọn danh mục</option>
                                {!! $htmlOption !!}}
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="" class="form-label">Tên sản phẩm</label>
                            <input type="text" class="form-control" required name="name" placeholder="Nhập tên sản phẩm">
                        </div>
                        <div class="form-group mb-3">
                            <label for="" class="form-label">Giá sản phẩm</label>
                            <input type="number" min="0" class="form-control" required name="price" placeholder="Nhập giá sản phẩm">
                        </div>
                        <div class="form-group mb-3">
                            <label for="" class="form-label">Giá sản phẩm cũ</label>
                            <input type="number" min="0" class="form-control" required name="old_price" placeholder="Nhập giá cũ">
                        </div>
                        <div class="form-group mb-3">
                            <label for="" class="form-label">Ảnh đại diện</label>
                            <input type="file" class="form-control-file" name="feature_image_path" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="" class="form-label">Ảnh chi tiết</label>
                            <input type="file" multiple class="form-control-file" required name="image_path[]">
                        </div>
                        <div class="form-group mb-3">
                            <label for="" class="form-label">Từ khóa cho sản phẩm</label>
                            <select class="form-control tags_select_choose" name="tags[]" multiple="multiple">
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="" class="form-label">Tác giả</label>
                            <input type="text" class="form-control" name="author" required placeholder="Nhập tên tác giả">
                        </div>
                        <div class="form-group mb-3">
                            <label for="" class="form-label">Nhà xuất bản</label>
                            <input type="text" class="form-control" name="publisher" required placeholder="Nhập tên nhà xuất bản">
                        </div>
                        <div class="form-group mb-3">
                            <label for="" class="form-label">Số trang</label>
                            <input type="number" min="0" max="10000" class="form-control" name="page" required placeholder="Nhập số lượng trang sách">
                        </div>
                        <div class="form-group mb-3">
                            <label for="" class="form-label">Số sản phẩm trong kho</label>
                            <input type="number" min="0" value="100" class="form-control" name="count" placeholder="Nhập số sản phẩm trong kho" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group mb-3">
                            <label for="" class="form-label">Mô tả sản phẩm</label>
                            <textarea name="description" maxlength="190" id="" cols="30" rows="5" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group mb-3">
                            <label for="" class="form-label">Nội dung sản phẩm</label>
                            <textarea name="contents" cols="30" rows="10" class="my-editor form-control"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
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
