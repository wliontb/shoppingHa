<aside class="widget widget-categories">
    <h2 class="sidebar-title text-center">DANH MỤC</h2>
    <ul class="sidebar-menu">
        @foreach($categorys as $category)
        <li>
            <a href="{{route('home.category',['slug'=>$category->slug,'id'=>$category->id])}}">
                <i class="fa fa-angle-double-right"></i>
                {{$category->name}}
                <span>({{$category->categoryChildren->count()}})</span>
            </a>
        </li>
        @endforeach
    </ul>
</aside>
