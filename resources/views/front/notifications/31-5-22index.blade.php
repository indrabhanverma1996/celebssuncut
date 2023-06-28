 @extends('layouts.appFront')

@section('content')
<style>button,
input {
    font-family: "Montserrat", "Helvetica Neue", Arial, sans-serif;
}

a {
    color: #f96332;
}

a:hover,
a:focus {
    color: #f96332;
}

p {
    line-height: 1.61em;
    font-weight: 300;
    font-size: 1.2em;
}

.category {
    text-transform: capitalize;
    font-weight: 700;
    color: #9A9A9A;
}

body {
    color: #2c2c2c;
    font-size: 14px;
    font-family: "Montserrat", "Helvetica Neue", Arial, sans-serif;
    overflow-x: hidden;
    -moz-osx-font-smoothing: grayscale;
    -webkit-font-smoothing: antialiased;
}

.nav-item .nav-link,
.nav-tabs .nav-link {
    -webkit-transition: all 300ms ease 0s;
    -moz-transition: all 300ms ease 0s;
    -o-transition: all 300ms ease 0s;
    -ms-transition: all 300ms ease 0s;
    transition: all 300ms ease 0s;
}

.card a {
    -webkit-transition: all 150ms ease 0s;
    -moz-transition: all 150ms ease 0s;
    -o-transition: all 150ms ease 0s;
    -ms-transition: all 150ms ease 0s;
    transition: all 150ms ease 0s;
}

[data-toggle="collapse"][data-parent="#accordion"] i {
    -webkit-transition: transform 150ms ease 0s;
    -moz-transition: transform 150ms ease 0s;
    -o-transition: transform 150ms ease 0s;
    -ms-transition: all 150ms ease 0s;
    transition: transform 150ms ease 0s;
}

[data-toggle="collapse"][data-parent="#accordion"][aria-expanded="true"] i {
    filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=2);
    -webkit-transform: rotate(180deg);
    -ms-transform: rotate(180deg);
    transform: rotate(180deg);
}


.now-ui-icons {
    display: inline-block;
    font: normal normal normal 14px/1 'Nucleo Outline';
    font-size: inherit;
    speak: none;
    text-transform: none;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}

@-webkit-keyframes nc-icon-spin {
    0% {
        -webkit-transform: rotate(0deg);
    }

    100% {
        -webkit-transform: rotate(360deg);
    }
}

@-moz-keyframes nc-icon-spin {
    0% {
        -moz-transform: rotate(0deg);
    }

    100% {
        -moz-transform: rotate(360deg);
    }
}

@keyframes nc-icon-spin {
    0% {
        -webkit-transform: rotate(0deg);
        -moz-transform: rotate(0deg);
        -ms-transform: rotate(0deg);
        -o-transform: rotate(0deg);
        transform: rotate(0deg);
    }

    100% {
        -webkit-transform: rotate(360deg);
        -moz-transform: rotate(360deg);
        -ms-transform: rotate(360deg);
        -o-transform: rotate(360deg);
        transform: rotate(360deg);
    }
}

.now-ui-icons.objects_umbrella-13:before {
    content: "\ea5f";
}

.now-ui-icons.shopping_cart-simple:before {
    content: "\ea1d";
}

.now-ui-icons.shopping_shop:before {
    content: "\ea50";
}

.now-ui-icons.ui-2_settings-90:before {
    content: "\ea4b";
}

.nav-tabs {
    border: 0;
    padding: 15px 0.7rem;
}

.nav-tabs:not(.nav-tabs-neutral)>.nav-item>.nav-link.active {
    box-shadow: 0px 5px 35px 0px rgba(0, 0, 0, 0.3);
}

.card .nav-tabs {
    border-top-right-radius: 0.1875rem;
    border-top-left-radius: 0.1875rem;
}

.nav-tabs>.nav-item>.nav-link {
    color: #888888;
    margin: 0;
    margin-right: 5px;
    background-color: transparent;
    border: 1px solid transparent;
    border-radius: 30px;
    font-size: 14px;
    padding: 11px 23px;
    line-height: 1.5;
}

.nav-tabs>.nav-item>.nav-link:hover {
    background-color: transparent;
}

.nav-tabs>.nav-item>.nav-link.active {
    background-color: #ddd;
    border-radius: 30px;
    color: #FFFFFF;
}

.nav-tabs>.nav-item>.nav-link i.now-ui-icons {
    font-size: 14px;
    position: relative;
    top: 1px;
    margin-right: 3px;
}

