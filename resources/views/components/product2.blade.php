<div class="featured-product-area section-padding">
    <h2 class="section-title">
        <a href="{{route('home.category',['slug'=>$category2->slug,'id'=>$category2->id])}}">
            {{$category2->name}}
        </a>
    </h2>
    <div class="container">
        <div class="row">
            <div class="product-list tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="arrival">
                    <div class="featured-product-list indicator-style">
                        @foreach($category2->products as $product)
                            <div class="single-p-banner">
                                <div class="col-md-3">
                                    <div class="single-banner">
                                        <div class="product-wrapper">
                                            <a href="#" class="single-banner-image-wrapper">
                                                <img alt="" src="{{$product->feature_image_path}}">
                                                <div class="price">{{number_format($product->price)}}<span>đ</span></div>
                                            </a>
                                            <div class="product-description">
                                                <div class="functional-buttons">
                                                    <a href="{{route('addtocart',[$product->id])}}" title="Thêm vào giỏ">
                                                        <i class="fa fa-shopping-cart"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="banner-bottom text-center">
                                            <div class="banner-bottom-title">
                                                <a href="{{route('product',[$product->id])}}">{{$product->name}}</a>
                                            </div>
                                            <div class="rating-icon">
                                                <i class="fa fa-star icolor"></i>
                                                <i class="fa fa-star icolor"></i>
                                                <i class="fa fa-star icolor"></i>
                                                <i class="fa fa-star icolor"></i>
                                                <i class="fa fa-star icolor"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
