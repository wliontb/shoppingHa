@extends('layouts.master')

@section('title')
    <title>Tìm kiếm từ khóa {{$query}}</title>
@endsection

@section('css')

@endsection

@section('content')

    <!-- Breadcrumbs Area Start -->
    @include('components.breadcrumb',['key'=>'Tìm kiếm từ khóa '.$query])
    <!-- Breadcrumbs Area Start -->
    <!-- Shop Area Start -->
    <div class="shopping-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="shop-tab-area">
                        <div class="shop-tab-list">
                            <div class="shop-tab-pill pull-left">
                                <ul>
                                    <li class="active" id="left"><a data-toggle="pill" href="#home"><i class="fa fa-th"></i><span>Lưới</span></a></li>
                                    <li><a data-toggle="pill" href="#menu1"><i class="fa fa-th-list"></i><span>Danh sách</span></a></li>
                                </ul>
                            </div>
                        </div>
                        @if($products->count()==0)
                            <b>Không có kết quả nào phù hợp !</b>
                        @endif
                        <div class="tab-content">
                            <div class="row tab-pane fade in active" id="home">
                                <div class="shop-single-product-area">
                                    @foreach($products as $product)
                                        <div class="col-md-4 col-sm-6">
                                            <div class="single-banner">
                                                <div class="product-wrapper">
                                                    <a href="#" class="single-banner-image-wrapper">
                                                        <img alt="" src="{{$product->feature_image_path}}">
                                                        <div class="price">{{number_format($product->price)}}<span>đ</span></div>
                                                    </a>
                                                    <div class="product-description">
                                                        <div class="functional-buttons">
                                                            <a href="{{route('addtocart',[$product->id])}}" title="Thêm vào giỏ">
                                                                <i class="fa fa-shopping-cart"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="banner-bottom text-center">
                                                    <div class="banner-bottom-title">
                                                        <a href="{{route('product',[$product->id])}}">{{$product->name}}</a>
                                                    </div>
                                                    <div class="rating-icon">
                                                        <i class="fa fa-star icolor"></i>
                                                        <i class="fa fa-star icolor"></i>
                                                        <i class="fa fa-star icolor"></i>
                                                        <i class="fa fa-star icolor"></i>
                                                        <i class="fa fa-star icolor"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div id="menu1" class="tab-pane fade">
                                <div class="row">
                                    @foreach($products as $product)
                                        <div class="single-shop-product">
                                            <div class="col-xs-12 col-sm-5 col-md-4">
                                                <div class="left-item">
                                                    <a href="{{route('product',[$product->id])}}" title="{{$product->name}}">
                                                        <img src="{{$product->feature_image_path}}" alt="">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-7 col-md-8">
                                                <div class="deal-product-content">
                                                    <h4>
                                                        <a href="{{route('product',[$product->id])}}" title="{{$product->name}}">{{$product->name}}</a>
                                                    </h4>
                                                    <div class="product-price">
                                                        <span class="new-price">{{number_format($product->price)}}đ</span>
                                                        <span class="old-price">{{number_format($product->price+5000)}}đ</span>
                                                    </div>
                                                    <div class="list-rating-icon">
                                                        <i class="fa fa-star icolor"></i>
                                                        <i class="fa fa-star icolor"></i>
                                                        <i class="fa fa-star icolor"></i>
                                                        <i class="fa fa-star icolor"></i>
                                                        <i class="fa fa-star icolor"></i>
                                                    </div>
                                                    <p>{{$product->description}}...</p>
                                                    <div class="availability">
                                                        <span>còn hàng</span>
                                                        <span><a href="{{route('addtocart',[$product->id])}}">Thêm vào giỏ</a></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            {{$products->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Area End -->

@endsection

@section('js')

@endsection
