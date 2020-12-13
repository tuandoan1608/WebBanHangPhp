@extends('admin.layout.index')


@section('css')
<style>
    .dataTables_info,
    .dataTables_paginate,
    .dataTables_length {
        display: none;
    }

    .table-responsive {
        overflow: hidden;
    }
</style>
@endsection
@section('content')
<div id="page-wrapper">
    <div class="content-wrapper">
        <div class="row" style="display:inline">
            <h4 style="display:inline-block;" class="card-header">Bill </h4>

        </div>

        <div class="main-conten">
            <div>
                <div class="card">



                    <div class="card-body p-0">
                        <div class="table-responsive">

                            <table class="table  table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th class="li-product-remove">stt</th>

                                        <th class="cart-product-name">Tên khách hàng</th>

                                        <th class="cart-product-name">Số điện thoại</th>


                                        <th class="li-product-subtotal">Tổng tiền</th>
                                        <th class="li-product-subtotal">Trạng thái</th>
                                        <th class="li-product-subtotal">Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($od as $item)
                                    @if($item->status==3)
                                    @elseif($item->status==4)
                                    @elseif($item->status==5)
                                    @else
                                    <tr>



                                        <td class="li-product-price"><span class="amount">{{$item->id}}</span></td>
                                        <td class="li-product-price"><span class="amount">{{$item->lastname}} {{$item->firstname}}</span></td>
                                        <td class="li-product-price"><span class="amount">{{$item->phone}}</span></td>
                                        <td class="li-product-price"><span class="amount">{{$item->amount}}</span></td>
                                        @if($item->status==1)
                                        <td class="li-product-price"><a style="background-color: blue;color:white;padding:4px;text-decoration:none" href="{{route('order.updates',['id'=>$item->id,'status'=>2])}}">Duyệt Đơn hàng</a></td>
                                        <td class="li-product-price"><a href="{{route('order.updates',['id'=>$item->id,'status'=>4])}}">Hủy đơn hàng</a></td>
                                        @elseif($item->status==2)
                                        <td class="li-product-price"><a style="background-color: #FFFF00;color:black;padding:4px;text-decoration:none" href="{{route('order.updates',['id'=>$item->id,'status'=>5])}}">Xác nhận đã giao hàng</a></td>
                                        <td class="li-product-price"><a href="{{route('order.updates',['id'=>$item->id,'status'=>4])}}">Hủy đơn hàng</a></td>
                                        @elseif($item->status==3)
                                        <td class="li-product-price"><a style="background-color: green;color:white;padding:4px;text-decoration:none" href="{{route('order.updates',['id'=>$item->id,'status'=>5])}}">Xác nhận đã thanh toán</a></td>


                                        @endif
                                        <td class="li-product-price"><a href="{{route('order.detail',['id'=>$item->id])}}">Chi tiết</a></td>

                                    </tr>
                                    @endif
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>


        <div class="main-conten" style="margin-top: 50px;">
            <div>
                <div class="card">



                    <div class="card-body p-0">
                        <div class="table-responsive">

                            <table class="table  table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th class="li-product-remove">stt</th>

                                        <th class="cart-product-name">Tên khách hàng</th>

                                        <th class="cart-product-name">Số điện thoại</th>


                                        <th class="li-product-subtotal">Tổng tiền</th>
                                        <th class="li-product-subtotal">Trạng thái</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($od as $item)
                                    @if($item->status==1)
                                    @else

                                    <tr>



                                        <td class="li-product-price"><span class="amount">{{$item->id}}</span></td>
                                        <td class="li-product-price"><span class="amount">{{$item->lastname}} {{$item->firstname}}</span></td>
                                        <td class="li-product-price"><span class="amount">{{$item->phone}}</span></td>
                                        <td class="li-product-price"><span class="amount">{{$item->amount}}</span></td>
                                        @if($item->status==2)
                                        <td class="li-product-price"><span class="amount">Đang giao hàng</span></td>
                                        <td class="li-product-price"><a href="{{route('order.detail',['id'=>$item->id])}}">Chi tiết</a></td>
                                        @elseif($item->status==3)
                                        <td class="li-product-price"><span class="amount">Đã nhận tiền</span></td>
                                        <td class="li-product-price"><a href="{{route('order.detail',['id'=>$item->id])}}">Chi tiết</a></td>
                                        @elseif($item->status==4)
                                        <td class="li-product-price"><span class="amount">Đơn hàng bị hủy</span></td>
                                        <td></td>
                                        @elseif($item->status==5)
                                        <td class="li-product-price"><span class="amount">Đang giao</span></td>
                                        <td class="li-product-price"><a href="{{route('order.detail',['id'=>$item->id])}}">Chi tiết</a></td>

                                        @endif


                                    </tr>

                                    @endif
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="col-sm-12">
        <div style="float: right;">

        </div>

    </div>
</div>
</div>
@endsection
@section('js')
<script>
    $(function() {
        $('.delete').on('click', function(e) {
            e.preventDefault();
            let urlreq = $(this).data('url');
            let that = $(this);
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {

                    $.ajax({
                        type: 'GET',
                        url: urlreq,
                        success: function(data) {
                            if (data.code == 200) {
                                that.parent().parent().remove();
                                Swal.fire(
                                    'Deleted!',
                                    'Your file has been deleted.',
                                    'success'
                                )
                            }
                        }
                    })

                }
            })
        })
    })
</script>
@endsection