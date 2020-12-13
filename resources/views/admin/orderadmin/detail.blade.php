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


        <section class="content-header">
            <h1>
                Chi tiết đơn hàng
            </h1>
            <ol id="menu" class="breadcrumb">
                <li><a href="{{route('dashboard.index')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="{{route('order.index')}}">Bill</a></li>
                <li class="active">List</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="container123  col-md-6">
                                <h4></h4>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="col-md-4">Thông tin khách hàng</th>
                                            <th class="col-md-6"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Thông tin người đặt hàng</td>
                                            <td>{{ $od->lastname }} {{$od->firstname}}</td>
                                        </tr>
                                        <tr>
                                            <td>Ngày đặt hàng</td>
                                            <td>{{ $od->created_at }}</td>
                                        </tr>
                                        <tr>
                                            <td>Số điện thoại</td>
                                            <td>{{ $od->phone}}</td>
                                        </tr>
                                        <tr>
                                            <td>Địa chỉ</td>
                                            <td>{{ $od->address }}</td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td>{{ $od->email }}</td>
                                        </tr>
                                        <tr>
                                            <td>Ghi chú</td>
                                            <td>{{ $od->note }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <table id="myTable" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting col-md-1">STT</th>
                                        <th class="sorting_asc col-md-4">Tên sản phẩm</th>
                                        <th class="sorting col-md-2">Số lượng</th>
                                        <th class="sorting col-md-2">Giá tiền</th>
                                </thead>
                                <tbody>
                                    @foreach($billInfo as $key => $bill)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $bill->product_name }}</td>
                                        <td>{{ $bill->quantity }}</td>
                                        <td>{{ number_format($bill->total_price) }} VNĐ</td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="3"><b>Tổng tiền</b></td>
                                        <td colspan="1"><b class="text-red">{{$od->amount }} VNĐ</b></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <form>


                            <div class="col-md-8"></div>
                            <div class="col-md-4">
                                <div class="form-inline" style="float: right;">
                                    @if($od->status==1)
                                    <a id="lbstatus" style="background-color: blue;padding:4px;color:aliceblue;text-decoration:none;" href="{{route('order.updates',['id'=>$od->id,'status'=>2])}}">XÁC NHẬN ĐƠN HÀNG</a>
                                    @elseif($od->status==5)
                                    <label id="lbstatus">Trạng thái giao hàng: Đang giao </label>
                                    @elseif($od->status==3)
                                    <label id="lbstatus">Trạng thái giao hàng: Hoàn thành </label>
                                    @else
                                    <a id="lbstatus" style="background-color: blue;padding:4px;color:aliceblue;text-decoration:none;" href="{{route('order.updates',['id'=>$od->id,'status'=>5])}}">XÁC NHẬN GIAO HÀNG</a>
                                    @endif
                                    <a id="btnprint " style="border:none;color:white;background-color:blue;margin-left:25px;" class="print btn ">XUẤT PHIẾU</a>
                                    <label id="lbtext" style="display:none" id="lbstatus">Nhân viên </label>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </div>

</div>
</div>
@endsection
@section('js')
<script>
    $(function() {
        $('.print').on('click', function(e) {

            document.getElementById("lbstatus").style.display = 'none';
            document.getElementById("admin").style.display = 'none';
            document.getElementById("menu").style.display = 'none';
            document.getElementById("lbtext").style.display = 'inline';

            window.print();
            document.getElementById("lbstatus").style.display = 'inline-block';

            document.getElementById("menu").style.display = 'block';
            document.getElementById("lbtext").style.display = 'none';
            document.getElementById("admin").style.display = 'block';
        })
    })
</script>
@endsection