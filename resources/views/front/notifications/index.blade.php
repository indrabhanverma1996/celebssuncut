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
            <div class="notificationspage card w-100 border-0 p-0 bg-white shadow-xss rounded-xxl">
               <div class="card-body h250 p-0 rounded-xxl overflow-hidden m-3">
               <div class="row">
                  <div class="col-md-12 ml-auto col-xl-12 mr-auto">
                     <p class="category">Notifications</p>
                     <!-- Nav tabs -->
                     <div class="card notifications">
                     <div id="exTab1" class="">	
<ul class="nav nav-pills">
			<li class="active">
        <a href="#all" data-toggle="tab">all</a>
			</li>
			<li><a href="#comments" data-toggle="tab">Comments</a>
			</li>
			<li><a href="#mentions" data-toggle="tab">Mentions</a>
			</li>
  		
		</ul>

			<div class="tab-content clearfix">
			  <div class="tab-pane active" id="all">
           <section id="comments" class="tab-panel">
                  <div class="card w-100 shadow-xss rounded-xxl border-0 p-4 mb-3">
                     <p class="profile-flower"><i class="fa fa-info-circle" aria-hidden="true"></i> Lorrie Morgan (Body by Lorrie)</p>
                     <div class="card-body p-0 d-flex">
                        <div class="row">
                           <div class="col-md-5"><img src="https://site2demo.in/celebs/public/front_assets/images/pinfo.jpg"></div>
                           <div class="col-md-7">
                              <div class="aboutinfotab">
                                 <p>When and where Lorrie Morgan was born?</p>
                                 <ul>
                                    <li>Age <span>62 years</span></li>
                                    <li>Birth date <span>June 27, 1959</span></li>
                                    <li>Zodiac sign <span>Cancer</span></li>
                                    <li>Place of Birth <span>United States </span></li>
                                    <li>Occupation <span>Singer, Fitness, Lifestyle, Motivation</span></li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                     </div>
                     <p class="mt-10">Loretta Lynn Morgan (born June 27, 1959) is an American country music singer. She is the daughter of George Morgan, a country music singer who charted several hit singles between 1949 and his death in
                        1975. Morgan charted her first single in 1978, although she did not break into the top of the U.S. country charts until her 1989 single, "Trainwreck of Emotion."
                     </p>
                  </div>
               </section>
				</div>
				<div class="tab-pane" id="2a">
            <section id="marzen1" class="tab-panel">
             </section>
				</div>
        <div class="tab-pane" id="mentions">
            <section id=" " class="tab-panel ">
                           <div class="card w-100 shadow-xss rounded-xxl border-0 p-4 mb-3 ">
                              <div class="card-body p-0 d-flex ">
                                 <figure class="avatar me-3 "><img src="https://site2demo.in/celebs/public/front_assets/images/Lorrie-Morgan.jpg" alt="image " class="shadow-sm rounded-circle w45 "></figure>
                                 <h4 class="fw-700 text-grey-900 font-xssss mt-1 ">Body by Lorrie<span class="d-block font-xssss fw-500 mt-1 lh-3 text-grey-500 ">2 hour ago</span></h4>
                                 <a href="# " class="ms-auto " id="dropdownMenu5 " data-bs-toggle="dropdown " aria-expanded="false "><i class="ti-more-alt text-grey-900 btn-round-md bg-greylight font-xss "></i></a>
                                 <div class="dropdown-menu dropdown-menu-start p-4 rounded-xxl border-0 shadow-lg " aria-labelledby="dropdownMenu5 ">
                                    <div class="card-body p-0 d-flex ">
                                       <i class="feather-bookmark text-grey-500 me-3 font-lg "></i>
                                       <h4 class="fw-600 text-grey-900 font-xssss mt-0 me-4 ">Save Link <span class="d-block font-xsssss fw-500 mt-1 lh-3 text-grey-500 ">Add this to your saved items</span></h4>
                                    </div>
                                    <div class="card-body p-0 d-flex mt-2 ">
                                       <i class="feather-alert-circle text-grey-500 me-3 font-lg "></i>
                                       <h4 class="fw-600 text-grey-900 font-xssss mt-0 me-4 ">Hide Post <span class="d-block font-xsssss fw-500 mt-1 lh-3 text-grey-500 ">Save to your saved items</span></h4>
                                    </div>
                                    <div class="card-body p-0 d-flex mt-2 ">
                                       <i class="feather-alert-octagon text-grey-500 me-3 font-lg "></i>
                                       <h4 class="fw-600 text-grey-900 font-xssss mt-0 me-4 ">Hide all from Group <span class="d-block font-xsssss fw-500 mt-1 lh-3 text-grey-500 ">Save to your saved items</span></h4>
                                    </div>
                                    <div class="card-body p-0 d-flex mt-2 ">
                                       <i class="feather-lock text-grey-500 me-3 font-lg "></i>
                                       <h4 class="fw-600 mb-0 text-grey-900 font-xssss mt-0 me-4 ">Unfollow Group <span class="d-block font-xsssss fw-500 mt-1 lh-3 text-grey-500 ">Save to your saved items</span></h4>
                                    </div>
                                 </div>
                              </div>
                              <div class="card-body p-0 mb-3 rounded-3 overflow-hidden ">
                                 <video loop="" autoplay="" muted="" controls="" class="float-right w-100 ">
                                    <source src="https://site2demo.in/celebs/public/front_assets/images/v-2.mp4 " type="video/mp4 ">
                                 </video>
                              </div>
                              <div class="card-body p-0 me-lg-5 ">
                                 <p class="fw-500 text-grey-500 lh-26 font-xssss w-100 mb-2
                                    ">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi nulla dolor, ornare at commodo non, feugiat non nisi. Phasellus faucibus mollis pharetra. Proin blandit ac massa sed rhoncus
                                    <!-- <a href="# "
                                       class="fw-600 text-primary ms-2 ">See more</a>-->
                                 </p>
                              </div>
                              <div class="card-body d-flex p-0 ">
                                 <a href="# " class="emoji-bttn d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss me-2 "><i class="feather-thumbs-up text-white bg-primary-gradiant me-1 btn-round-xs font-xss
                                    "></i> <i class="feather-heart text-white bg-red-gradiant me-2 btn-round-xs font-xss "></i>2.8K Like</a>
                                 <div class="emoji-wrap ">
                                    <ul class="emojis list-inline mb-0 ">
                                       <li class="emoji list-inline-item "><i class="em em---1 "></i> </li>
                                       <li class="emoji list-inline-item "><i class="em em-angry "></i></li>
                                       <li class="emoji list-inline-item "><i class="em em-anguished "></i> </li>
                                       <li class="emoji list-inline-item "><i class="em em-astonished "></i> </li>
                                       <li class="emoji list-inline-item "><i class="em em-blush "></i></li>
                                       <li class="emoji list-inline-item "><i class="em em-clap "></i></li>
                                       <li class="emoji list-inline-item "><i class="em em-cry "></i></li>
                                       <li class="emoji list-inline-item "><i class="em em-full_moon_with_face "></i></li>
                                    </ul>
                                 </div>
                                 <a href="# " class="d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss "><i class="feather-message-circle text-dark text-grey-900 btn-round-sm font-lg "></i><span class="d-none-xss ">22 Comment</span></a>
                                 <a href="# " class="ms-auto d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss "><i class="feather-share-2 text-grey-900 text-dark btn-round-sm font-lg
                                    "></i><span class="d-none-xs ">Share</span></a>
                              </div>
                              <div class="subscribe-post "> <a href="# " class="text-center p-2 lh-24 ms-1 ls-3 d-inline-block rounded-xl bg-current font-xsss fw-700 ls-lg subscribe text-white ">
                                 Subscribe to see user's posts
                                 </a>
                              </div>
                           </div>
                        </section>
			</div>
         
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