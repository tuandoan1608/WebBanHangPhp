@extends('layout.client')
@section('seo')
<title>Thanh toán</title>

<meta name="description" content=" siêu thị đồ cho thú cưng,cửa hàng đồ chó mèo tại Hà Nội, Tp HCM, Đà Nẵng, Hải Phòng...:  pet shop quần áo phụ kiện,thức ăn đồ dùng, mỹ phẩm thuốc,nhà chuồng lồng nệm,đồ chơi.. Chính hãng giá tốt nhất,giao hàng toàn quốc | Vietnam pet store chain retail">
@endsection
@section('content')
<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="index.html">Home</a></li>
                <li class="active">Checkout</li>
            </ul>
        </div>
    </div>
</div>
<!-- Li's Breadcrumb Area End Here -->
<!--Checkout Area Strat-->
@if( $totals<=0) <div class="container">
    <div class="col-12">
        <div class="coupon-accordion">
            <h3>Bạn chưa có mặt hàng nào <a href="{{route('home')}}" style="color:blue">Nhấn vào đây để mua hàng</span></h3>
       

        </div>
    </div>
    </div>
    @else
<div class="checkout-area pt-60 pb-30">
    <div class="container">
        
        <div class="row">
            <div class="col-lg-6 col-12">
                <form action="{{route('checkout')}}" method="post">
                    @csrf
                    <div class="checkbox-form">
                        <h3>Thông tin</h3>
                        <div class="row">

                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Họ <span class="required">*</span></label>
                                    <input name="lastname" required placeholder="" type="text">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Tên <span class="required">*</span></label>
                                    <input name="firstname" required placeholder="" type="text">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label>Địa chỉ <span class="required">*</span></label>
                                    <input name="fulladdress" required placeholder="Street address" type="text">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Email <span class="required">*</span></label>
                                    <input name="email" type="email" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Số điện thoại <span class="required">*</span></label>
                                    <input name="phone" required type="number">
                                </div>
                            </div>

                        </div>
                        <div class="different-address">


                            <div class="order-notes">
                                <div class="checkout-form-list">
                                    <label>Ghi chú</label>
                                    <textarea id="checkout-mess" name="note" cols="30" rows="10" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

            </div>
            <div class="col-lg-6 col-12">
                <div class="your-order">
                    <h3>Thông tin đơn hàng</h3>
                    <div class="your-order-table table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="cart-product-name">Sản phẩm</th>
                                    <th class="cart-product-total">Tổng</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $item)
                                <tr class="cart_item">
                                    <td class="cart-product-name"> {{$item->name}}<strong class="product-quantity"> x{{$item->qty}}</strong></td>
                                    <td class="cart-product-total"><span class="amount"><?php echo $item->price * $item->qty ?> </span></td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>

                                <tr class="order-total">
                                    <th>Tổng tiền đơn hàng</th>
                                    <td><strong><span class="amount">{{$totals}}</span></strong></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="payment-method">
                        <div class="payment-accordion">
                            <div id="accordion">

                                <div class="order-button-payment">
                                    <input value="Thanh toán" type="submit">
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    @endsection