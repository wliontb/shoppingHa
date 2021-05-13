<div class="category-tab"><!--category-tab-->
    <div class="col-sm-12">
        <ul class="nav nav-tabs">
            @foreach($categorys as $keyCategoryTab => $itemCategoryTab)
            <li {{$keyCategoryTab==0 ? 'class="active"' : ''}}>
                <a href="#tab_{{$keyCategoryTab}}" data-toggle="tab">{{$itemCategoryTab->name}}</a>
            </li>
            @endforeach
        </ul>
    </div>
    <div class="tab-content">
        @foreach($categorys as $keyCategoryTabContent => $itemCategoryTabContent)
        <div class="tab-pane fade {{$keyCategoryTabContent==0 ? 'active in' : ''}}" id="tab_{{$keyCategoryTabContent}}">
            @foreach($itemCategoryTabContent->products as $key => $value)
            <div class="col-sm-3">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="{{$value->feature_image_path}}" alt=""/>
                            <h2>{{number_format($value->price)}}</h2>
                            <p>{{$value->name}}</p>
                            <a href="#" class="btn btn-default add-to-cart"><i
                                    class="fa fa-shopping-cart"></i>Thêm vào giỏ</a>
                        </div>

                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endforeach
    </div>
</div><!--/category-tab-->
