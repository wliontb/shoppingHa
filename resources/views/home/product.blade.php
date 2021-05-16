@extends('layouts.master')

@section('title')
    <title>{{$product->name}} - Shop Hạ</title>
@endsection

@section('css')
    <link href="/eshopper/css/responsive.css" rel="stylesheet">
@endsection

@section('content')
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous"
            src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v10.0&appId=198007108789545&autoLogAppEvents=1"
            nonce="RKGxhr3q"></script>

    <!-- Breadcrumbs Area Start -->
    @include('components.breadcrumb',['key'=>$product->name])
    <!-- Breadcrumbs Area Start -->
    <!-- Single Product Area Start -->
    <div class="single-product-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-7">
                    <div class="single-product-image-inner">
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="image_0">
                                <a class="venobox" href="{{$product->feature_image_path}}" data-gall="gallery" title="">
                                    <img src="{{$product->feature_image_path}}" alt="">
                                </a>
                            </div>
                            @foreach($product->images as $key=>$image)
                                <div role="tabpanel" class="tab-pane" id="image_{{$key+1}}">
                                    <a class="venobox" href="{{$image->image_path}}" data-gall="gallery" title="">
                                        <img src="{{$image->image_path}}" alt="">
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        <!-- Nav tabs -->
                        <ul class="product-tabs" role="tablist">
                            <li role="presentation" class="active">
                                <a href="#image_0"
                                   aria-controls="image_0"
                                   role="tab" data-toggle="tab">
                                    <img
                                        src="{{$product->feature_image_path}}" style="width: 102px; height: 102px" alt="">
                                </a>
                            </li>
                            @foreach($product->images as $key=>$image)
                                <li role="presentation" {{$key==0 ? 'class="active"' : ''}}>
                                    <a href="#image_{{$key+1}}"
                                       aria-controls="image_{{$key+1}}"
                                       role="tab" data-toggle="tab">
                                        <img
                                            src="{{$image->image_path}}" style="width: 102px; height: 102px" alt="">
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-sm-5">
                    <div class="single-product-details">
                        <div class="list-pro-rating">
                            <i class="fa fa-star icolor"></i>
                            <i class="fa fa-star icolor"></i>
                            <i class="fa fa-star icolor"></i>
                            <i class="fa fa-star icolor"></i>
                            <i class="fa fa-star icolor"></i>
                        </div>
                        <h2>{{$product->name}}</h2>
                        <div class="availability">
                            <span>{{$product->count > 0 ? 'Còn hàng' : 'Hết hàng'}}</span>
                        </div>
                        <p>{{$product->description}}...</p>
                        <div class="single-product-price">
                            <h2>{{number_format($product->price)}}đ</h2>
                        </div>
                        <div class="product-attributes clearfix">
                            <form action="{{route('addtocart_qty',[$product->id])}}" method="POST">
                                @csrf
                                <span class="pull-left" id="quantity-wanted-p">
									<span class="dec qtybutton">-</span>
									<input type="number" value="1" max="{{$product->count}}" name="quantity" class="cart-plus-minus-box">
									<span class="inc qtybutton">+</span>
								</span>
                                <span>
                                    @if($product->count>0)
                                        <button type="submit" class="cart-btn btn-default">
                                        <i class="flaticon-shop"></i>
                                        Thêm vào giỏ
                                        </button>
                                    @else
                                        <a href="#" class="cart-btn btn-danger">Tạm hết hàng</a>
                                    @endif
                                </span>
                            </form>
                        </div>
                        <div class="single-product-categories">
                            <label>Danh mục:</label>
                            <span>{{$product->category->name}}</span>
                        </div>
                        <div class="social-share">
                            <label>Chia sẻ: </label>
                            <ul class="social-share-icon">
                                <li><a href="#"><i class="flaticon-social"></i></a></li>
                                <li><a href="#"><i class="flaticon-social-1"></i></a></li>
                                <li><a href="#"><i class="flaticon-social-2"></i></a></li>
                            </ul>
                        </div>
                        <div id="product-comments-block-extra">
                            <ul class="comments-advices">
                                <li>
                                    <a href="#reviews" class="open-comment-form">Xem nhận xét</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-9">
                    <div class="p-details-tab-content">
                        <div class="p-details-tab">
                            <ul class="p-details-nav-tab" role="tablist">
                                <li role="presentation" class="active"><a href="#more-info" aria-controls="more-info"
                                                                          role="tab" data-toggle="tab">Mô tả</a></li>
                                <li role="presentation"><a href="#data" aria-controls="data" role="tab"
                                                           data-toggle="tab">Thông tin</a></li>
                                <li role="presentation"><a href="#reviews" aria-controls="reviews" role="tab"
                                                           data-toggle="tab">Nhận xét</a></li>
                            </ul>
                        </div>
                        <div class="clearfix"></div>
                        <div class="tab-content review">
                            <div role="tabpanel" class="tab-pane active" id="more-info">
                                <p>{!!$product->content!!}</p>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="data">
                                <table class="table-data-sheet">
                                    <tbody>
                                    <tr class="odd">
                                        <td>Tác giả</td>
                                        <td>{{$product->author}}</td>
                                    </tr>
                                    <tr class="even">
                                        <td>Số trang</td>
                                        <td>{{$product->page}}</td>
                                    </tr>
                                    <tr class="odd">
                                        <td>Nhà xuất bản</td>
                                        <td>{{$product->publisher}}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="reviews">
                                <div id="product-comments-block-tab">
                                    <div class="fb-comments" data-href="https://hashop1.com/{{$product->id}}"
                                         data-width="" data-numposts="5"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Single Product Area End -->
    <!-- Related Product Area Start -->
    <div class="related-product-area">
        <h2 class="section-title">SẢN PHẨM LIÊN QUAN</h2>
        <div class="container">
            <div class="row">
                <div class="related-product indicator-style">
                    @foreach($products_related as $itemRelated)
                        <div class="col-md-3">
                            <div class="single-banner">
                                <div class="product-wrapper">
                                    <a href="#" class="single-banner-image-wrapper">
                                        <img alt="" src="{{$itemRelated->feature_image_path}}">
                                        <div class="price">{{number_format($itemRelated->price)}}<span>đ</span></div>
                                        <div class="rating-icon text-center">
                                            <i class="fa fa-star icolor"></i>
                                            <i class="fa fa-star icolor"></i>
                                            <i class="fa fa-star icolor"></i>
                                            <i class="fa fa-star icolor"></i>
                                            <i class="fa fa-star icolor"></i>
                                        </div>
                                    </a>
                                    <div class="product-description">
                                        <div class="functional-buttons">
                                            <a href="{{route('addtocart',[$itemRelated->id])}}" title="Thêm vào giỏ">
                                                <i class="fa fa-shopping-cart"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="banner-bottom text-center">
                                    <a href="{{route('product',[$itemRelated->id])}}">{{$itemRelated->name}}</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- Related Product Area End -->
@endsection

@section('js')

@endsection
