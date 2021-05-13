@extends('layouts.master')

@section('title')
    <title>Giỏ hàng</title>
@endsection

@section('css')
    <link href="/eshopper/css/responsive.css" rel="stylesheet">
    <style>
        .cart_product img {
            max-width: 80px;
        }
    </style>
@endsection

@section('content')
    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="{{route('home')}}">Trang chủ</a></li>
                    <li class="active">Giỏ hàng</li>
                </ol>
            </div>
            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                    <tr class="cart_menu">
                        <td class="image">Sản phẩm</td>
                        <td class="description"></td>
                        <td class="price">Giá</td>
                        <td class="quantity">Số lượng</td>
                        <td class="total">Tổng tiền</td>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td class="cart_product">
                                <a href=""><img src="{{$product->options['image']}}" alt=""></a>
                            </td>
                            <td class="cart_description">
                                <h4><a href="">{{$product->name}}</a></h4>
                                <p>Web ID: </p>
                            </td>
                            <td class="cart_price">
                                <p>{{number_format($product->price)}}</p>
                            </td>
                            <td class="cart_quantity">
                                <div class="cart_quantity_button">
                                    <a class="cart_quantity_up" href=""> + </a>
                                    <input class="cart_quantity_input" type="text" name="quantity" value="{{$product->qty}}"
                                           autocomplete="off" size="2">
                                    <a class="cart_quantity_down" href=""> - </a>
                                </div>
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price">{{$product->price*$product->qty}}</p>
                            </td>
                            <td class="cart_delete">
                                <a class="cart_quantity_delete" href="{{route('removecart',[$product->rowId])}}"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section> <!--/#cart_items-->

    <section id="do_action">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="total_area">
                        <ul>
                            <li>Cart Sub Total <span>{{Cart::subtotal()}}đ</span></li>
                            <li>Shipping Cost <span>Free</span></li>
                            <li>Total <span>{{Cart::subtotal()}}đ</span></li>
                        </ul>
                        <a class="btn btn-default update" href="">Cập nhật</a>
                        <a class="btn btn-default check_out" href="{{route('checkout')}}">Thanh toán</a>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/#do_action-->

@endsection

@section('js')

@endsection
