<div class="slider-area">
    <div class="bend niceties preview-1">
        <div id="ensign-nivoslider" class="slides">
            @foreach($sliders as $key => $slider)
            <img src="{{$slider->image_path}}" alt="" title="#slider-direction-{{$key+1}}"/>
            @endforeach
        </div>
        @foreach($sliders as $key=>$slider)
        <div id="slider-direction-{{$key+1}}" class="text-center slider-direction">
            <!-- layer 1 -->
            <div class="layer-1">
                <h2 class="title-1">{{$slider->name}}</h2>
            </div>
            <!-- layer 2 -->
            <div class="layer-2">
                <p class="title-2">{{$slider->description}}</p>
            </div>
            <!-- layer 3 -->
            <div class="layer-3">
                <a href="#" class="title-3">XEM THÊM</a>
            </div>
            <!-- layer 4 -->
            <div class="layer-4">
                <form action="{{route('search')}}" class="title-4">
                    <input type="text" name="keyword" placeholder="Nhập tên sách bạn cần tìm">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>
