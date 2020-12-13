@extends('layout.client')

@section('seo')
<title>Trang chủ</title>
<meta name="keywords" content="Đồ thú cưng, đồ cho chó,đồ cho mèo">
<meta name="description" content="PetCity.vn siêu thị đồ cho thú cưng,cửa hàng đồ chó mèo tại Hà Nội, Tp HCM, Đà Nẵng, Hải Phòng...:  pet shop quần áo phụ kiện,thức ăn đồ dùng, mỹ phẩm thuốc,nhà chuồng lồng nệm,đồ chơi.. Chính hãng giá tốt nhất,giao hàng toàn quốc | Vietnam pet store chain retail">
@endsection


@section('content')
@include('parital.client.slide')
<!-- Begin Product Area -->
<div class="product-area pt-60 pb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="li-product-tab">
                    <ul class="nav li-product-menu">
                        <li><a class="active" data-toggle="tab" href="#li-new-product"><span>Sản phẩm mới</span></a></li>

                        <li><a data-toggle="tab" href="#li-featured-product"><span>Sản phẩm nổi bật</span></a></li>
                    </ul>
                </div>
                <!-- Begin Li's Tab Menu Content Area -->
            </div>
        </div>
        <div class="tab-content">
            <div id="li-new-product" class="tab-pane active show" role="tabpanel">
                <div class="row">
                    <div class="product-active owl-carousel">
                        @foreach($newProduct as $list)
                        <div class="col-lg-12">
                            <!-- single-product-wrap start -->
                            <div class="single-product-wrap">
                                <div class="product-image">
                                    <a href="{{route('productdetail',['id'=>$list->id,'slug'=>$list->metatitle])}}">
                                        <img src="{{$list->image}}" width="242px" height="220px" alt="{{$list->name}}">
                                    </a>
                                    <span class="sticker">New</span>
                                </div>
                                <div class="product_desc">
                                    <div class="product_desc_info">

                                        <h4><a class="product_name" href="{{route('productdetail',['id'=>$list->id,'slug'=>$list->metatitle])}}">{{$list->name}}</a></h4>
                                        <div class="price-box">
                                            <span class="new-price">{{number_format($list->price).'đ'}}</span>
                                        </div>
                                    </div>
                                    <div class="add-actions">
                                        <ul class="add-actions-link">
                                            <li class="add-cart active"><a href="{{route('cart.create',['id'=>$list->id])}}">Add to cart</a></li>
                                            <li><a class="links-details" href="wishlist.html"><i class="fa fa-heart-o"></i></a></li>
                                            <li><a href="" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- single-product-wrap end -->
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>

            <div id="li-featured-product" class="tab-pane" role="tabpanel">
                <div class="row">
                    <div class="product-active owl-carousel">
                        @foreach($hotProduct as $hot)
                        <div class="col-lg-12">
                            <!-- single-product-wrap start -->
                            <div class="single-product-wrap">
                                <div class="product-image">
                                    <a href="{{route('productdetail',['id'=>$hot->id,'slug'=>$hot->metatitle])}}">
                                        <img src="{{$hot->image}}" width="242px" height="220px" alt="Li's Product Image">
                                    </a>
                                    <span class="sticker">New</span>
                                </div>
                                <div class="product_desc">
                                    <div class="product_desc_info">

                                        <h4><a class="product_name" href="{{route('productdetail',['id'=>$hot->id,'slug'=>$hot->metatitle])}}">{{$hot->name}}</a></h4>
                                        <div class="price-box">
                                            <span class="new-price">{{number_format($hot->price).'đ'}}</span>
                                        </div>
                                    </div>
                                    <div class="add-actions">
                                        <ul class="add-actions-link">
                                            <li class="add-cart active"><a href="{{route('cart.create',['id'=>$list->id])}}">Add to cart</a></li>
                                            <li><a class="links-details" href="wishlist.html"><i class="fa fa-heart-o"></i></a></li>
                                            <li><a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- single-product-wrap end -->
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Product Area End Here -->
<!-- Begin Li's Static Banner Area -->
<div class="li-static-banner">
    <div class="container">
        <div class="row">
            <!-- Begin Single Banner Area -->
            <div class="col-lg-4 col-md-4 text-center">
                <div class="single-banner">
                    <a href="#">
                        <img src="https://www.petcity.vn/media/banner/20_Juna0879799c332e802099a51352f81b45c.png" alt="Li's Static Banner">
                    </a>
                </div>
            </div>
            <!-- Single Banner Area End Here -->
            <!-- Begin Single Banner Area -->
            <div class="col-lg-4 col-md-4 text-center pt-xs-30">
                <div class="single-banner">
                    <a href="#">
                        <img src="https://www.petcity.vn/media/banner/20_Junfca8998b7b24fade3e7b54b488091249.png" alt="Li's Static Banner">
                    </a>
                </div>
            </div>
            <!-- Single Banner Area End Here -->
            <!-- Begin Single Banner Area -->
            <div class="col-lg-4 col-md-4 text-center pt-xs-30">
                <div class="single-banner">
                    <a href="#">
                        <img src="https://www.petcity.vn/media/banner/09_Apra7b0c71e2f0212762dcfa09d6fba3758.png" alt="Li's Static Banner">
                    </a>
                </div>
            </div>
            <!-- Single Banner Area End Here -->
        </div>
    </div>
