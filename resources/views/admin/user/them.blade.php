  @extends('admin.layout.index')
  @section('content')
  <!-- Page Content -->
  <div id="page-wrapper">
      <div class="container-fluid">
          <div class="row">
              <div class="col-lg-12">
                  <h1 class="page-header">Account
                      <small>Add</small>
                  </h1>
              </div>
              <!-- /.col-lg-12 -->
              <div class="col-lg-7" style="padding-bottom:120px">
                  <form accept-charset="utf-8" action="{{route('user.insert')}}" method="post">
                      @csrf
                      <fieldset>
                          <div class="form-group">
                              <label for="disabledTextInput">Tên</label>
                              <input type="text" name="name" class="form-control" placeholder="Nhập tên" required>
                          </div>
                          <div class="form-group">
                              <label for="disabledTextInput">Email</label>
                              <input type="text" name="email" class="form-control" placeholder="Nhập email" required>
                          </div>
                          <div class="form-group">
                              <label for="disabledTextInput">Password</label>
                              <input type="text" name="pass" class="form-control" placeholder="nhập Password" required>
                          </div>
                          <div class="form-group" style="width:400px">
                          <label for="disabledTextInput">Vai trò</label>
                              <select class="js-example-basic-multiple" style="width:400px" name="role[]" multiple="multiple">
                                  <option value="1">Admin</option>
                                
                                  <option value="2">content</option>
                              </select>
                          </div>
                          <div class="form-group">
                              <label>Status:</label>
                              <label class="radio-inline">
                                  <input name="status" value="1" checked="" type="radio">Active
                              </label>
                              <label class="radio-inline">
                                  <input name="status" value="0" type="radio">No active
                              </label>
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
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
  <script>
      $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
  </script>
  @endsection