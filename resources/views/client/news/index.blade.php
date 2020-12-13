@extends('layout.client')


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
<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="index.html">Home</a></li>
                <li class="active">{{request()->slug}}</li>
            </ul>
        </div>
    </div>
</div>
<!-- Li's Breadcrumb Area End Here -->
<!-- Begin Li's Main Blog Page Area -->
<div class="li-main-blog-page pt-60 pb-55">
    <div class="container">
        <div class="row">
            <!-- Begin Li's Main Content Area -->
            <div class="col-lg-9 order-lg-1 order-1">
                <div class="row li-main-content">
                    @foreach($newcontent as $new)
                    <div class="col-lg-12">
                        <div class="li-blog-single-item mb-30">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="li-blog-banner">
                                        <a href="blog-details-left-sidebar.html"><img class="img-full" src="{{$new->image}}" alt=""></a>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="li-blog-content">
                                        <div class="li-blog-details">
                                            <h3 class="li-blog-heading pt-xs-25 pt-sm-25"><a href="{{route('newdetail.detail',['id'=>$new->id,'slug'=>$new->slug])}}">{{$new->name}}</a></h3>
                                            <div class="li-blog-meta">
                                                <a class="author" href="#"><i class="fa fa-user"></i>Admin</a>
                                                <a class="comment" href="#"><i class="fa fa-eye"></i> {{$new->View_count}} Lược xem</a>
                                                <a class="post-time" href="#"><i class="fa fa-calendar"></i> {{$new->created_at}}</a>
                                            </div>
                                            <p>{{$new->descript}}</p>
                                            <a class="read-more" href="{{route('newdetail.detail',['id'=>$new->id,'slug'=>$new->slug])}}">Xem thêm...</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    <!-- Begin Li's Pagination Area -->
                    <div class="col-lg-12">
                        <div class="li-paginatoin-area text-center pt-25">
                            <div class="row">
                                <div class="col-lg-12">

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Li's Pagination End Here Area -->
                </div>
            </div>
            <!-- Li's Main Content Area End Here -->
            <!-- Begin Li's Blog Sidebar Area -->
            <div class="col-lg-3 order-lg-2 order-2">
                <div class="li-blog-sidebar-wrapper">
                    <div class="li-blog-sidebar">
                        <div class="li-sidebar-search-form pt-xs-30 pt-sm-30">
                            <div class="fb-page" data-href="https://www.facebook.com/KemBoplus" data-tabs="timeline" data-width="250" data-height="200" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                                <blockquote cite="https://www.facebook.com/KemBoplus" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/KemBoplus">Pet house shop</a></blockquote>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- Li's Blog Sidebar Area End Here -->
        </div>
    </div>
</div>
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