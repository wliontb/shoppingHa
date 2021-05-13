@extends('layouts.master')

@section('title')
    <title>Trang chủ</title>
@endsection

@section('css')
    <link href="/eshopper/css/responsive.css" rel="stylesheet">
@endsection

@section('content')
    @include('components.slider')

    <section>
        <div class="container">
            <div class="row">
                @include('components.sidebar')

                <div class="col-sm-9 padding-right">
                    @include('components.feature_item')

                    @include('components.category_tab')

                    @include('components.recommend_item')

                </div>
            </div>
        </div>
    </section>

@endsection

@section('js')

@endsection
