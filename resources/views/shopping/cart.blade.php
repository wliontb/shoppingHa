@extends('layouts.master')

@section('title')
    <title>Giỏ hàng - Shop Hạ</title>
@endsection

@section('css')
@endsection

@section('content')
    @include('components.breadcrumb',['key'=>'Giỏ Hàng'])
    <!-- Cart Area Start -->
    @if($errors->any())
        <h4>{{$errors->first()}}</h4>
    @endif
    <div class="shopping-cart-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="wishlist-table-area table-responsive">
                        @if(Cart::count()==0)
                            <b>Giỏ hàng trống !</b>
                        @endif
                        <table>
                            <thead>
                            <tr>
                                <th class="product-remove">Xóa</th>
                                <th class="product-image">Hình Ảnh</th>
                                <th class="t-product-name">Tên Sản Phẩm</th>
                                <th class="product-unit-price">Giá</th>
                                <th class="product-quantity">Số Lượng</th>
                                <th class="product-subtotal">Tổng Tiền</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(Cart::content() as $cart)
                                <tr>
                                    <td class="product-remove">
                                        <a href="{{route('removecart',['id'=>$cart->rowId])}}">
                                            <i class="flaticon-delete"></i>
                                        </a>
                                    </td>
                                    <td class="product-image">
                                        <a href="#">
                                            <img src="{{$cart->options['image']}}" style="width: 104px;height: 154px"
                                                 alt="">
                                        </a>
                                    </td>
                                    <td class="t-product-name">
                                        <h3>
                                            <a href="#">{{$cart->name}}</a>
                                        </h3>
                                    </td>
                                    <td class="product-unit-price">
                                        <p>{{number_format($cart->price)}}đ</p>
                                    </td>
                                    <td class="product-quantity product-cart-details">
                                        <input type="number" value="{{$cart->qty}}">
                                    </td>
                                    <td class="product-quantity">
                                        <p>{{number_format($cart->price*$cart->qty)}}đ</p>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="shopingcart-bottom-area">
                        <a class="left-shoping-cart" href="{{route('home')}}">TIẾP TỤC MUA HÀNG</a>
                        <div class="shopingcart-bottom-area pull-right">
                            <a class="right-shoping-cart" href="{{route('destroycart')}}">XÓA GIỎ HÀNG</a>
                            <a class="right-shoping-cart" href="#">CẬP NHẬT GIỎ HÀNG</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart Area End -->
    <!-- Discount Area Start -->
    <div class="discount-area">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="subtotal-main-area">
                        <div class="subtotal-area">
                            <h2>PHÍ SHIP<span>0đ</span></h2>
                        </div>
                        <div class="subtotal-area">
                            <h2>TỔNG TIỀN<span>{{Cart::subtotal()}}đ</span></h2>
                        </div>
                        <a href="{{Cart::count()==0 ? '#' : route('checkout')}}">THANH TOÁN</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Discount Area End -->

@endsection

@section('js')

@endsection
