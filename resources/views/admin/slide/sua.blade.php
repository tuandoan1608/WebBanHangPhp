  @extends('admin.layout.index')
  @section('content')
  <!-- Page Content -->
  <div id="page-wrapper">
      <div class="container-fluid">
          <div class="row">
              <div class="col-lg-12">
                  <h4 class="page-header">slide
                      <small>Edit</small>
                  </h4>
              </div>
              <!-- /.col-lg-12 -->
              <div class="col-lg-7" style="padding-bottom:120px">
                  <form action="{{route('slide.update',['id'=>$data->id])}})}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                          <label>Hình ảnh</label>
                          <input type="file" value="{{$data->image}}" class="form-control-file" name="imgSlide" />
                      </div>
                      <div class="form-group">
                          <label>Tiêu đề</label>
                          <input class="form-control" value="{{$data->title}}" name="txtTitle" placeholder="Nhập tiêu đề" require />
                      </div>
                      <div class="form-group">
                          <label>Mô tả</label>
                          <input class="form-control" value="{{$data->descript}}" name="txtDescript" placeholder="nhập mô tả" require />
                      </div>

                      <div class="form-group">
                          <label>Status:</label>
                         

                              @if($data->status==1)
                              <label class="radio-inline">
                                  <input name="rdoStatus" value="1" checked="" type="radio">Hiện
                              </label>
                              <label class="radio-inline">
                                  <input name="rdoStatus" value="0"  type="radio">Ẩn
                              </label>
                              @else
                              <label class="radio-inline">
                                  <input name="rdoStatus" value="1" type="radio">Hiện
                              </label>
                              <label class="radio-inline">
                                  <input name="rdoStatus" value="0" checked="" type="radio">Ẩn
                              </label>

                              @endif


                       

                      </div>
                      <button type="submit" class="btn btn-default">Save</button>
                      <button type="reset" class="btn btn-default">Reset</button>
                      <form>
              </div>
          </div>
          <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
  </div>
  <!-- /#page-wrapper -->
  @endsection