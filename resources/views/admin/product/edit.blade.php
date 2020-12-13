  @extends('admin.layout.index')
  @section('content')
  <div id="page-wrapper">
      <div class="content-wrapper">
        
      <section class="content-header" style="padding-top: 10px;">
           
           <ol id="menu" class="breadcrumb">
               <li><a href="{{route('dashboard.index')}}"><i class="fa fa-dashboard"></i> Home</a></li>
               <li><a href="{{route('order.index')}}">Sản phẩm</a></li>
               <li class="active">List</li>
           </ol>
       </section>
           
                  <div class="card" >
                 
                      <div class="card-body ">
                          <form accept-charset="utf-8" action="{{route('product.update',['id'=>$data->id])}}" method="post" enctype="multipart/form-data">
                              @csrf
                              <fieldset>
                                  <div class="form-group">
                                      <label for="disabledTextInput">Tên sản phẩm</label>
                                      <input type="text" name="name" class="form-control" value="{{$data->name}}" required>
                                  </div>
                          
                                  <div class="form-group ">
                                      <label for="disabledTextInput">Giá sản phẩm</label>
                                      <input type="text" name="price" class="form-control" value="{{$data->price}}" required>
                                  </div>
                           
                                  <div class="form-group ">
                                      <label for="disabledTextInput">Thương hiệu</label>
                                      <input type="text" name="brand" class="form-control" value="{{$data->brand }}" >
                                  </div>
                               
                                  <div class="form-group ">
                                      <label for="disabledTextInput">Ảnh đại diện</label>
                                      <input type="file" name="feature_image_path" value="{{$data->image}}" class="form-control-file" >
                                  </div>
                                  <div class="form-group">
                                        <img width="15%" height="15%" src="{{$data->image}}" alt="">
                                  </div>
                                 
                                  <div class="form-group " >
                                      <label for="disabledTextInput">Ảnh chi tiết</label>
                                      <input type="file" name="image_path[]"  class="form-control-file" multiple >
                                  </div>
                                   <div class="row">
                                   <div class="form-group">
                                  
                                        @foreach( $users as $productItem =>$value)
                                      
                                        <div class="col-md-2">
                                            <img width="100%" height="100%" src="{{$value->image}}" alt="">
                                        
                                            <br>
                                           
                                        </div>
                                        @endforeach
                                    </div>
                                   </div>
                                  <div class="form-group " style="padding-top: 10px;">
                                      <label for="disabledSelect">Danh mục</label>
                                      <select class="js-example-basic-multiple" style="width:400px" name="category_id" >
                                        {!!$selectcategory!!}

                                      </select>
                                  </div>
                              
                                  <div class="form-group ">
                                      <label for="disabledTextInput">Nội dung</label>
                                      <textarea class="form-control my-editor" id="exampleFormControlTextarea1" name="Description" rows="15">{{$data->detail}}</textarea>
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


<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
  <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <script>
      $(document).ready(function() {
          $('.js-example-basic-multiple').select2();
      });

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