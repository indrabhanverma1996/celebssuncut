 @extends('layouts.appFront')

@section('content')
 <div class="middle-sidebar-bottom">
                <div class="middle-sidebar-left">
                    <div class="row feed-body">
                        <div class="col-xl-6 col-xxl-8 col-lg-8">

                            <div class="card w-100 shadow-xss rounded-xxl border-0 p-4 mb-3">
                                <div class="card-body p-0 d-flex">
                                    <div class="poll-page">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h1><i class="feather-arrow-left"></i>NEW POST</h1>
                                            </div>
                                            <div class="col-md-6">
                                                <ul class="clear_post">
                                                    <li><a href="#" class="removeall remove-field">CLEAR</a></li>
                                                    <li><a href="#">POST</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="tabset poll_tab">
                                            <!-- Tab 1 -->
                                            <input type="radio" name="tabset" id="tab1" aria-controls="aboutinfo">
                                            <label for="tab1"><div class="tooltip-star"><i class="font-md  feather-calendar me-2"></i>
                                                <span class="tooltiptext">Schedule Posts</span>
                                            </div></label>
                                            <input type="radio" name="tabset" id="tab2" aria-controls="marzen" checked>
                                            <label for="tab2"><div class="tooltip-star"><i class="font-md  feather-bar-chart me-2"></i>
                                                <span class="tooltiptext">Add Poll</span>
                                            </div></label>
                                            <!-- Tab 2 -->


                                            <div class="tab-panels celebs_panel">
                                                <section id="aboutinfo" class="tab-panel">
                                                    <div class="card-body p-0 mt-3 position-relative">
                                                        <figure class="avatar position-absolute ms-2 mt-1 top-5"><img src="{{url('/')}}/public/front_assets/images/user-8.png" alt="image" class="shadow-sm rounded-circle w30"></figure>
                                                        <textarea name="message" class="h100 bor-0 w-100 rounded-xxl p-2 ps-5 font-xssss text-grey-500 fw-500 border-light-md theme-dark-bg" cols="30" rows="10" placeholder="What's on your mind?"></textarea>
                                                    </div>
                                                    <div class="card-body d-flex p-0 mt-0">
                                                        <div class='file'>
                                                            <label for='input-file'>
                                                                <i class="font-md text-danger feather-volume me-2"></i>Live Audio
                                                            </label>
                                                            <input id='input-file' type='file' />
                                                        </div>
                                                        <div class='file'>
                                                            <label for='input-file'>
                                                                <i class="font-md text-danger feather-video me-2"></i>Live Video
                                                            </label>
                                                            <input id='input-file' type='file' />
                                                        </div>
                                                        <div class='file'>
                                                            <label for='input-file'>
                                                                <i class="font-md text-success feather-image me-2"></i>Photo/Video
                                                            </label>
                                                            <input id='input-file' type='file' />
                                                        </div>
                                                        <a href="#" data-toggle="modal" data-target="#postsedual" class="tag"><i class="tag-icon"><img src="{{url('/')}}/public/front_assets/images/tag.png"></i><span class="d-none-xs">Schedule Post</span></a>
                                                    </div>
                                                </section>
                                                <section id="marzen" class="tab-panel poll_panel multi-field-wrapper">
                                                    <form role="form" action="#" method="POST" class="poll-area">
                                                        <label class="poll-popup"><a data-toggle="modal" data-target="#polloption" class="pollpopup"><i class="font-md  feather-bar-chart me-2"></i> Poll</a>  <a href="#" class="remove-field-all"> <input type="text" id="garlicBread1" size="50%" placeholder="1 Day" disabled><i class="fa fa-close removedcrose"></i></a></label>
                                                        <div class="">
                                                            <div class="multi-fields">
                                                                <div class="multi-field">
                                                                    <input type="text" name="stuff[]" placeholder="Enter option...">
                                                                    <button type="button" class="remove-field"><i class="fa fa-close"></i></button>
                                                                </div>
                                                            </div>
                                                            <button type="button" class="add-field bg-current">Add field</button>
                                                        </div>
                                                    </form>
                                                    <div class="card-body p-0 mt-3 position-relative">
                                                        <textarea name="message" class="h100 bor-0 w-100 rounded-xxl p-2 ps-5 font-xssss text-grey-500 fw-500 border-light-md theme-dark-bg" cols="30" rows="10" placeholder="Compose new post..."></textarea>
                                                    </div>
                                                </section>


                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-xxl-8 col-lg-8">
                            <div class="right-side">
                                <div class="row">
                                    <div class="col-xl-7 col-xxl-7 col-lg-7 ps-lg-0">

                                        <div class="card w-100 shadow-xss rounded-xxl border-0 mb-3">
                                            <div class="card-body search-boxright">
                                                <div class="form-group mb-0 icon-input">
                                                    <i class="feather-search font-sm text-grey-400"></i>
                                                    <input type="text" placeholder="Start typing to search.." class="bg-grey border-0 lh-32 pt-2 pb-2 ps-5 pe-3 font-xssss fw-500 rounded-xl theme-dark-bg">
                                                </div>
                                            </div>
                                            <!--End Search-->
                                            <div class="card-body d-flex pt-4 ps-4 pe-4 pb-0 border-top-xs bor-0">
                                                <div class="celebs_box">
                                                    <h4>Suggestions</h4>
                                                    <div class="banner-slider clebs-sugg owl-carousel owl-theme dot-style2 owl-nav-link link-style3">
                                                        <div class="owl-items style1  align-items-center">
                                                            <div class="celebs">
                                                                <img src="{{url('/')}}/public/front_assets/images/celebs1.jpg">
                                                                <div class="celebs-porfile-pic"><img src="{{url('/')}}/public/front_assets/images/celebs1.jpg"></div>
                                                                <div class="info-celebs-box">
                                                                    <h6>Cat</h6>
                                                                    <p>@ Catcall</p>
                                                                </div>
                                                            </div>
                                                            <div class="celebs">
                                                                <img src="{{url('/')}}/public/front_assets/images/celebs1.jpg">
                                                                <div class="celebs-porfile-pic"><img src="{{url('/')}}/public/front_assets/images/celebs1.jpg"></div>
                                                                <div class="info-celebs-box">
                                                                    <h6>Cat</h6>
                                                                    <p>@ Catcall</p>
                                                                </div>
                                                            </div>
                                                            <div class="celebs">
                                                                <img src="{{url('/')}}/public/front_assets/images/celebs1.jpg">
                                                                <div class="celebs-porfile-pic"><img src="{{url('/')}}/public/front_assets/images/celebs1.jpg"></div>
                                                                <div class="info-celebs-box">
                                                                    <h6>Cat</h6>
                                                                    <p>@ Catcall</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="owl-items style1 align-items-center">
                                                            <div class="celebs">
                                                                <img src="{{url('/')}}/public/front_assets/images/celebs1.jpg">
                                                                <div class="celebs-porfile-pic"><img src="{{url('/')}}/public/front_assets/images/celebs1.jpg"></div>
                                                                <div class="info-celebs-box">
                                                                    <h6>Cat</h6>
                                                                    <p>@ Catcall</p>
                                                                </div>
                                                            </div>
                                                            <div class="celebs">
                                                                <img src="{{url('/')}}/public/front_assets/images/celebs1.jpg">
                                                                <div class="celebs-porfile-pic"><img src="{{url('/')}}/public/front_assets/images/celebs1.jpg"></div>
                                                                <div class="info-celebs-box">
                                                                    <h6>Cat</h6>
                                                                    <p>@ Catcall</p>
                                                                </div>
                                                            </div>
                                                            <div class="celebs">
                                                                <img src="{{url('/')}}/public/front_assets/images/celebs1.jpg">
                                                                <div class="celebs-porfile-pic"><img src="{{url('/')}}/public/front_assets/images/celebs1.jpg"></div>
                                                                <div class="info-celebs-box">
                                                                    <h6>Cat</h6>
                                                                    <p>@ Catcall</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="owl-items style1 align-items-center">
                                                            <div class="celebs">
                                                                <img src="{{url('/')}}/public/front_assets/images/celebs1.jpg">
                                                                <div class="celebs-porfile-pic"><img src="{{url('/')}}/public/front_assets/images/celebs1.jpg"></div>
                                                                <div class="info-celebs-box">
                                                                    <h6>Cat</h6>
                                                                    <p>@ Catcall</p>
                                                                </div>
                                                            </div>
                                                            <div class="celebs">
                                                                <img src="{{url('/')}}/public/front_assets/images/celebs1.jpg">
                                                                <div class="celebs-porfile-pic"><img src="{{url('/')}}/public/front_assets/images/celebs1.jpg"></div>
                                                                <div class="info-celebs-box">
                                                                    <h6>Cat</h6>
                                                                    <p>@ Catcall</p>
                                                                </div>
                                                            </div>
                                                            <div class="celebs">
                                                                <img src="{{url('/')}}/public/front_assets/images/celebs1.jpg">
                                                                <div class="celebs-porfile-pic"><img src="{{url('/')}}/public/front_assets/images/celebs1.jpg"></div>
                                                                <div class="info-celebs-box">
                                                                    <h6>Cat</h6>
                                                                    <p>@ Catcall</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-xl-5 col-xxl-5 col-lg-5 ps-lg-0">
                                        <div class="card-body text-center">
                                            <h4 class="fw-700 mb-0 font-xssss text-grey-900">Our celeb's help over 5000 charities every day Thank you!</h4>

                                        </div>
                                        <div class="card w-100 shadow-xss rounded-xxl border-0 mb-3 right-box">
                                            <div class="card-bodyoverflow-hidden border-top-xs bor-0">
                                                <h4 class="fw-700 text-grey-900 font-xssss mt-1 text-center"></h4>
                                                <div class="subscribe-img">
                                                    <img src="{{url('/')}}/public/front_assets/images/g-2.jpg" alt="img" class="img-fluid mb-2"><a href="#"><i class="fa fa-youtube-play"></i>SUBSCRIBE</a>
                                                </div>
                                                <p class="text-center">Kim Kardashian has raised $ 1,200,00.00</p>
                                            </div>
                                            <div class="card-bodyoverflow-hidden border-top-xs bor-0">
                                                <div class="subscribe-img">
                                                    <img src="{{url('/')}}/public/front_assets/images/g-3.jpg" alt="img" class="img-fluid mb-2"><a href="#"><i class="fa fa-youtube-play"></i>SUBSCRIBE</a>
                                                </div>
                                                <p class="text-center">Christiano Ronaldo has raised $ 1,400,00.00</p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- main content -->

        <!-- right chat -->


        <div class="app-header-search">
            <form class="search-form">
                <div class="form-group searchbox mb-0 border-0 p-1">
                    <input type="text" class="form-control border-0" placeholder="Search...">
                    <i class="input-icon">
                        <ion-icon name="search-outline" role="img" class="md hydrated" aria-label="search outline"></ion-icon>
                    </i>
                    <a href="#" class="ms-1 mt-1 d-inline-block close searchbox-close">
                        <i class="ti-close font-xs"></i>
                    </a>
                </div>
            </form>
        </div>

    </div>
    
@endsection