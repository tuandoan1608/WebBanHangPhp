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
    
</section>
<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <div class="row">
                <div class="col-md-12">
                    <div class="container123  col-md-6" >
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
                <form >
             
                   
                    <div class="col-md-8"></div>
                    <div class="col-md-4">
                        <div class="form-inline">
                         
                            
                            <a href="{{route('prin')}}"  class="btn btn-primary">Xuất phiếu</a>
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

@endsection



