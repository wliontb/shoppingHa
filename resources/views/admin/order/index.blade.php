
@extends('layouts.admin')

@section('title')
    <title>Quản lý hóa đơn | Shop Hạ</title>
@endsection

@section('content')
    @include('partials.content-header',['name'=>'Menu','key'=>'List'])
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{route('orders.create')}}" class="btn btn-primary float-right">Thêm</a>
                </div>
                <div class="col-md-12">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr class="align-middle">
                            <th scope="col">Mã hóa đơn</th>
                            <th scope="col">Họ tên</th>
                            <th scope="col">Tổng sản phẩm</th>
                            <th scope="col">Tổng tiền</th>
                            <th scope="col">Ngày đặt hàng</th>
                            <th scope="col">Tác vụ</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <th scope="row">#{{$order->id}}</th>
                                <td>{{$order->fullname}}</td>
                                <td>{{$order->total_product}}</td>
                                <td>{{number_format($order->total_price)}}đ</td>
                                <td>{{$order->created_at}}</td>
                                <td>
                                    <a href="{{route('orders.detail',[$order->id])}}" class="btn btn-primary">Chi tiết hóa đơn</a>
                                    <a href="{{route('orders.edit',[$order->id])}}" class="btn btn-warning">Sửa</a>
                                    <a href="{{route('orders.delete',[$order->id])}}" onclick="return confirm('Bạn có chắc muốn xóa hóa đơn này ?')" class="btn btn-danger">Xóa</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
        {{$orders->links()}}
    </div>
    <!-- /.content -->
@endsection
