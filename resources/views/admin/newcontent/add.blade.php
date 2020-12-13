  @extends('admin.layout.index')


  @section('title', 'Trang quảng trị')

  @section('css')


  @endsection

  @section('content')
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

     
           
                  <div class="card" >
                 
                      <div class="card-body ">
                          <form accept-charset="utf-8" action="{{route('newscontent.store')}}" method="post" enctype="multipart/form-data">
                              @csrf
                              <fieldset>
                                  <div class="form-group">
                                      <label for="disabledTextInput">Tiêu đề</label>
                                      <input type="text" name="name" class="form-control" placeholder="Nhập tiêu đề" required>
                                  </div>
                                  <div class="form-group">
                                      <label for="disabledTextInput">Mô tả</label>
                                      <textarea rows="5" type="text" name="descript" class="form-control" placeholder="Nhập mô tả" required></textarea>
                                  </div>
   
                                  <div class="form-group ">
                                      <label for="disabledTextInput">Ảnh đại diện</label>
                                      <input type="file" name="feature_image_path" class="form-control-file" required>
                                  </div>
                                 
                                  
                             
                                  <div class="form-group ">
                                      <label for="disabledSelect">Danh mục</label>
                                      <select class="form-control" name="new">
                                          {!!$select!!}

                                      </select>
                                  </div>
                              
                                  <div class="form-group ">
                                      <label for="disabledTextInput">Nội dung</label>
                                      <textarea class="form-control my-editor" id="exampleFormControlTextarea1" name="content" rows="25" ></textarea>
                                  </div>
                                  <br>
                                 
                                  <br>
                                  <button type="submit" class="btn btn-primary">Submit</button>
                              </fieldset>
                          </form>
                      </div>
                  </div>
            
          </div>
      </div>
  </div>
  @endsection
  @section('js')


  <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>
    var editor_config = {
    path_absolute : "/",
    selector: "textarea.my-editor",
    plugins: [
      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars code fullscreen",
      "insertdatetime media nonbreaking save table contextmenu directionality",
      "emoticons template paste textcolor colorpicker textpattern"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
    relative_urls: false,
    file_browser_callback : function(field_name, url, type, win) {
      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
      var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

    //   var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
    //   if (type == 'image') {
    //     cmsURL = cmsURL + "&type=Images";
    //   } else {
    //     cmsURL = cmsURL + "&type=Files";
    //   }
      var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name='+field_name+'&lang='+ tinymce.settings.language;
      if (type == 'image') {
        cmsURL = cmsURL + "&type=Images";
      } else {
        cmsURL = cmsURL + "&type=Files";
      }
      tinyMCE.activeEditor.windowManager.open({
        file : cmsURL,
        title : 'Filemanager',
        width : x * 0.8,
        height : y * 0.8,
        resizable : "yes",
        close_previous : "no"
      });
    }
  };

  tinymce.init(editor_config);

  
</script>
  @endsection