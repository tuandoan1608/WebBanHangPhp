<div class="header-bottom header-sticky d-none d-lg-block d-xl-block">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- Begin Header Bottom Menu Area -->
                                <div class="hb-menu">
                                    <nav>
                                        <ul>
                                            <li ><a href="{{route('home')}}">Trang chủ</a>
                                               
                                            </li>
                                            @foreach($menu as $menuparent)
                                            
                                            <li ><a href="{{route('cateproduct',['slug'=>$menuparent->link,'id'=>$menuparent->id])}}">{{$menuparent->name}}</a>
                            
                                          
                                            </li>
                                            @endforeach
                                            <li class="megamenu-holder "><a >Tin tức</a>
                                            @include('parital.client.child-news')
                                            <li style="padding-left: 20px;" ><a href="index.html">  Liên hệ</a>
                                            
                                        </ul>
                                    </nav>
                                </div>
                                <!-- Header Bottom Menu Area End Here -->
                            </div>
                        </div>
                    </div>
                </div>