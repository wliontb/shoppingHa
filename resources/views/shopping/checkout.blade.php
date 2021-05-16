@extends('layouts.master')

@section('title')
    <title>Thanh toán - Shop Hạ</title>
@endsection

@section('css')
@endsection

@section('content')
    @include('components.breadcrumb',['key'=>'Thanh Toán'])

    <!-- Check Out Area Start -->
    <div class="check-out-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <form action="{{route('addorder')}}" method="POST">
                        @csrf
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingTwo">
                                    <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse"
                                           data-parent="#accordion" href="#collapseTwo" aria-expanded="false"
                                           aria-controls="collapseTwo">
                                            <span>1</span>
                                            Thông tin người đặt
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel"
                                     aria-labelledby="headingTwo">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p class="form-row">
                                                    <input type="text" name="fullname" maxlength="255"
                                                           placeholder="Họ và tên *" required>
                                                </p>
                                            </div>
                                            <div class="col-md-12">
                                                <p class="form-row">
                                                    <input type="email" name="email" placeholder="Email *" required>
                                                </p>
                                            </div>
                                            <div class="col-md-12">
                                                <p class="form-row">
                                                    <input type="number" min="0" maxlength="14" name="phone"
                                                           placeholder="Số điện thoại *" required>
                                                </p>
                                            </div>
                                            <div class="col-md-12">
                                                <p class="form-row">
                                                    <input type="text" name="address" maxlength="255"
                                                           placeholder="Địa chỉ *" required>
                                                </p>
                                            </div>
                                            <div class="col-md-12">
                                                <p class="order-notes">
                                                    <textarea name="note" placeholder="Ghi chú thêm"
                                                              rows="5"></textarea>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingFour">
                                    <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse"
                                           data-parent="#accordion" href="#collapseFour" aria-expanded="false"
                                           aria-controls="collapseFour">
                                            <span>2</span>
                                            Phương Thức Thanh Toán
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseFour" class="panel-collapse collapse" role="tabpanel"
                                     aria-labelledby="headingFour">
                                    <div class="panel-body no-padding">
                                        <div class="payment-met">
                                            <ul class="form-list">
                                                <li class="control">
                                                    <input type="radio" class="radio" title="Ship COD"
                                                           name="payment_method" id="p_method_checkmo" value="1">
                                                    <label for="p_method_checkmo">Thanh toán khi nhận hàng </label>
                                                </li>
                                                <li class="control">
                                                    <input type="radio" class="radio" title="Banking"
                                                           name="payment_method" id="p_method_ccsave" value="2">
                                                    <label for="p_method_ccsave">Chuyển khoản ngân hàng </label>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingFive">
                                    <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse"
                                           data-parent="#accordion" href="#collapseFive" aria-expanded="false"
                                           aria-controls="collapseFive">
                                            <span>3</span>
                                            Chi Tiết Hóa Đơn
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseFive" class="panel-collapse collapse" role="tabpanel"
                                     aria-labelledby="headingFive">
                                    <div class="panel-body no-padding">
                                        <div class="order-review" id="checkout-review">
                                            <div class="table-responsive" id="checkout-review-table-wrapper">
                                                <table class="data-table" id="checkout-review-table">
                                                    <thead>
                                                    <tr>
                                                        <th rowspan="1">Tên sản phẩm</th>
                                                        <th colspan="1">Giá</th>
                                                        <th rowspan="1">Số lượng</th>
                                                        <th colspan="1">Tổng tiền</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach(Cart::content() as $cart)
                                                        <tr>
                                                            <td><h3 class="product-name">{{$cart->name}}</h3></td>
                                                            <td><span class="cart-price"><span class="check-price">{{number_format($cart->price)}}đ</span></span>
                                                            </td>
                                                            <td>{{$cart->qty}}</td>
                                                            <!-- sub total starts here -->
                                                            <td><span class="cart-price"><span class="check-price">{{number_format($cart->qty*$cart->price)}}đ</span></span>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                    <tr>
                                                        <td colspan="3">Tạm tính</td>
                                                        <td><span class="check-price">{{Cart::subtotal()}}đ</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3">Phí vận chuyển</td>
                                                        <td><span class="check-price">0đ</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3"><strong>Tổng tiền</strong></td>
                                                        <td><strong><span
                                                                    class="check-price">{{Cart::subtotal()}}đ</span></strong>
                                                        </td>
                                                    </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                            <div id="checkout-review-submit">
                                                <div class="cart-btn-3" id="review-buttons-container">
                                                    <p class="left">Thiếu sản phẩm ? <a href="{{route('cart')}}">Quay
                                                            lại giỏ hàng</a></p>
                                                    @if(Cart::count()!=0)
                                                        <button type="submit" title="Xác nhận đặt hàng"
                                                                class="btn btn-default"><span>Xác Nhận Đặt Hàng</span>
                                                        </button>
                                                    @else
                                                        <a href="#"
                                                           class="btn btn-default"><span>Không Thể Đặt Hàng</span></a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-offset-1 col-md-3">
                    <div class="checkout-widget">
                        <h2 class="widget-title">CÁC BƯỚC MUA HÀNG</h2>
                        <ul>
                            <li><a href="#"><i class="fa fa-minus"></i> Chọn Sản Phẩm</a></li>
                            <li><a href="#"><i class="fa fa-minus"></i> Thêm Vào Giỏ</a></li>
                            <li><a href="#"><i class="fa fa-minus"></i> Thanh Toán</a></li>
                            <li><a href="#"><i class="fa fa-minus"></i> Nhận Hàng</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Check Out Area End -->
@endsection

@section('js')

@endsection
