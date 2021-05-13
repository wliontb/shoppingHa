<div class="col-sm-3">
    <div class="left-sidebar">
        <h2>Category</h2>
        <div class="panel-group category-products" id="accordian"><!--category-productsr-->
            @foreach($categorys as $category)
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordian" href="#sportswear_{{$category->id}}">
                            @if($category->categoryChildren->count())
                            <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                            @endif
                            {{$category->name}}
                        </a>
                    </h4>
                </div>
                <div id="sportswear_{{$category->id}}" class="panel-collapse collapse">
                    <div class="panel-body">
                        <ul>
                            @foreach($category->categoryChildren as $childCategory)
                            <li><a href="{{route('home.category',['slug'=>$childCategory->slug,'id'=>$childCategory->id])}}">{{$childCategory->name}} </a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
        </div><!--/category-products-->

    </div>
</div>
