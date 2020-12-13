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
                    <form accept-charset="utf-8" action="{{route('category.create')}}" method="post">
                        @csrf
                        <fieldset >
                            <div class="form-group">
                                <label for="disabledTextInput">Tên danh mục</label>
                                <input type="text" name="name"  class="form-control" placeholder="Nhập tên danh mục" required >
                            </div>
                            <div class="form-group">
                                <label for="disabledSelect">Danh mục</label>
                                <select class="form-control" name="parent_id">
                               <option value="0">Danh mục cha</option>
                                        {!!$option!!}
                                 
                                </select>
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