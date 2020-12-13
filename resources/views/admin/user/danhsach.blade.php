  @extends('admin.layout.index')
  @section('content')
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                <div class="row" style="display:inline">
        <h4 style="display:inline-block;" class="card-header">Account</h4>
        <div style="float:right">
          <a href="{{route('user.add')}}"><button class="btn btn-success">Thêm Account</button></a>
        </div>
      </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $list)
                    <tr class="odd gradeX" align="center">
                      <td>{{$list->id}}</td>
                      <td>{{$list->name}}</td>
                      <td>{{$list->email}}</td>
                      <td>{{$list->active}}</td>
                      <td width="10%">

                        @if($list->active==1)
                        <a href="{{route('user.updates',['id'=>$list->id,'status'=>0])}}"><i class="fa fa-check-square" style="color:#23AD1E;" aria-hidden="true"></i></a>

                        @else
                        <a href="{{route('user.updates',['id'=>$list->id,'status'=>1])}}"><i class="fa fa-check-square" style="color:red" aria-hidden="true"></i></a>

                        @endif
                      </td>
                      <td width="3%" class="center"><a href="{{route('user.edit',['id'=>$list->id]).'?page='.request()->page}}"><i class="fa fa-pencil fa-fw" style="color:blue" ></i> </a></td>
                      <td width="3%" class="center"> <a class="delete" data-url="{{route('user.delete',['id'=>$list->id])}}"><i style="color:red" class="fa fa-minus-circle fa-fw"  ></i></a></td>
                    </tr>
                    @endforeach

                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
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