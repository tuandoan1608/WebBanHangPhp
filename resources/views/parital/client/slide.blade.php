<div class="slider-with-banner">
                <div class="container">
                    <div class="row">
                        <!-- Begin Slider Area -->
                        <div class="col-lg-8 col-md-8">
                            <div class="slider-area">
                                <div class="slider-active owl-carousel">
                                    <!-- Begin Single Slide Area -->
                                    @foreach($data as $slide)
                                    <div class="single-slide align-center-left  animation-style-01 bg-1" style="background-image: url({{$slide->image}});">
                                        <div class="slider-progress"></div>
                                        <div class="slider-content">
                                            
                                          
                                        </div>
                                    </div>
                                    @endforeach
                                   
                                </div>
                            </div>
                        </div>
                        <!-- Slider Area End Here -->
                        <!-- Begin Li Banner Area -->
                        <div class="col-lg-4 col-md-4 text-center pt-xs-30">
                            <div class="li-banner">
                                <a href="#">
                                    <img src="https://www.petcity.vn/media/banner/09_Novf4e658d141ce1a9b9153a5c0a908f089.png" alt="">
                                </a>
                            </div>
                            <div class="li-banner mt-15 mt-sm-30 mt-xs-30">
                                <a href="#">
                                    <img src="https://www.petcity.vn/media/banner/02_Oct6bbadff35bba34210dfceff24be0c2ea.png" alt="">
                                </a>
                            </div>
                        </div>
                        <!-- Li Banner Area End Here -->
                    </div>
                </div>
            </div>