</div>
<!-- Li's Static Banner Area End Here -->
<!-- Begin Li's Laptop Product Area -->
@foreach($catecat as $item)
<section class="product-area li-laptop-product pt-60 pb-45">
    <div class="container">
        <div class="row">
            <!-- Begin Li's Section Area -->
            <div class="col-lg-12">
                <div class="li-section-title">
                    <h2>
                        <span>{{$item->name}}</span>
                    </h2>
                    <ul class="li-sub-category-list">
                    @foreach($item->categorychilrent->take(4)  as $items)
                    @foreach($items->categorychilrent->take(4) as $data)
                        <li><a href="{{route('cateproducts',['slug'=>$data->link,'id'=>$item->id,'ids'=>$data->id])}}">{{$data->name}}</a></li>
                    @endforeach
                    @endforeach
                    <li><a href="{{route('cateproduct',['slug'=>$item->link,'id'=>$item->id])}}">Xem tất cả</a></li>
                    </ul>
                </div>
                <div class="row">
                    <div class="product-active owl-carousel">
                       
                            <!-- single-product-wrap start -->
                            @foreach($item->categorychilrent as $items)
                            @foreach($items->categorychilrent as $data)
                            @foreach($data->productstatus as $datas)
                            <div class="col-lg-12">
                            <div class="single-product-wrap">
                                <div class="product-image">
                                    <a href="{{route('productdetail',['id'=>$datas->id,'slug'=>$datas->metatitle])}}">
                                        <img src="{{$datas->image}}" alt="Li's Product Image">
                                    </a>
                                    <span class="sticker">New</span>
                                </div>
                                <div class="product_desc">
                                    <div class="product_desc_info">
                                        
                                        <h4><a class="product_name" href="{{route('productdetail',['id'=>$datas->id,'slug'=>$datas->metatitle])}}">{{$datas->name}}</a></h4>
                                        <div class="price-box">
                                            <span class="new-price">{{number_format($datas->price).'đ'}}</span>
                                        </div>
                                    </div>
                                    <div class="add-actions">
                                        <ul class="add-actions-link">
                                            <li class="add-cart active"><a href="{{route('cart.create',['id'=>$datas->id])}}">Add to cart</a></li>
                                            <li><a class="links-details" href="wishlist.html"><i class="fa fa-heart-o"></i></a></li>
                                            <li><a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            </div>
                            @endforeach
                            @endforeach
                            @endforeach
                            <!-- single-product-wrap end -->
                  

                    </div>
                </div>
            </div>
            <!-- Li's Section Area End Here -->
        </div>
    </div>
</section>
@endforeach



@endsection