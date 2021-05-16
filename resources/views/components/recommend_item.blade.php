<div class="recommended_items"><!--recommended_items-->
    <h2 class="title text-center">Sản phẩm nổi bật</h2>

    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            @foreach($products_recommend as $keyProductRecommend => $itemProductRecommend)
                @if($keyProductRecommend%3==0)
                    <div class="item {{$keyProductRecommend==0 ? 'active' : ''}}">
                        @endif
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="{{$itemProductRecommend->feature_image_path}}" alt=""/>
                                        <h2>{{number_format($itemProductRecommend->price)}}</h2>
                                        <p>{{$itemProductRecommend->name}}</p>
                                        <a href="{{route('addtocart',[$itemProductRecommend->id])}}" class="btn btn-default add-to-cart"><i
                                                class="fa fa-shopping-cart"></i>Thêm vào giỏ</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                        @if($keyProductRecommend%3==2)
                    </div>
                @endif
            @endforeach
        </div>
        <a class="left recommended-item-control" href="#recommended-item-carousel"
           data-slide="prev">
            <i class="fa fa-angle-left"></i>
        </a>
        <a class="right recommended-item-control" href="#recommended-item-carousel"
           data-slide="next">
            <i class="fa fa-angle-right"></i>
        </a>
    </div>
</div><!--/recommended_items-->
