@extends('layouts.admin')

@section('title')
    <title>Chi tiết hóa đơn | Shop Hạ</title>
@endsection

@section('content')
    @include('partials.content-header',['name'=>'Hóa Đơn','key'=>'Chi Tiết'])
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="callout callout-info">
                        <h5><i class="fas fa-info"></i> Ghi Chú:</h5>
                        Bên dưới là thông tin chi tiết của hóa đơn !
                        @if($errors->any())
                            <b>{{$errors->first()}}</b>
                        @endif
                    </div>


                    <!-- Main content -->
                    <div class="invoice p-3 mb-3">
                        <!-- title row -->
                        <div class="row">
                            <div class="col-12">
                                <h4>
                                    <i class="fas fa-globe"></i> SHOP HẠ
                                    <small class="float-right">Ngày: {{date('d/m/Y')}}</small>
                                </h4>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- info row -->
                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                Từ
                                <address>
                                    <strong>SHOP HẠ</strong><br>
                                    {{getSettingValue('address')}}<br>
                                    SĐT: {{getSettingValue('phone_contact')}}<br>
                                    Email: {{getSettingValue('email_contact')}}
                                </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                Tới
                                <address>
                                    <strong>{{$order->fullname}}</strong><br>
                                    {{$order->address}}<br>
                                    SĐT: {{$order->phone}}<br>
                                    Email: {{$order->email}}
                                </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                <b>Hóa Đơn #{{$order->id}}</b><br>
                                <br>
                                <b>Ngày đặt hàng:</b> {{$order->created_at}}<br>
                                <b>Phương thức thanh toán:</b> {{$order->payment_method==1 ? 'Ship COD' : 'Banking'}}
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- Table row -->
                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Số lượng</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Mã SP #</th>
                                        <th>Giá SP</th>
                                        <th>Tổng tiền</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($product_order as $productItem)
                                        <tr>
                                            <td>{{$productItem->quantity}}</td>
                                            <td>{{$productItem->get_product->name}}</td>
                                            <td>{{$productItem->product_id}}</td>
                                            <td>{{number_format($productItem->get_product->price)}}đ</td>
                                            <td>
                                                {{number_format($productItem->quantity*$productItem->get_product->price)}}
                                                đ
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <div class="row">
                            <!-- accepted payments column -->
                            <!-- /.col -->
                            <div class="col-6 offset-6">
                                <p class="lead">ĐƠN GIÁ</p>

                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <th style="width:50%">Tạm tính:</th>
                                            <td>{{number_format($order->total_price)}}đ</td>
                                        </tr>
                                        <tr>
                                            <th>Phí vận chuyển:</th>
                                            <td>0đ</td>
                                        </tr>
                                        <tr>
                                            <th>Tổng tiền:</th>
                                            <td>{{number_format($order->total_price)}}đ</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- this row will not appear when printing -->
                        <div class="row no-print">
                            <div class="col-12">
                                <a href="{{route('orders.delete',[$order->id])}}"
                                   onclick="return confirm('Bạn CHẮC CHẮN muốn XÓA hóa đơn này ?')"
                                   class="btn btn-danger float-right" style="margin-right: 5px;">
                                    <i class="fas fa-times"></i> Xóa đơn
                                </a>
                                @if($order->status==0)
                                    <a href="{{route('orders.active',[$order->id])}}"
                                       class="btn btn-success float-right"><i
                                            class="far fa-check-circle-o"></i> Duyệt đơn
                                    </a>
                                @else
                                    <button disabled class="btn btn-primary float-right">Đơn Đã Duyệt</button>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- /.invoice -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
