  @extends('admin.layout.index')
  @section('content')
  <!-- Page Content -->
  <div id="page-wrapper">
      <div class="container-fluid">
          <div class="row">
             
              <!-- /.col-lg-12 -->
              <div class="col-lg-7" style="padding-bottom:120px">
                  <form accept-charset="utf-8" action="{{route('roles.insert')}}" method="post">
                      @csrf
                      <fieldset>
                          <div class="form-group">
                              <label for="disabledTextInput">Vai trò</label>
                              <input type="text" name="name" class="form-control" placeholder="Nhập tên" required>
                          </div>
                          <div class="form-group">
                              <label for="disabledTextInput">Mô tả vai trò</label>
                              <input type="text" name="displayname" class="form-control" placeholder="Mô tả vai trò" required>
                          </div>



                          <div class="row">

                              @foreach($data as $list)
                              <div class="form-group card">

                                  <div class="form-group" style="background-color: greenyellow;height:50px;">
                                      <input type="checkbox" class="checkbox_wrapper" name="pass">
                                      <label for="disabledTextInput">{{$list->displayname}}</label>
                                  </div>

                                  <div class="row">
                                      @foreach($list->permissionParent as $parent)
                                      <div class="col-md-3">
                                          <input class="checkbox_child" type="checkbox" value="{{$parent->id}}" name="roles[]">
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

  @section('js')

  <script>
$('.checkbox_wrapper').on('click',function(){
    $(this).parents('.card').find('.checkbox_child').prop('checked',$(this).prop('checked'));
})
  </script>
  @endsection