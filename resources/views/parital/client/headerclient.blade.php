<header>

    <!-- Begin Header Top Area -->
    <div class="header-top">
        <div class="container">
            <div class="row">
                <!-- Begin Header Top Left Area -->
                <div class="col-lg-3 col-md-4">
                    <div class="header-top-left">
                        <ul class="phone-wrap">
                            <li><span>Telephone Enquiry:</span><a href="#">(+123) 123 321 345</a></li>
                            <li> <div class="fb-like" data-href="https://www.facebook.com/KemBoplus" data-width="200" data-layout="standard" data-action="like" data-size="large" data-share="true"></div></li>

                        </ul>
                      
                       
                    </div>
                </div>
                <!-- Header Top Left Area End Here -->
                <!-- Begin Header Top Right Area -->
                <div class="col-lg-9 col-md-8">
                    <div class="header-top-right">
                        <ul class="ht-menu">
                            <!-- Begin Setting Area -->
                            <li>
                                <div class="ht-setting-trigger"><span>Setting</span></div>
                                <div class="setting ht-setting">
                                    <ul class="ht-setting-list">
                                        <li><a href="login-register.html">My Account</a></li>
                                        <li><a href="checkout.html">Checkout</a></li>
                                        <li><a href="login-register.html">Sign In</a></li>
                                    </ul>
                                </div>
                            </li>

                            <li>
                                @if (Auth::guard('userclient')->id())
                                <span class="language-selector-wrapper"><a href="{{ route('dangxuat') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-forms').submit();"><i class="fa fa-sign-out fa-fw"></i> ĐĂNG XUẤT</a>

                                    <form id="logout-forms" action="{{ route('dangxuat') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </span>

                                @else
                                <span class="language-selector-wrapper"><a href="{{route('loginUser')}}">ĐĂNG NHẬP</a></span>
                                @endif
                            </li>
                            <!-- Language Area End Here -->
                        </ul>
                    </div>
                </div>
                <!-- Header Top Right Area End Here -->
            </div>
        </div>
    </div>
    <!-- Header Top Area End Here -->
    <!-- Begin Header Middle Area -->
    <div class="header-middle pl-sm-0 pr-sm-0 pl-xs-0 pr-xs-0">
        <div class="container">
            <div class="row">
                <!-- Begin Header Logo Area -->
                <div class="col-lg-3">
                    <div class="logo pb-sm-30 pb-xs-30">
                        <a href="index.html">
                            <img src="images/menu/logo/1.jpg" alt="">
                        </a>
                    </div>
                </div>
                <!-- Header Logo Area End Here -->
                <!-- Begin Header Middle Right Area -->
                <div class="col-lg-9 pl-0 ml-sm-15 ml-xs-15">
                    <!-- Begin Header Middle Searchbox Area -->
                    <form action="#" class="hm-searchbox">
                        <select class="nice-select select-search-category">
                            <option value="0">All</option>
                            {!!$cate!!}
                        </select>
                        <input type="text" placeholder="Enter your search key ...">
                        <button class="li-btn" type="submit"><i class="fa fa-search"></i></button>
                    </form>
                    <!-- Header Middle Searchbox Area End Here -->
                    <!-- Begin Header Middle Right Area -->
                    <div class="header-middle-right">
                        <ul class="hm-menu">
                            <!-- Begin Header Middle Wishlist Area -->
                            <li class="hm-wishlist">
                                <a href="{{route('chitietdonhang')}}">
                               
                                    <i class="fa fa-list-alt"></i>
                                </a>
                            </li>
                            <!-- Header Middle Wishlist Area End Here -->
                            <!-- Begin Header Mini Cart Area -->
                            <li class="hm-minicart">
                                <div class="hm-minicart-trigger">
                                    <span class="item-icon"></span>
                                    <span class="item-text">{{$totals}}đ
                                        <span class="cart-item-count">{{$qtys}}</span>
                                    </span>
                                </div>
                                <span></span>
                                <div class="minicart">
                                    <ul class="minicart-product-list">
                                        @foreach($cart as $item)
                                        <li>
                                            <a href="" class="minicart-product-image">
                                                <img src="{{$item->image}}" alt="cart products">
                                            </a>
                                            <div class="minicart-product-details">
                                                <h6><a href="{{route('productdetail',['id'=>$item->id,'slug'=>$item->slug])}}">Aenean eu tristique</a></h6>
                                                <span>{{$item->price}} x {{$item->qty}}</span>
                                            </div>
                                            <button class="close" title="Remove">
                                                <i class="fa fa-close"></i>
                                            </button>
                                        </li>
                                        @endforeach

                                    </ul>
                                    <p class="minicart-total">SUBTOTAL: <span>{{$totals}}</span></p>
                                    <div class="minicart-button">
                                        <a href="{{route('cart.index')}}" class="li-button li-button-fullwidth li-button-dark">
                                            <span>View Full Cart</span>
                                        </a>
                                        <a href="{{route('thanhtoan')}}" class="li-button li-button-fullwidth">
                                            <span>Checkout</span>
                                        </a>
                                    </div>
                                </div>
                            </li>
                            <!-- Header Mini Cart Area End Here -->
                        </ul>

                    </div>
                    <!-- Header Middle Right Area End Here -->
                </div>
                <!-- Header Middle Right Area End Here -->
            </div>
        </div>
    </div>
    <!-- Header Middle Area End Here -->
    <!-- Begin Header Bottom Area -->
    @include('parital.client.menu')
    <!-- Header Bottom Area End Here -->
    <!-- Begin Mobile Menu Area -->
    <div class="mobile-menu-area d-lg-none d-xl-none col-12">
        <div class="container">
            <div class="row">
                <div class="mobile-menu">
                </div>
            </div>
        </div>
    </div>
    <!-- Mobile Menu Area End Here -->
</header>