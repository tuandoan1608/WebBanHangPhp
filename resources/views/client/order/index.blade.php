@extends('layout.client')
@section('seo')
<title>Thanh toán</title>

<meta name="description" content=" siêu thị đồ cho thú cưng,cửa hàng đồ chó mèo tại Hà Nội, Tp HCM, Đà Nẵng, Hải Phòng...:  pet shop quần áo phụ kiện,thức ăn đồ dùng, mỹ phẩm thuốc,nhà chuồng lồng nệm,đồ chơi.. Chính hãng giá tốt nhất,giao hàng toàn quốc | Vietnam pet store chain retail">
@endsection
@section('content')
<div class="container">
  <span style="padding: 10px;font-size:30px">Danh sách đơn hàng của bạn</span>
    <table class="table">
        <thead>
            <tr>
                <th class="li-product-remove">stt</th>

                <th class="cart-product-name">Tên khách hàng</th>

                <th class="cart-product-name">Số điện thoại</th>


                <th class="li-product-subtotal">Tổng tiền</th>
                <th class="li-product-subtotal">Trạng thái</th>
                <th class="li-product-subtotal">Ngày mua</th>
            </tr>
        </thead>
        <tbody>
            @foreach($od as $item)
            <tr>



                <td class="li-product-price"><span class="amount">{{$item->id}}</span></td>
                <td class="li-product-price"><span class="amount">{{$item->lastname}} {{$item->firstname}}</span></td>
                <td class="li-product-price"><span class="amount">{{$item->phone}}</span></td>
                <td class="li-product-price"><span class="amount">{{$item->amount}}</span></td>
                @if($item->status==1)
                <td class="li-product-price"><span style="color:black;background-color:#FFFF00">Đang chờ duyệt</span></td>
                <td class="li-product-price"><a class="delete btn btn-danger" style="cursor: pointer;color:white;padding:3px" data-url="{{route('removeorder',['id'=>$item->id])}}">Hủy đơn hàng</a></td>
                @elseif($item->status==2)
                <td class="li-product-price"><span style="color:#fff;background-color:#00BFFF">Đơn hàng đã duyệt</span></td>
                
                @elseif($item->status==3)
                <td class="li-product-price"><span style="color:black;background-color:#01DF01">Hoàn thành</span></td>
                @elseif($item->status==5)
                <td class="li-product-price"><span style="background-color: green;color:white;text-decoration:none">Đang giao</span></td>

                @elseif($item->status==4)
                <td class="li-product-price"><span style="color:#E0F8E0;background-color:red">Đơn hàng bị hủy</span></td>
                @endif
                <td class="li-product-price"><span class="amount">{{$item->created_at}}</span></td>
            </tr>
            @endforeach

        </tbody>
    </table>
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