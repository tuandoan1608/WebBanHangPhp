@extends('layout.client')
@section('seo')
<title>{{$menu->name}}</title>
<meta name="keywords" content="{{$menu->name}}">
<meta name="description" content=" siêu thị đồ cho thú cưng,cửa hàng đồ chó mèo tại Hà Nội, Tp HCM, Đà Nẵng, Hải Phòng...:  pet shop quần áo phụ kiện,thức ăn đồ dùng, mỹ phẩm thuốc,nhà chuồng lồng nệm,đồ chơi.. Chính hãng giá tốt nhất,giao hàng toàn quốc | Vietnam pet store chain retail">
@endsection
@section('content')
<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="index.html">Home</a></li>
                <li class="active">{{$menu->name}}</li>
            </ul>
        </div>
    </div>
</div>
<!-- Li's Breadcrumb Area End Here -->
<!-- Begin Li's Content Wraper Area -->
<div class="content-wraper pt-60 pb-60">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 order-1 order-lg-2">
                <!-- Begin Li's Banner Area -->
                <div class="single-banner shop-page-banner">
                    <a href="#">
                        <img src="{{asset('styleclient/images/banner_2.jpg')}}" alt="Li's Static Banner">
                    </a>
                </div>
                <!-- Li's Banner Area End Here -->
                <!-- shop-top-bar start -->
                <div class="shop-top-bar mt-30">
                    <div class="shop-bar-inner">
                        <div class="product-view-mode">
                            <!-- shop-item-filter-list start -->
                            <ul class="nav shop-item-filter-list" role="tablist">
                                <li role="presentation"><a data-toggle="tab" role="tab" aria-controls="grid-view" href="#grid-view"><i class="fa fa-th-list"></i></a></li>
                                <li class="active" role="presentation"><a aria-selected="true" class="active show" data-toggle="tab" role="tab" aria-controls="list-view" href="#list-view"><i class="fa fa-th"></i></a></li>
                            </ul>
                            <!-- shop-item-filter-list end -->
                        </div>

                    </div>
                    <!-- product-select-box start -->
                    <div class="product-select-box">
                        <div class="product-short">

                            <select class="nice-select" onchange="window.location='?sort='+this.value">
                                <option value="">Sắp xếp theo</option>


                                <option value="low">Giá(thấp &gt; cao)</option>
                                <option value="hight">Giá(cao &gt; thấp)</option>
                                <option value="new">Mới nhất</option>

                            </select>
                        </div>
                    </div>
                    <!-- product-select-box end -->
                </div>
                <!-- shop-top-bar end -->
                <!-- shop-products-wrapper start -->
                <div class="shop-products-wrapper">
                    <div class="tab-content">
                        <div id="grid-view" class="tab-pane fade" role="tabpanel">
                            <div class="product-area shop-product-area">
                                <div class="row">
                                    <div class="col">

                                        @if($data==null)
                                        <p style="color:red;">Không có sản phẩm nào</p>
                                        @else
                                        @if($data->count())
                                        @foreach($data as $item)
                                        <div class="row product-layout-list">
                                            <div class="col-lg-3 col-md-5 ">
                                                <div class="product-image">
                                                    <a href="single-product.html">
                                                        <img src="{{$item->image}}" alt="Li's Product Image">
                                                    </a>

                                                    <span class="sticker">New</span>

                                                </div>
                                            </div>
                                            <div class="col-lg-5 col-md-7">
                                                <div class="product_desc">
                                                    <div class="product_desc_info">

                                                        <h4><a class="product_name" href="single-product.html">{{$item->name}}</a></h4>
                                                        <div class="price-box">
                                                            <span class="new-price">Giá: {{number_format($item->price).'đ'}}</span>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="shop-add-action mb-xs-30">
                                                    <ul class="add-actions-link">
                                                        <li class="add-cart"><a href="#">Add to cart</a></li>
                                                        <li class="wishlist"><a href="wishlist.html"><i class="fa fa-heart-o"></i>Add to wishlist</a></li>
                                                        <li><a class="quick-view" data-toggle="modal" data-target="#exampleModalCenter" href="#"><i class="fa fa-eye"></i>Quick view</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        @else
                                        <p style="width:100%;color:red;padding:20px 0px 20px 0px;background-color: rgba(255, 255, 149, .5);text-align:center">Không có sản phẩm nào</p>
                                        @endif
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="list-view" class="tab-pane fade product-list-view active show" role="tabpanel">
                            <div class="row">
                                @if($data==null)
                                <p style="color:red;">Không có sản phẩm nào</p>
                                @else
                                @if($data->count())
                                @foreach($data as $item)
                                <div class="col-lg-4 col-md-4 col-sm-6 mt-40">
                                    <!-- single-product-wrap start -->
                                    <div class="single-product-wrap">
                                        <div class="product-image">
                                            <a href="single-product.html">
                                                <img src="{{$item->image}}" alt="Li's Product Image">
                                            </a>
                                            <span class="sticker">New</span>
                                        </div>
                                        <div class="product_desc">
                                            <div class="product_desc_info">

                                                <h4><a class="product_name" href="single-product.html">{{$item->name}}</a></h4>
                                                <div class="price-box">
                                                    <span class="new-price">{{number_format($item->price).'đ'}}</span>
                                                </div>
                                            </div>
                                            <div class="add-actions">
                                                <ul class="add-actions-link">
                                                    <li class="add-cart active"><a href="shopping-cart.html">Add to cart</a></li>
                                                    <li><a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-eye"></i></a></li>
                                                    <li><a class="links-details" href="wishlist.html"><i class="fa fa-heart-o"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single-product-wrap end -->
                                </div>
                                @endforeach
                                @else



                                <p style="width:100%;color:red;padding:20px 0px 20px 0px;background-color: rgba(255, 255, 149, .5);text-align:center">Không có sản phẩm nào</p>






                                @endif
                                @endif
                            </div>
                        </div>
                        @if(empty($data['item']))
                        <div class="paginatoin-area">
                            <div class="row">

                                <div class="col-lg-6 col-md-6">
                                    {{ $data->links()}}
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                <!-- shop-products-wrapper end -->
            </div>
            <div class="col-lg-3 order-2 order-lg-1">
                <!--sidebar-categores-box start  -->
                <div class="sidebar-categores-box mt-sm-30 mt-xs-30">
                    <div class="sidebar-title">
                        <h2>{{$menu->name}}</h2>
                    </div>
                    <!-- category-sub-menu start -->
                    <div class="category-sub-menu">
                        <ul>
                           
                    
                            @foreach($cate as $item)
                            @if($item->categorychilrent->count())
                            <li class="has-sub"><a href="# ">{{$item->name}}</a>
                                <ul>
                                    @foreach($item->categorychilrent as $items)
                                    <li><a href="{{route('cateproducts',['slug'=>request()->slug,'id'=>request()->id,'ids'=>$items->id])}}">{{$items->name}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            @else
                            <li class="has-subs"><a href="{{route('cateproducts',['slug'=>request()->slug,'id'=>request()->id,'ids'=>$item->id])}} ">{{$item->name}}</a>

                            </li>
                            @endif
                            @endforeach
                        
                        </ul>
                    </div>
                    <!-- category-sub-menu end -->
                </div>
                <!--sidebar-categores-box end  -->
                <!--sidebar-categores-box start  -->
                <div class="sidebar-categores-box">
                    <div class="sidebar-title">
                        <h2>Filter By</h2>
                    </div>
                    <!-- btn-clear-all start -->
                    <button class="btn-clear-all mb-sm-30 mb-xs-30">Clear all</button>
                    <!-- btn-clear-all end -->
                    <!-- filter-sub-area start -->
                    <div class="filter-sub-area">
                        <h5 class="filter-sub-titel">Brand</h5>
                        <div class="categori-checkbox">
                            <form action="#">
                                <ul>
                                    <li><input type="checkbox" name="product-categori"><a href="#">Prime Video (13)</a></li>
                                    <li><input type="checkbox" name="product-categori"><a href="#">Computers (12)</a></li>
                                    <li><input type="checkbox" name="product-categori"><a href="#">Electronics (11)</a></li>
                                </ul>
                            </form>
                        </div>
                    </div>
                    <!-- filter-sub-area end -->
                    <!-- filter-sub-area start -->
                    <div class="filter-sub-area pt-sm-10 pt-xs-10">
                        <h5 class="filter-sub-titel">Categories</h5>
                        <div class="categori-checkbox">
                            <form action="#">
                                <ul>
                                    <li><input type="checkbox" name="product-categori"><a href="#">Graphic Corner (10)</a></li>
                                    <li><input type="checkbox" name="product-categori"><a href="#"> Studio Design (6)</a></li>
                                </ul>
                            </form>
                        </div>
                    </div>
                    <div class="filter-sub-area pt-sm-10 pt-xs-10">
                        <h5 class="filter-sub-titel">Fanpage</h5>
                        <div class="categori-checkbox">
                        <div class="fb-page" data-href="https://www.facebook.com/KemBoplus" data-tabs="timeline" data-width="250" data-height="400" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                                <blockquote cite="https://www.facebook.com/KemBoplus" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/KemBoplus">Pet house shop</a></blockquote>
                            </div>
                        </div>
                    </div>
                    <!-- filter-sub-area end -->

                   


                </div>
                <!--sidebar-categores-box end  -->

            </div>
        </div>
    </div>
</div>
@endsection