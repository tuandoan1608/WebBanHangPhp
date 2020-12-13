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
                    <form accept-charset="utf-8" action="{{route('coupon.create').'?type=' .request()->type}}" method="post">
                        @csrf
                        <fieldset >
                            <div class="form-group">
                                <label for="disabledTextInput">Tên coupon</label>
                                <input type="text" name="name"  class="form-control" placeholder="Nhập tên coupon" required >
                            </div>
                            <div class="form-group">
                                <label for="disabledTextInput">Code coupon</label>
                                <input type="text" name="code"  class="form-control" required >
                            </div>
                        
                            <div class="form-group">
                                <label for="disabledTextInput">Discount</label>
                                <input type="text" name="Discount"  class="form-control" placeholder="Chĩ cần nhập số"  required >
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