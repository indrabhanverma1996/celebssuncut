
@extends('layouts.appFront')

@section('content')

 <div class="middle-sidebar-bottom">
                <div class="middle-sidebar-left pe-0">
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="card heading shadow-xss w-100 d-block d-flex mb-3">
                                <h2 class="fw-700 mb-0 mt-0 font-md text-grey-900 mega-star">Mega Star</h2>
                                <p><b>100m+ followers</b></p>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="dropdown">
                                <button onclick="myFunction()" class="dropbtn">Filter</button>
                                <div id="myDropdown" class="dropdown-content">
                                    <input type="text" placeholder="Search.." id="myInput" onkeyup="filterFunction()">
                                    <a href="#about">Fashion</a>
                                    <a href="#about">Sport</a>
                                    <a href="#about">Influencers</a>
                                    <a href="#base">Vip Club</a>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-12">
                            <div class="row ps-2 pe-1">

                                <div class="col-md-4 col-sm-6 pe-2 ps-2">
                                    <div class="card d-block border-0 shadow-xss rounded-3 overflow-hidden mb-3">
                                        <div class="card-body position-relative h200 bg-image-cover bg-image-center" style="background-image: url({{url('/')}}/public/front_assets/images/bb-16.jpg);"></div>
                                        <div class="card-body d-block w-100 pl-10 pe-4  pt-0 text-left position-relative">
                                            <figure class="avatar position-absolute w75 z-index-1" style="top:-40px; left: 15px;"><img src="{{url('/')}}/public/front_assets/images/user-12.png" alt="image" class="float-right p-1 bg-white rounded-circle w-100"></figure>
                                            <div class="clearfix"></div>
                                            <h4 class="fw-700 font-xsss mt-3 mb-1">Dwayne Johnson</h4>
                                            <div class="megastar-icon"><img src="{{url('/')}}/public/front_assets/images/star.jpg"></div>

                                        </div>
                                        <div class="text-center"> <a href="#" class="text-center bg-current text-white">Subscribe</a></div>
                                        <ul class="mega-li">
                                            <li>Sport, Film, TV <span class="mega-star">Mega Star</span></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6 pe-2 ps-2">
                                    <div class="card d-block border-0 shadow-xss rounded-3 overflow-hidden mb-3">
                                        <div class="card-body position-relative h200 bg-image-cover bg-image-center" style="background-image: url({{url('/')}}/public/front_assets/images/bb-15.jpg);"></div>
                                        <div class="card-body d-block w-100 pl-10 pe-4 pt-0 text-left position-relative">
                                            <figure class="avatar position-absolute w75 z-index-1" style="top:-40px; left: 15px;"><img src="{{url('/')}}/public/front_assets/images/user_1.png" alt="image" class="float-right p-1 bg-white rounded-circle w-100"></figure>
                                            <div class="clearfix"></div>
                                            <h4 class="fw-700 font-xsss mt-3 mb-1">Cristiano Ronaldo</h4>
                                            <!--  <a href="#" class="text-center p-2 lh-24 w150 ms-1 ls-3 d-inline-block rounded-xl bg-current font-xsss fw-700 ls-lg text-white">Subscribe</a>-->
                                            <div class="megastar-icon"><img src="{{url('/')}}/public/front_assets/images/star.jpg"></div>
                                        </div>
                                        <div class="text-center"> <a href="#" class="text-center bg-current text-white">Subscribe</a></div>
                                        <ul class="mega-li">
                                            <li>Sport, Film, TV <span class="mega-star">Mega Star</span></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="col-md-4 col-sm-6 pe-2 ps-2">
                                    <div class="card d-block border-0 shadow-xss rounded-3 overflow-hidden mb-3">
                                        <div class="card-body position-relative h200 bg-image-cover bg-image-center" style="background-image: url({{url('/')}}/public/front_assets/images/bb-14.jpg);"></div>
                                        <div class="card-body d-block w-100 pl-10 pe-4 pt-0 text-left position-relative">
                                            <figure class="avatar position-absolute w75 z-index-1" style="top:-40px; left: 15px;"><img src="{{url('/')}}/public/front_assets/images/user_2.png" alt="image" class="float-right p-1 bg-white rounded-circle w-100"></figure>
                                            <div class="clearfix"></div>
                                            <h4 class="fw-700 font-xsss mt-3 mb-1">Kim Kardashian</h4>

                                            <div class="megastar-icon"><img src="{{url('/')}}/public/front_assets/images/star.jpg"></div>
                                        </div>
                                        <div class="text-center"> <a href="#" class="text-center bg-current text-white">Subscribe</a></div>
                                        <ul class="mega-li">
                                            <li>Sport, Film, TV <span class="mega-star">Mega Star</span></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="col-md-4 col-sm-6 pe-2 ps-2">
                                    <div class="card d-block border-0 shadow-xss rounded-3 overflow-hidden mb-3">
                                        <div class="card-body position-relative h200 bg-image-cover bg-image-center" style="background-image: url({{url('/')}}/public/front_assets/images/bb-13.jpg);"></div>
                                        <div class="card-body d-block w-100 pl-10 pe-4 pt-0 text-left position-relative">
                                            <figure class="avatar position-absolute w75 z-index-1" style="top:-40px; left: 15px;"><img src="{{url('/')}}/public/front_assets/images/user-3.png" alt="image" class="float-right p-1 bg-white rounded-circle w-100"></figure>
                                            <div class="clearfix"></div>
                                            <h4 class="fw-700 font-xsss mt-3 mb-1">Selena Gomez</h4>

                                            <div class="megastar-icon"><img src="{{url('/')}}/public/front_assets/images/star.jpg"></div>
                                        </div>
                                        <div class="text-center"> <a href="#" class="text-center bg-current text-white">Subscribe</a></div>
                                        <ul class="mega-li">
                                            <li>Sport, Film, TV <span class="mega-star">Mega Star</span></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="col-md-4 col-sm-6 pe-2 ps-2">
                                    <div class="card d-block border-0 shadow-xss rounded-3 overflow-hidden mb-3">
                                        <div class="card-body position-relative h200 bg-image-cover bg-image-center" style="background-image: url({{url('/')}}/public/front_assets/images/bb-12.jpg);"></div>
                                        <div class="card-body d-block w-100 pl-10 pe-4 pt-0 text-left position-relative">
                                            <figure class="avatar position-absolute w75 z-index-1" style="top:-40px; left: 15px;"><img src="{{url('/')}}/public/front_assets/images/user-4.png" alt="image" class="float-right p-1 bg-white rounded-circle w-100"></figure>
                                            <div class="clearfix"></div>
                                            <h4 class="fw-700 font-xsss mt-3 mb-1">Ariana Grande</h4>
                                            <div class="megastar-icon"><img src="{{url('/')}}/public/front_assets/images/star.jpg"></div>
                                        </div>
                                        <div class="text-center"> <a href="#" class="text-center bg-current text-white">Subscribe</a></div>
                                        <ul class="mega-li">
                                            <li>Sport, Film, TV <span class="mega-star">Mega Star</span></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="col-md-4 col-sm-6 pe-2 ps-2">
                                    <div class="card d-block border-0 shadow-xss rounded-3 overflow-hidden mb-3">
                                        <div class="card-body position-relative h200 bg-image-cover bg-image-center" style="background-image: url({{url('/')}}/public/front_assets/images/bb-11.jpg);"></div>
                                        <div class="card-body d-block w-100 pl-10 pe-4 pt-0 text-left position-relative">
                                            <figure class="avatar position-absolute w75 z-index-1" style="top:-40px; left: 15px;"><img src="{{url('/')}}/public/front_assets/images/user-5.png" alt="image" class="float-right p-1 bg-white rounded-circle w-100"></figure>
                                            <div class="clearfix"></div>
                                            <h4 class="fw-700 font-xsss mt-3 mb-1">Britney Spears</h4>
                                            <div class="megastar-icon"><img src="{{url('/')}}/public/front_assets/images/star.jpg"></div>
                                        </div>
                                        <div class="text-center"> <a href="#" class="text-center bg-current text-white">Subscribe</a></div>
                                        <ul class="mega-li">
                                            <li>Sport, Film, TV <span class="mega-star">Mega Star</span></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-12 pe-2 ps-2">
                                    <div class="card w-100 text-center shadow-xss rounded-xxl border-0 p-4 mb-3 mt-0">
                                        <div class="snippet mt-2 ms-auto me-auto" data-title=".dot-typing">
                                            <div class="stage">
                                                <div class="dot-typing"></div>
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


@endsection