<!--Header Area Start-->
<div class="header-area">
    <div class="container">
        <div class="row">
            <div class="col-md-2 col-sm-6 col-xs-6">
                <div class="header-logo">
                    <a href="{{route('home')}}">
                        <img src="{{asset('frontend/img/logo.png')}}" alt="">
                    </a>
                </div>
            </div>
            <div class="col-md-1 col-sm-6 visible-sm  col-xs-6">
                <div class="header-right">
                    <ul>
                        <li>
                            @if(auth()->check())
                                <a href="{{route('account')}}" title="Quản lý tài khoản"><i class="flaticon-people"></i></a>
                            @else
                                <a href="{{route('login')}}" title="Đăng nhập/ Đăng ký"><i class="flaticon-people"></i></a>
                            @endif
                        </li>
                        <li class="shoping-cart">
                            <a href="#">
                                <i class="flaticon-shop"></i>
                                <span>{{Cart::count()}}</span>
                            </a>
                            <div class="add-to-cart-product">
                                @foreach(Cart::content() as $cart)
                                    <div class="cart-product">
                                        <div class="cart-product-image">
                                            <a href="{{route('product',[$cart->id])}}">
                                                <img src="{{$cart->options['image']}}" alt="">
                                            </a>
                                        </div>
                                        <div class="cart-product-info">
                                            <p>
                                                <span>{{$cart->qty}}</span>
                                                x
                                                <a href="{{route('product',[$cart->id])}}">{{$cart->name}}</a>
                                            </p>
                                            <span class="cart-price">{{number_format($cart->price)}}đ</span>
                                        </div>
                                        <div class="cart-product-remove">
                                            <i class="fa fa-times"></i>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="total-cart-price">
                                    <div class="cart-product-line fast-line">
                                        <span>Shipping</span>
                                        <span class="free-shiping">0đ</span>
                                    </div>
                                    <div class="cart-product-line">
                                        <span>Total</span>
                                        <span class="total">{{Cart::subtotal()}}đ</span>
                                    </div>
                                </div>
                                <div class="cart-checkout">
                                    <a href="{{route('cart')}}">
                                        Giỏ hàng
                                        <i class="fa fa-chevron-right"></i>
                                    </a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-9 col-sm-12 hidden-xs">
                <div class="mainmenu text-center">
                    <nav>
                        <ul id="nav">
                            <li><a href="index.html">TRANG CHỦ</a></li>
                            <li><a href="#">DANH MỤC</a>
                                <ul class="sub-menu">
                                    @foreach($categorys as $category)
                                        <li>
                                            <a href="{{route('home.category',['slug'=>$category->slug,'id'=>$category->id])}}">{{$category->name}}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li><a href="#">BÀI VIẾT</a></li>
                            <li><a href="#">GIỚI THIỆU</a></li>
                            <li><a href="#">LIÊN HỆ</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-md-1 hidden-sm">
                <div class="header-right">
                    <ul>
                        <li>
                            @if(auth()->check())
                                <a href="{{auth()->user()->role==2 ? route('account') : route('admin.index')}}" title="Quản lý"><i class="flaticon-people"></i></a>
                            @else
                                <a href="{{route('login')}}" title="Đăng nhập/ Đăng ký"><i class="flaticon-people"></i></a>
                            @endif
                        </li>
                        <li class="shoping-cart">
                            <a href="#">
                                <i class="flaticon-shop"></i>
                                <span>{{Cart::count()}}</span>
                            </a>
                            <div class="add-to-cart-product">
                                @foreach(Cart::content() as $cart)
                                    <div class="cart-product">
                                        <div class="cart-product-image">
                                            <a href="{{route('product',[$cart->id])}}">
                                                <img src="{{$cart->options['image']}}" alt="">
                                            </a>
                                        </div>
                                        <div class="cart-product-info">
                                            <p>
                                                <span>{{$cart->qty}}</span>
                                                x
                                                <a href="{{route('product',[$cart->id])}}">{{$cart->name}}</a>
                                            </p>
                                            <span class="cart-price">{{number_format($cart->price)}}đ</span>
                                        </div>
                                        <div class="cart-product-remove">
                                            <i class="fa fa-times"></i>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="total-cart-price">
                                    <div class="cart-product-line fast-line">
                                        <span>Shipping</span>
                                        <span class="free-shiping">0đ</span>
                                    </div>
                                    <div class="cart-product-line">
                                        <span>Total</span>
                                        <span class="total">{{Cart::subtotal()}}</span>
                                    </div>
                                </div>
                                <div class="cart-checkout">
                                    <a href="{{route('cart')}}">
                                        Giỏ hàng
                                        <i class="fa fa-chevron-right"></i>
                                    </a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Header Area End-->
<!-- Mobile Menu Start -->
<div class="mobile-menu-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="mobile-menu">
                    <nav id="dropdown">
                        <ul>
                            <li><a href="{{route('home')}}">TRANG CHỦ</a></li>
                            <li><a href="#">DANH MỤC</a>
                                <ul>
                                    @foreach($categorys as $category)
                                        <li>
                                            <a href="{{route('home.category',['slug'=>$category->slug,'id'=>$category->id])}}">{{$category->name}}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li><a href="#">BÀI VIẾT</a></li>
                            <li><a href="#">GIỚI THIỆU</a></li>
                            <li><a href="#">LIÊN HỆ</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Mobile Menu End -->
