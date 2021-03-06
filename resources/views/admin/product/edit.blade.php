@extends('layouts.admin')

@section('title')
    <title>Sửa sản phẩm | Shop Hạ</title>
@endsection

@section('css')
    <link href="{{asset('vendors/select2/select2.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('admins/product/add.css')}}" rel="stylesheet"/>
@endsection

@section('content')
    @include('partials.content-header',['name'=>'Products','key'=>'Edit'])
    <!-- Main content -->
    <form action="{{route('products.update',[$product->id])}}" method="post" enctype="multipart/form-data">
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
                            <input type="text" maxlength="191" value="{{$product->name}}" class="form-control" name="name" placeholder="Nhập tên sản phẩm" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="" class="form-label">Giá sản phẩm</label>
                            <input type="number" min="0" value="{{$product->price}}" class="form-control" name="price" placeholder="Nhập giá sản phẩm" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="" class="form-label">Giá cũ sản phẩm</label>
                            <input type="number" min="0" value="{{$product->old_price}}" class="form-control" name="old_price" placeholder="Nhập giá cũ sản phẩm" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="" class="form-label">Ảnh đại diện</label>
                            <input type="file" class="form-control-file" name="feature_image_path">
                            <div class="row">
                                <div class="col-md-6">
                                    <img src="{{$product->feature_image_path}}" class="mw-100" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="" class="form-label">Ảnh chi tiết</label>
                            <input type="file" multiple class="form-control-file" name="image_path[]">
                            <div class="row">
                                @foreach($product->productimages as $imageItem)
                                <div class="col-md-4">
                                    <img src="{{$imageItem->image_path}}" class="mw-100" alt="">
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="" class="form-label">Từ khóa cho sản phẩm</label>
                            <select class="form-control tags_select_choose" name="tags[]" multiple="multiple">
                                @foreach($product->tags as $tagItem)
                                    <option value="{{$tagItem->name}}" selected>{{$tagItem->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="" class="form-label">Tác giả</label>
                            <input type="text" maxlength="191" value="{{$product->author}}" class="form-control" name="author" placeholder="Nhập tên tác giả" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="" class="form-label">Nhà xuất bản</label>
                            <input type="text" maxlength="191" value="{{$product->publisher}}" class="form-control" name="publisher" placeholder="Nhập tên nhà xuất bản" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="" class="form-label">Số trang</label>
                            <input type="number" min="0" value="{{$product->page}}" class="form-control" name="page" placeholder="Nhập số trang sách" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="" class="form-label">Số sản phẩm</label>
                            <input type="number" min="0" value="{{$product->count}}" class="form-control" name="count" placeholder="Nhập số sản phẩm trong kho" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group mb-3">
                            <label for="" class="form-label">Mô tả sản phẩm</label>
                            <textarea name="description" id="" cols="30" rows="5" maxlength="191" class="form-control">{{$product->description}}</textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group mb-3">
                            <label for="" class="form-label">Nội dung sản phẩm</label>
                            <textarea name="contents" id="" cols="30" rows="10" class="my-editor form-control">
                                {{$product->content}}
                            </textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-warning">Sửa sản phẩm</button>
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
