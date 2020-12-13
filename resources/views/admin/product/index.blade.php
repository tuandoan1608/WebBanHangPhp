   @extends('admin.layout.index')
   @section('css')
   <style>
     .dataTables_info,
     .dataTables_paginate,
     .dataTables_length {
       display: none;
     }

     .table-responsive {
       overflow: hidden;
     }
   </style>
   @endsection
   @section('content')
   <!-- Page Content -->
   <div id="page-wrapper">
     <div class="content-wrapper">
       <div class="row" style="display:inline">
         <h4 style="display:inline-block;" class="card-header"> Sản phẩm</h4>
         <div style="float:right">
           <a href="{{route('product.add')}}"><button class="btn btn-success">Thêm sản phẩm</button></a>
         </div>
       </div>

       <div class="main-conten">
         <div>
           <div class="card">



             <div class="card-body p-0">
               <div class="table-responsive">

                 <table class="table  table-bordered table-hover" id="dataTables-example">
                   <thead>

                     <tr align="center">
                       <th width="5%">#ID</th>
                       <th width="25%">Tên sản phẩm</th>

                       <th width="10%">Giá sản phẩm</th>

                       <th width="10%">Code</th>
                       <th width="10%">Hình ảnh</th>
                       <th width="5%">Tên danh mục</th>


                       <th>Sửa</th>
                       <th>Xóa</th>
                     </tr>
                   </thead>
                   <tbody>
                     @foreach($data as $menus)
                     <tr class=" odd gradeX" align="center">
                       <td>{{$menus->id}}</td>
                       <td>{{$menus->name}}</td>
                       <td>{{$menus->price}}</td>

                       <td>{{$menus->code}}</td>
                       <td><img class="thumbail" width="100px" height="100px" src="{{$menus->image}}" alt=""></td>
                       <td>{{$menus->categoryID}}</td>
                       <td width="3%" class="center"><a href="{{route('product.edit',['id'=>$menus->id])}}"><i class="fa fa-pencil fa-fw" style="color:blue"></i> </a></td>
                       <td width="3%" class="center"> <a class="delete" data-url="{{route('product.delete',['id'=>$menus->id])}}"><i style="color:red" class="fa fa-minus-circle fa-fw"></i></a></td>
                     </tr>
                     @endforeach

                   </tbody>
                 </table>
               </div>
             </div>
           </div>

         </div>
       </div>
       <div class="col-sm-12">
         <div style="float: right;">
           {{$data->links()}}
         </div>

       </div>
     </div>
   </div>
   <!-- /#page-wrapper -->
   @endsection

   @section('js')
   <script>
     $(function() {
       $('.delete').on('click', function(e) {
         e.preventDefault();
         let urlreq = $(this).data('url');
         let that = $(this);
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
               type: 'GET',
               url: urlreq,
               success: function(data) {
                 if (data.code == 200) {
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