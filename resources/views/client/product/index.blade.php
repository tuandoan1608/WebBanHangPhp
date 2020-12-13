@extends('layout.client')

@section('seo')
<title>{{$data->name}}</title>
<meta name="keywords" content="Đồ thú cưng, đồ cho chó,đồ cho mèo">
<meta name="description" content="PetCity.vn siêu thị đồ cho thú cưng,cửa hàng đồ chó mèo tại Hà Nội, Tp HCM, Đà Nẵng, Hải Phòng...:  pet shop quần áo phụ kiện,thức ăn đồ dùng, mỹ phẩm thuốc,nhà chuồng lồng nệm,đồ chơi.. Chính hãng giá tốt nhất,giao hàng toàn quốc | Vietnam pet store chain retail">
@endsection



@section('content')
<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="index.html">Home</a></li>
                <li class="active">{{$data->metatitle}}</li>
            </ul>
        </div>
    </div>
</div>
<!-- Li's Breadcrumb Area End Here -->
<!-- content-wraper start -->
<div class="content-wraper">
    <div class="container">
        <div class="row single-product-area">
            <div class="col-lg-5 col-md-6">
                <!-- Product Details Left -->
                <div class="product-details-left">
                    <div class="product-details-images slider-navigation-1">
                        @foreach($imageProduct as $img)
                        <div class="lg-image">
                            <a class="popup-img venobox vbox-item" href="{{$img->image}}" data-gall="myGallery">
                                <img src="{{$img->image}}" alt="product image">
                            </a>
                        </div>

                        @endforeach


                    </div>
                    <div class="product-details-thumbs slider-thumbs-1">
                        @foreach($imageProduct as $img)
                        <div class="sm-image"><img src="{{$img->image}}" alt="product image thumb"></div>

                        @endforeach
                    </div>
                </div>
                <!--// Product Details Left -->
            </div>

            <div class="col-lg-7 col-md-6">
                <div class="product-details-view-content pt-60">
                    <div class="product-info">
                        <h2>{{$data->name}}</h2>
                        <span class="product-details-ref">Mã sản phẩm: <p style="color:#2E64FE; display:inline">{{$data->code}}</p> </span>

                        <div class="price-box pt-20">
                            <span class="new-price new-price-2">{{number_format($data->price).'đ'}}</span>
                        </div>

                        <div class="single-add-to-cart">
                            <form action="{{route('cart.create',['id'=>$data->id])}}" method="get" class="cart-quantity">
                                <div class="quantity">
                                    <label>Số lượng:</label>
                                    <div class="cart-plus-minus">
                                        <input class="cart-plus-minus-box" name="quantity" value="1" type="text">
                                        <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                        <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                    </div>
                                </div>
                                <button class="add-to-cart" type="submit">THÊM VÀO GIỎ HÀNG</button>
                            </form>
                        </div>

                        <div class="block-reassurance">
                            <ul>
                                <li>
                                    <div class="reassurance-item">
                                        <div class="reassurance-icon">
                                            <i class="fa fa-check-square-o"></i>
                                        </div>
                                        <p>Security policy (edit with Customer reassurance module)</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="reassurance-item">
                                        <div class="reassurance-icon">
                                            <i class="fa fa-truck"></i>
                                        </div>
                                        <p>Delivery policy (edit with Customer reassurance module)</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="reassurance-item">
                                        <div class="reassurance-icon">
                                            <i class="fa fa-exchange"></i>
                                        </div>
                                        <p> Return policy (edit with Customer reassurance module)</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- content-wraper end -->
<!-- Begin Product Area -->
<div class="product-area pt-35">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="li-product-tab">
                    <ul class="nav li-product-menu">
                        <li><a class="active" data-toggle="tab" href="#description"><span>Mô tả sản phẩm</span></a></li>
                        <li><a data-toggle="tab" href="#product-details"><span>Chi tiết sản phẩm</span></a></li>
                        <li><a data-toggle="tab" href="#reviews"><span>Video sản phẩm</span></a></li>
                    </ul>
                </div>
                <!-- Begin Li's Tab Menu Content Area -->
            </div>
        </div>
        <div class="tab-content">
            <div id="description" class="tab-pane active show" role="tabpanel">
                <div class="product-description">
                    <span>{{$data->decription}}</span>
                </div>
            </div>
            <div id="product-details" class="tab-pane" role="tabpanel">
                <div class="product-details-manufacturer">
                    {!!$data->detail!!}
                </div>
            </div>
            <div id="reviews" class="tab-pane" role="tabpanel">
                <div class="product-reviews">
                    <div class="product-details-comment-block">


                        <div class="comment-details">

                            <p>Sản phẩm này không có video </p>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Product Area End Here -->
<!-- Begin Li's Laptop Product Area -->

@endsection