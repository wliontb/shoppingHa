@extends('layouts.master')

@section('title')
    <title>Quản lý tài khoản - Shop Hạ</title>
@endsection

@section('css')

@endsection

@section('content')
    @include('components.breadcrumb',['key'=>'Tài Khoản'])
    <!-- My Account Area Start -->
    <div class="my-account-area section-padding">
        <div class="container">
            <div class="section-title2">
                <h2>Quản Lý Tài Khoản</h2>
                <p>Chào mừng đến với tài khoản của bạn. Tại đây bạn có thể quản lý tất cả các thông tin cá nhân và đơn
                    đặt hàng của mình.</p>
                @if($errors->any())
                    <h4 style="color: red">{{$errors->first()}}</h4>
                @endif
            </div>
            <div class="row">
                <div class="addresses-lists">
                    <div class="col-xs-12 col-sm-6 col-lg-6">
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <h4 class="panel-title">
                                        <a role="button" data-toggle="collapse" data-parent="#accordion"
                                           href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            <i class="fa fa-building"></i>
                                            <span>Thông tin cá nhân</span>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel"
                                     aria-labelledby="headingOne">
                                    <div class="panel-body">
                                        <div class="coupon-info">
                                            <h1 class="heading-title">Thông tin giao hàng </h1>
                                            <p class="required">*Thông tin bắt buộc</p>
                                            <form action="{{route('updateaccount')}}" method="POST">
                                                @csrf
                                                <p class="form-row">
                                                    <input type="text" name="fullname" required
                                                           placeholder="Họ và tên *" value="{{auth()->user()->fullname}}">
                                                </p>
                                                <p class="form-row">
                                                    <input type="text" name="address" required value="{{auth()->user()->address}}" placeholder="Địa chỉ *">
                                                </p>
                                                <p class="form-row">
                                                    <input type="text" name="name" required value="{{auth()->user()->name}}" placeholder="Tên tài khoản *"/>
                                                </p>
                                                <p class="form-row">
                                                    <input type="number" name="phone" required
                                                           placeholder="Số điện thoại *" value="{{auth()->user()->phone}}"/>
                                                </p>
                                                <p class="required">** Bạn phải để lại tối thiểu 1 số điện thoại.</p>
                                                <button class="btn button button-small" type="submit">
                                                    <span>Lưu<i class="fa fa-chevron-right"></i></span>
                                                </button>
                                            </form>
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
                                            <i class="fa fa-building"></i>
                                            <span>Mật khẩu</span>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseFour" class="panel-collapse collapse" role="tabpanel"
                                     aria-labelledby="headingFour">
                                    <div class="panel-body">
                                        <div class="coupon-info">
                                            <h1 class="heading-title">Thay đổi mật khẩu tài khoản</h1>
                                            <form action="{{route('changepassword')}}" method="POST">
                                                @csrf
                                                <p class="form-row">
                                                    <input type="password" name="cur_password" required placeholder="Mật khẩu hiện tại"/>
                                                </p>
                                                <p class="form-row">
                                                    <input type="password" name="new_password" required placeholder="Mật khẩu mới"/>
                                                </p>
                                                <p class="form-row">
                                                    <input type="password" name="confirm_password" required placeholder="Xác nhận mật khẩu mới"/>
                                                </p>
                                                <button class="btn button button-small" type="submit">
                                                    <span> Thay đổi <i class="fa fa-chevron-right"></i></span>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-lg-6">
                        <div class="myaccount-link-list">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <i class="fa fa-list-ol"></i>
                                        <span>Lịch sử đặt hàng</span>
                                    </h4>
                                </div>
                                <div class="panel-body">
                                    <div class="coupon-info">
                                        <h1 class="heading-title">
                                            Danh sách hóa đơn mua hàng
                                        </h1>
                                        <table class="table-bordered">
                                            <thead>
                                            <tr>
                                                <th>Mã HĐ</th>
                                                <th>Thông tin người nhận</th>
                                                <th>Ghi chú</th>
                                                <th>Sản phẩm</th>
                                                <th>Ngày đặt hàng</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($orders as $order)
                                                <tr>
                                                    <td>{{$order->id}}</td>
                                                    <td>{{$order->fullname}}</td>
                                                    <td>{{$order->note}}</td>
                                                    <td>{{$order->total_price}} x {{$order->total_product}}</td>
                                                    <td>{{$order->created_at}}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="create-account-button pull-left">
                        <a href="index.html" class="btn button button-small" title="Home">
                <span>
                  <i class="fa fa-chevron-left"></i>
                    Home
                </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- My Account Area End -->

@endsection

@section('js')

@endsection
