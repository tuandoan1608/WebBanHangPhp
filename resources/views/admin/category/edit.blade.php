   @extends('admin.layout.index')
  @section('content')
  <!-- Page Content -->
  <div id="page-wrapper">
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="main-conten">
        <div>
            <div class="card">
                <h5 class="card-header">Recent Orders</h5>
                <div class="card-body p-0">
                    <form accept-charset="utf-8" action="{{route('category.update',['id'=>$menu->id]).'?page='.request()->page}}" method="post">
                        @csrf
                        <fieldset >
                            <div class="form-group">
                                <label for="disabledTextInput">Tên danh mục</label>
                                <input type="text" name="name"  class="form-control" placeholder="Disabled input" value="{{$menu->name}}" required >
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
                         

                              @if($menu->status==1)
                              <label class="radio-inline">
                                  <input name="status" value="1" checked="" type="radio">Hiện
                              </label>
                              <label class="radio-inline">
                                  <input name="status" value="0"  type="radio">Ẩn
                              </label>
                              @else
                              <label class="radio-inline">
                                  <input name="status" value="1" type="radio">Hiện
                              </label>
                              <label class="radio-inline">
                                  <input name="status" value="0" checked="" type="radio">Ẩn
                              </label>

                              @endif


                       

                      </div>
                            
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
        <!-- /#page-wrapper -->
  </div>
@endsection