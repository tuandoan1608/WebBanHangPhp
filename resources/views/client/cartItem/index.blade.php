@extends('layout.client')
@section('seo')
<title>Giỏ hàng</title>
@endsection
@section('css')
@endsection
@section('content')
<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="index.html">Home</a></li>
                <li class="active">Shopping Cart</li>
            </ul>
        </div>
    </div>
</div>
<!-- Li's Breadcrumb Area End Here -->
<!--Shopping Cart Area Strat-->
@if( $total<=0) <div class="container">
    <div class="col-12">
        <div class="coupon-accordion">
            <h3>Bạn chưa có mặt hàng nào <a href="{{route('home')}}" style="color:blue">Nhấn vào đây để mua hàng</span></h3>
       

        </div>
    </div>
    </div>
    @else
    <div class="Shopping-cart-area pt-60 pb-60">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="#">
                        <div class="table-content table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="li-product-remove">Xoá</th>
                                        <th class="li-product-thumbnail">Hình ảnh</th>
                                        <th class="cart-product-name">Sản phẩm</th>
                                        <th class="li-product-price">Giá</th>
                                        <th class="li-product-quantity">Số lượng</th>
                                        <th class="li-product-subtotal">Tổng tiền</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($l as $item)
                                    <tr>
                                        <td class="li-product-remove"> <a class="delete" href="{{route('cart.delete',['id'=>$item->rowId])}}"><i style="color:red" class="fa fa-minus-circle fa-fw"></i></a></td>
                                        <td class="li-product-thumbnail"><a href="{{route('productdetail',['id'=>$item->id,'slug'=>$item->slug])}}"><img src="{{$item->image}}" width="150px" height="150px" class="img-reponsize" alt="Li's Product Image"></a></td>
                                        <td class="li-product-name"><a href="{{route('productdetail',['id'=>$item->id,'slug'=>$item->slug])}}">{{$item->name}}</a></td>
                                        <td class="li-product-price"><span class="amount">{{$item->price}}</span></td>
                                        <td class="quantity">
                                            <label>Quantity</label>
                                            <div class="cart-plus-minus">
                                                <input class="cart-plus-minus-box" value="{{$item->qty}}" type="text">
                                                <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                                <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                            </div>
                                        </td>
                                        <td class="product-subtotal"><span class="amount"><?php echo $item->price * $item->qty ?> </span></td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="coupon-all">
                                    <div class="coupon">
                                        <input id="coupon_code" class="input-text" name="coupon_code" value="" placeholder="Coupon code" type="text">
                                        <input class="button" name="apply_coupon" value="Áp dụng mã giảm giá" type="submit">
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5 ml-auto">
                                <div class="cart-page-total">
                                    <h2>Tổng tiền</h2>
                                    <ul>
                                        <li>Tổng <span>{{$total}}đ</span></li>

                                    </ul>
                                    <a href="{{route('thanhtoan')}}">Thanh toán</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endif
    @endsection