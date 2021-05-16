@extends('layouts.master')

@section('title')
    <title>Trang chủ - Shop Hạ</title>
@endsection

@section('css')

@endsection

@section('content')
    <!-- slider Area Start -->
    @include('components.slider')
    <!-- slider Area End-->
    <!-- Online Banner Area Start -->
    @include('components.onlinebanner')
    <!-- Online Banner Area End -->
    <!-- Shop Info Area Start -->
    @include('components.shopinfo')
    <!-- Shop Info Area End -->
    <!-- Featured Product Area Start -->
    @include('components.feature_item')
    <!-- Featured Product Area End -->
    <!-- Product1 -->
    @include('components.product1')
    <!-- Product1 End -->
    <!-- Product2 -->
    @include('components.product2')
    <!-- Product2 End -->
    <!-- News Letter Area Start -->
    @include('components.newletter')
    <!-- News Letter Area End -->

@endsection

@section('js')

@endsection
