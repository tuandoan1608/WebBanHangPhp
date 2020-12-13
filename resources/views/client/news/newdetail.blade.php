@extends('layout.client')

@section('title', 'Trang quảng trị')


@section('content')

<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="index.html">Home</a></li>
                <li class="active">{{$newdetail->name}}</li>
            </ul>
        </div>
    </div>
</div>
<!-- Li's Breadcrumb Area End Here -->
<!-- Begin Li's Main Blog Page Area -->
<div class="li-main-blog-page li-main-blog-details-page ">
    <div class="container">
        <div class="row">
            <!-- Begin Li's Blog Sidebar Area -->
            <div class="col-lg-3 order-lg-2 order-2">
                <div class="li-blog-sidebar-wrapper">
                    <div class="li-blog-sidebar">
                        <div class="li-sidebar-search-form">
                            <div class="fb-page" data-href="https://www.facebook.com/KemBoplus" data-tabs="timeline" data-width="200" data-height="150" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                                <blockquote cite="https://www.facebook.com/KemBoplus" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/KemBoplus">Pet house shop</a></blockquote>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- Li's Blog Sidebar Area End Here -->
            <!-- Begin Li's Main Content Area -->
            <div class="col-lg-9 order-lg-1 order-1">
                <div class="row li-main-content">
                    <div class="col-lg-12">
                        <div class="li-blog-single-item pb-30">
                            <div class="li-blog-banner">
                                <a href="blog-details.html"><img class="img-full" src="images/blog-banner/bg-banner.jpg" alt=""></a>
                            </div>
                            <div class="li-blog-content">
                                <div class="li-blog-details">
                                    <h3 class="li-blog-heading pt-25"><a href="#">{{$newdetail->name}}</a></h3>
                                    <div class="li-blog-meta">
                                        <a class="author" href="#"><i class="fa fa-user"></i>Admin</a>
                                        <a class="comment" href="#"><i class="fa fa-eye"></i> {{$newdetail->View_count}} Lược xem</a>
                                        <a class="post-time" href="#"><i class="fa fa-calendar"></i> {{$newdetail->created_at}}</a>
                                    </div>
                                    <div class="content">
                                        {!!$newdetail->content!!}
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- Li's Main Content Area End Here -->
        </div>
    </div>
</div>
@endsection