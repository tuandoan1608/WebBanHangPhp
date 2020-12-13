@extends('admin.layout.index')
  @section('content')
  <!-- Page Content -->
        <div id="page-wrapper">
        <div class="content-wrapper">
    <!-- Content Header (Page header) -->


    <div class="main-conten">
        <div>
            <div class="card">
                <h4 class="card-header">Danh mục sản phẩm</h4>
                <div class="card-body p-0">
                    <form accept-charset="utf-8" action="{{route('coupon.update',['id'=>$data->id])}}" method="post">
                        @csrf
                        <fieldset >
                            <div class="form-group">
                                <label for="disabledTextInput">Tên coupon</label>
                                <input type="text" name="name"  class="form-control" value="{{$data->name}}" required >
                            </div>
                            <div class="form-group">
                                <label for="disabledTextInput">Code coupon</label>
                                <input type="text" name="code"  class="form-control" value="{{$data->codeCoupon}}" required >
                            </div>
                        
                            <div class="form-group">
                               
                               @if($data->type==1)
                               <label for="disabledTextInput">Discount phần trăm</label>
                               <input type="text" name="Discount"  class="form-control" value="{{$data->discount}}"  required >
                               @else
                               <label for="disabledTextInput">Discount mệnh giá</label>
                               <input type="text" name="Discount"  class="form-control" value="{{$data->discount}}"  required >
                               @endif
                            </div>
                      
                            
                            <div class="form-group">
                                <label>Status:</label>
                                <label class="radio-inline">
                                    <input name="status" value="1" checked="" type="radio">Hiện
                                </label>
                                <label class="radio-inline">
                                    <input name="status" value="0" type="radio">Ẩn
                                </label>
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
        </div>
        <!-- /#page-wrapper -->
@endsection