<footer>
    <div class="footer-top-area">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-8">
                    <div class="footer-left">
                        <a href="{{route('home')}}">
                            <img src="{{asset('frontend/img/logo.png')}}" alt="">
                        </a>
                        <p>Liên hệ chúng tôi theo thông tin bên dưới.</p>
                        <ul class="footer-contact">
                            <li>
                                <i class="flaticon-location"></i>
                                {{getSettingValue('address')}}
                            </li>
                            <li>
                                <i class="flaticon-technology"></i>
                                {{getSettingValue('phone_contact')}}
                            </li>
                            <li>
                                <i class="flaticon-web"></i>
                                {{getSettingValue('email_contact')}}
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-2 col-sm-4">
                    <div class="single-footer">
                        <h2 class="footer-title">Thông Tin</h2>
                        <ul class="footer-list">
                            <li><a href="#">Giới thiệu</a></li>
                            <li><a href="#">Liên hệ</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-2 hidden-sm">
                    <div class="single-footer">
                        <h2 class="footer-title">Tài Khoản</h2>
                        <ul class="footer-list">
                            @if(auth()->check())
                                <li><a href="{{route('account')}}">Quản lý tài khoản</a></li>
                                @if(auth()->user()->role==1)
                                    <li><a href="{{route('admin.index')}}">Quản lý trang web</a></li>
                                @endif
                                <li><a href="{{route('logout')}}">Đăng xuất</a></li>
                            @else
                                <li><a href="{{route('login')}}">Đăng nhập</a></li>
                                <li><a href="{{route('login')}}">Đăng ký</a></li>
                            @endif
                                <li><a href="{{route('cart')}}">Giỏ Hàng</a></li>
                                <li><a href="{{route('checkout')}}">Thanh Toán</a></li>

                        </ul>
                    </div>
                </div>
                <div class="col-md-2 hidden-sm">
                    <div class="single-footer">
                        <h2 class="footer-title">Danh Mục</h2>
                        <ul class="footer-list">
                            @foreach($categorys as $category)
                                <li>
                                    <a href="{{route('home.category',['slug'=>$category->slug,'id'=>$category->id])}}">{{$category->name}}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-8">
                    <div class="single-footer footer-newsletter">
                        <h2 class="footer-title">Đăng Ký Nhận Tin</h2>
                        <p>Đăng ký để nhận những tin tức khuyến mại mới nhất</p>
                        <form action="#" method="post">
                            <div>
                                <input type="text" placeholder="email">
                            </div>
                            <button class="btn btn-search btn-small" type="submit">ĐĂNG KÝ</button>
                            <i class="flaticon-networking"></i>
                        </form>
                        <ul class="social-icon">
                            <li>
                                <a href="{{getSettingValue('facebook_link')}}">
                                    <i class="flaticon-social"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="flaticon-social-1"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="flaticon-social-2"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="flaticon-video"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-2 col-sm-4 visible-sm">
                    <div class="single-footer">
                        <h2 class="footer-title">Danh Mục</h2>
                        <ul class="footer-list">
                            @foreach($categorys as $category)
                                <li>
                                    <a href="{{route('home.category',['slug'=>$category->slug,'id'=>$category->id])}}">{{$category->name}}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="footer-bottom-left pull-left">
                        <p>Copyright &copy; {{date('Y')}} <span><a href="#">HaShop</a></span>. All Right Reserved.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="footer-bottom-right pull-right">
                        <img src="https://preview.hasthemes.com/writer-preview/writer/img/paypal.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
