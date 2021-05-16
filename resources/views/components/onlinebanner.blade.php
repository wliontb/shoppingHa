<div class="online-banner-area">
    <div class="container">
        <div class="banner-title text-center">
            <h2><span>SÁCH</span> NỔI BẬT</h2>
            <p>Bộ sưu tập danh mục sách nổi bật năm 2021</p>
        </div>
        <div class="row">
            <div class="banner-list">
                @foreach($category_recommend as $categoryItem)
                    <div class="col-md-4 col-sm-6">
                        <div class="single-banner">
                            <a href="{{route('home.category',['slug'=>$categoryItem->slug,'id'=>$categoryItem->id])}}">
                                <img src="{{$categoryItem->feature_image_path}}" alt="">
                            </a>
                            <div class="banner-bottom text-center">
                                <a href="{{route('home.category',['slug'=>$categoryItem->slug,'id'=>$categoryItem->id])}}">{{$categoryItem->name}}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
