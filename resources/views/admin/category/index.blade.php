  @extends('admin.layout.index')
  
  @section('css')
  <style>
    .dataTables_info,
    .dataTables_paginate,.dataTables_length {
      display: none;
    }

    .table-responsive {
      overflow: hidden;
    }
  </style>
  @endsection
  @section('content')
  <div id="page-wrapper">
    <div class="content-wrapper">
      <div class="row" style="display:inline">
        <h4 style="display:inline-block;" class="card-header">Danh mục sản phẩm</h4>
        <div style="float:right">
          <a href="{{route('category.add')}}"><button class="btn btn-success">Thêm danh mục</button></a>
        </div>
      </div>
      <div class="main-conten">
        <div>

          <div class="card">


            <div class="card-body p-0">
              <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                  <thead>
                    <tr align="center">
                      <th width="10%">ID</th>
                      <th>Tên danh mục</th>

                      <th>Status</th>
                      <th>Sửa</th>
                      <th>Xóa</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($listmn as $list)
                    <tr class="odd gradeX" align="center">
                      <td>{{$list->id}}</td>
                      <td>{{$list->name}}</td>

                      <td width="10%">
                      @if($list->status==1)
                        <a href="{{route('category.updates',['id'=>$list->id,'status'=>0])}}"><i class="fa fa-check-square" style="color:#23AD1E;" aria-hidden="true"></i></a>

                        @else
                        <a href="{{route('category.updates',['id'=>$list->id,'status'=>1])}}"><i class="fa fa-check-square" style="color:red" aria-hidden="true"></i></a>

                        @endif
                      </td>
                    
                      <td width="3%" class="center"><a href="{{route('category.edit',['id'=>$list->id]).'?page='.request()->page}}"><i class="fa fa-pencil fa-fw" style="color:blue" ></i> </a></td>
                      <td width="3%" class="center"> <a class="delete" data-url="{{route('category.delete',['id'=>$list->id])}}"><i style="color:red" class="fa fa-minus-circle fa-fw"  ></i></a></td>
                    </tr>
                    @endforeach

                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
      </div>

<div>
{{$listmn->links()}}
</div>
    </div>
  </div>
  </div>
  @endsection
  @section('js')
  <script>
    
$(function(){
  $('.delete').on('click',function(e ){
    e.preventDefault();
    let urlreq=$(this).data('url');
    let that=$(this);
    Swal.fire({
    title: 'Are you sure?',
    text: "You won't be able to revert this!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, delete it!'
  }).then((result) => {
    if (result.isConfirmed) {

      $.ajax({
        type:'GET',
        url:urlreq,
        success:function(data){
          if(data.code==200){
         that.parent().parent().remove();
         Swal.fire(
        'Deleted!',
        'Your file has been deleted.',
        'success'
      )
          }
        }
      })
    
    }
  })
  })
})
  </script>
  @endsection