.nav-tabs.nav-tabs-neutral>.nav-item>.nav-link {
    color: #FFFFFF;
}

.nav-tabs.nav-tabs-neutral>.nav-item>.nav-link.active {
    background-color: rgba(255, 255, 255, 0.2);
    color: #FFFFFF;
}

.card {
    border: 0;
    border-radius: 0.1875rem;
    display: inline-block;
    position: relative;
    width: 100%;
    margin-bottom: 30px;
    box-shadow: 0px 5px 25px 0px rgba(0, 0, 0, 0.2);
}

.card .card-header {
    background-color: transparent;
    border-bottom: 0;
    background-color: transparent;
    border-radius: 0;
    padding: 0;
}

.card[data-background-color="orange"] {
    background-color: #f96332;
}

.card[data-background-color="red"] {
    background-color: #FF3636;
}

.card[data-background-color="yellow"] {
    background-color: #FFB236;
}

.card[data-background-color="blue"] {
    background-color: #2CA8FF;
}

.card[data-background-color="green"] {
    background-color: #15b60d;
}

[data-background-color="orange"] {
    background-color: #e95e38;
}

[data-background-color="black"] {
    background-color: #2c2c2c;
}

[data-background-color]:not([data-background-color="gray"]) {
    color: #FFFFFF;
}

[data-background-color]:not([data-background-color="gray"]) p {
    color: #FFFFFF;
}

[data-background-color]:not([data-background-color="gray"]) a:not(.btn):not(.dropdown-item) {
    color: #FFFFFF;
}

[data-background-color]:not([data-background-color="gray"]) .nav-tabs>.nav-item>.nav-link i.now-ui-icons {
    color: #FFFFFF;
}


@font-face {
  font-family: 'Nucleo Outline';
  src: url("https://github.com/creativetimofficial/now-ui-kit/blob/master/assets/fonts/nucleo-outline.eot");
  src: url("https://github.com/creativetimofficial/now-ui-kit/blob/master/assets/fonts/nucleo-outline.eot") format("embedded-opentype");
  src: url("https://raw.githack.com/creativetimofficial/now-ui-kit/master/assets/fonts/nucleo-outline.woff2");
  font-weight: normal;
  font-style: normal;
        
}

.now-ui-icons {
  display: inline-block;
  font: normal normal normal 14px/1 'Nucleo Outline';
  font-size: inherit;
  speak: none;
  text-transform: none;
  /* Better Font Rendering */
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}


footer{
    margin-top:50px;
    color: #555;
    background: #fff;
    padding: 25px;
    font-weight: 300;
    background: #f7f7f7;
    
}
.footer p{
    margin-bottom: 0;
}
footer p a{
    color: #555;
    font-weight: 400;
}

footer p a:hover{
    color: #e86c42;
}

@media screen and (max-width: 768px) {

    .nav-tabs {
        display: inline-block;
        width: 100%;
        padding-left: 100px;
        padding-right: 100px;
        text-align: center;
    }

    .nav-tabs .nav-item>.nav-link {
        margin-bottom: 5px;
    }
}









</style>
 <div class="middle-sidebar-bottom">
                <div class="middle-sidebar-left">
                    <div class="row feed-body">
  <div class="col-xl-6 col-xxl-8 col-lg-8">
<div class="container mt-5">
  <div class="row">
    <div class="col-md-12 ml-auto col-xl-12 mr-auto">
      <p class="category">Notifications</p>
      <!-- Nav tabs -->
      <div class="card">
        <div class="card-header">
          <ul class="nav nav-tabs justify-content-center" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" data-toggle="tab" href="#home" role="tab">
                 all
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#profile" role="tab">
                 comments
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#messages" role="tab">
                Mentions
              </a>
            </li>
            
          </ul>
        </div>
        <div class="card-body">
          <!-- Tab panes -->
          <div class="tab-content text-center">
            <div class="tab-pane active" id="home" role="tabpanel">
              <p>All</p>
            </div>
            <div class="tab-pane" id="profile" role="tabpanel">
              <p> Comments </p>
            </div>
            <div class="tab-pane" id="messages" role="tabpanel">
              <p>Mentions</p>
            </div>
         
          </div>
        </div>
      </div>
    </div>
 
  </div>
</div>
                        </div>
 <div class="col-xl-5 col-xxl-8 col-lg-8">
                            <div class="right-side">
                                <div class="row">
                                    <div class="col-xl-12 col-xxl-12 col-lg-12 ps-lg-0">

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