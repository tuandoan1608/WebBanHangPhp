  @extends('admin.layout.index')
  @section('content')
  <!-- Page Content -->
  <div id="page-wrapper">
      <div class="container-fluid">
          <div class="row">
              <div class="col-lg-12">
                  <h1 class="page-header">Category
                      <small>Add</small>
                  </h1>
              </div>
              <!-- /.col-lg-12 -->
              <div class="col-lg-7" style="padding-bottom:120px">
                  <form accept-charset="utf-8" action="{{route('roles.update',['id'=>$data->id])}}" method="post">
                      @csrf
                      <fieldset>
                          <div class="form-group">
                              <label for="disabledTextInput">Vai trò</label>
                              <input type="text" name="name" value="{{$data->name}}" class="form-control" placeholder="Nhập tên">
                          </div>
                          <div class="form-group">
                              <label for="disabledTextInput">Mô tả vai trò</label>
                              <input type="text" value="{{$data->display_name}}" name="displayname" class="form-control" placeholder="Mô tả vai trò" >
                          </div>



                          <div class="row">

                              @foreach($warper as $list)
                              <div class="form-group card">

                                  <div class="form-group" style="background-color: greenyellow;height:50px;">
                                      <input type="checkbox" class="checkbox_wrapper" name="pass">
                                      <label for="disabledTextInput">{{$list->displayname}}</label>
                                  </div>

                                  <div class="row">
                                      @foreach($list->permissionParent as $parent)
                                      <div class="col-md-3">
                                          <input {{$roleselect->contains('id',$parent->id)? 'checked':''}} class="checkbox_child" type="checkbox" value="{{$parent->id}}" name="roles[]">
                                          <label for="disabledTextInput">{{$parent->displayname}}</label>
                                      </div>
                                      @endforeach
                                  </div>

                              </div>
                              @endforeach

                          </div>
                          <button type="submit" class="btn btn-primary">Lưu</button>
                      </fieldset>
                  </form>
              </div>
          </div>
          <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
  </div>
        <!-- /#page-wrapper -->
@endsection