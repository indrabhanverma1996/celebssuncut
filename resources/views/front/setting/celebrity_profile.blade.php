
@extends('layouts.appFront')
@section('content')

<div class="middle-sidebar-bottom">
   <div class="middle-sidebar-left">
      <div class="row feed-body">
         <div class="col-xl-6 col-xxl-8 col-lg-8">
            <div class="card w-100 border-0 p-0 bg-white shadow-xss rounded-xxl">
               <div class="card-body h250 p-0 rounded-xxl overflow-hidden m-3 profile-cover">
                  @if(!empty($users->cover_image))
                  <img src="{{url('/')}}/public/images/{{ $users->cover_image}}" alt="image">
                  @else
                  <img src="{{url('/')}}/public/front_assets/images/default-profile-pic-e1513291410505.jpg" alt="image">
                  @endif
                  <div class="vip-logo">
                     <a href="#"data-toggle="modal" data-target="#vipbenefits"><img src="{{url('/')}}/public/front_assets/images/vip.jpg"></a>
                     <!--<h4> <a href="#" data-toggle="modal" data-target="#subscribethanku" class="text-center p-2 lh-24 ms-1 ls-3 d-inline-block rounded-xl bg-current font-xssss fw-700 ls-lg subscribe text-white"><span>Subscribed For Free’ </span>
                        </a></h4>-->

                  @if(Auth::user()->id != $profile->id)
                   @if(!empty($subscribed ) or $flag ==2) 

                   @elseif($profile->subscribe_plan > 0) 
                     <h4> <a href="#" class="text-center p-2 lh-24 ms-1 ls-3 d-inline-block rounded-xl bg-current font-xssss fw-700 ls-lg subscribe text-white" onclick="subscribe('{{ $profile->id}}')"><span>Subscribe For $ {{$profile->subscribe_plan}} </span>
                        </a>
                     </h4>

                     @else
                      <h4> <a href="#" class="text-center p-2 lh-24 ms-1 ls-3 d-inline-block rounded-xl bg-current font-xssss fw-700 ls-lg subscribe text-white" onclick="subscribe('{{ $profile->id}}')"><span>Subscribe For Free </span>
                        </a>
                     </h4>

                     @endif
                     @else
                    
                     @endif
                  </div>
               </div>
               <div class="card-body p-0 position-relative">
                  @if(!empty($users->profile_image))
                  <figure class="avatar position-absolute w100 z-index-1" style="top:-40px; left: 30px;"><img src="{{url('/')}}/public/images/{{ $users->profile_image}}" alt="image" class="float-right p-1 bg-white rounded-circle w-100"></figure>
                  @else
                  <figure class="avatar position-absolute w100 z-index-1" style="top:-40px; left: 30px;"><img src="{{url('/')}}/public/front_assets/images/default-profile-pic-e1513291410505.jpg" alt="image" class="float-right p-1 bg-white rounded-circle w-100"></figure>
                  @endif
                  <h4 class="fw-700 font-sm mt-2 mb-4 pl-15">@if($flag==1) {{  $profile->name}} @else {{Auth::user()->name}} @endif<span class="fw-500 font-xssss text-grey-500 mt-1 mb-3 d-block">@if($flag==1){{  $profile->nickname}}  @else {{Auth::user()->nickname}}  @endif
                     Last seen  @php
                     if($lastlogin!=''){
                     $cu = date('Y-m-d H:i:s');
                     $a = $lastlogin->updated_at;
                     $d1= new DateTime($cu); 
                     $d2= new DateTime($a ); 
                     $interval= $d1->diff($d2); 
                     $hour = ($interval->days * 24) + $interval->h; 
                     if($hour>24){
                     $date  = strtotime($lastlogin->updated_at);
                     echo date('M-d ', $date);
                     }elseif($hour<1){
                     echo"Now Available";
                     }else{
                     echo$hour;echo"Hours";
                     }
                     }
                     @endphp
                     </span>
                  </h4>
                  <div class="profil-text">
                     <h5><b>{{Auth::user()->name_title}} </b></h5>
                     <p class="profile-flower"><span class="star-f maroon-bg"><img src="{{url('/')}}/public/front_assets/images/i1.png"> </span>


                     @if($followers > 10000)
                      <span class="star-f"><img src="{{url('/')}}/public/front_assets/images/star.jpg"> </span>Super Star <span>{{$followers}}+ followers</span>
                    @else
              <span class="star-f">{{$followers}}+ followers</span>
                    @endif

                   </p>
                  </div>
                  <div class="d-flex align-items-center justify-content-center position-absolute-md right-15 top-0 me-2">
                     <div class="editeprpofilebutton">
                        <a href="{{url('my/settings/profile')}}">
                        Edit profile 
                        </a>
                     </div>
                     <div class="tooltip-star"><i class="fa fa-star-o" alt></i>
                        <span class="tooltiptext">Add to favorites and other list</span>
                     </div>
                     <div class="tooltip-star"><i class="fa fa-link" alt></i>
                        <span class="tooltiptext">Copy link to profile</span>
                     </div>
                  </div>
               </div>
               <div class="card-body d-block w-100 shadow-none mb-0 p-0 border-top-xs">
                  <div class="social-media-s">
                     <ul>
                        <li>
                           <a href="@if(!empty($bank->instagram)) {{$bank->instagram}}@else @endif " target="_blank"><img src="{{url('/')}}/public/front_assets/images/i.png"></a>
                        </li>
                        <li>
                           <a href="#" target="_blank"><img src="{{url('/')}}/public/front_assets/images/f.png"></a>
                        </li>
                        <li>
                           <a href="@if(!empty($bank->twiter)) {{$bank->instagram}}@else @endif " target="_blank"><img src="{{url('/')}}/public/front_assets/images/t.png"></a>
                        </li>
                        <li>
                           <a href="#" target="_blank"><img src="{{url('/')}}/public/front_assets/images/u.png"></a>
                        </li>
                        <li>
                           <a href="#" target="_blank"><img src="{{url('/')}}/public/front_assets/images/t0.png"></a>
                        </li>
                        <li><a href="#" data-toggle="modal" data-target="#uncutsubscribe"> Click Here</a></li>
                     </ul>
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
                     <a href="#" data-toggle="modal" data-target="#postsedual" class="tag"><i class="tag-icon"> <i class="fa fa-picture-o"></i></i><span class="d-none-xs">Photo/Video</span></a>
                     <div class='file'><a href="{{url('poll')}}" class="d-flex align-items-center font-xssss fw-600 ls-1 text-grey-700 text-dark pe-4"><i class="font-md text-danger  feather-bar-chart me-2"></i><span class="d-none-xs">Poll</span></a></div>
                     <a href="#" class="ms-auto" id="dropdownMenu4" data-bs-toggle="dropdown" aria-expanded="false"><i class="ti-more-alt text-grey-900 btn-round-md bg-greylight font-xss"></i></a>
                     <div class="dropdown-menu dropdown-menu-start p-4 rounded-xxl border-0 shadow-lg" aria-labelledby="dropdownMenu4">
                        <div class="card-body p-0 d-flex">
                           <i class="feather-bookmark text-grey-500 me-3 font-lg"></i>
                           <h4 class="fw-600 text-grey-900 font-xssss mt-0 me-4">Save Link <span class="d-block font-xsssss fw-500 mt-1 lh-3 text-grey-500">Add this to your saved items</span></h4>
                        </div>
                        <div class="card-body p-0 d-flex mt-2">
                           <i class="feather-alert-circle text-grey-500 me-3 font-lg"></i>
                           <h4 class="fw-600 text-grey-900 font-xssss mt-0 me-4">Hide Post <span class="d-block font-xsssss fw-500 mt-1 lh-3 text-grey-500">Save to your saved items</span></h4>
                        </div>
                        <div class="card-body p-0 d-flex mt-2">
                           <i class="feather-alert-octagon text-grey-500 me-3 font-lg"></i>
                           <h4 class="fw-600 text-grey-900 font-xssss mt-0 me-4">Hide all from Group <span class="d-block font-xsssss fw-500 mt-1 lh-3 text-grey-500">Save to your saved items</span></h4>
                        </div>
                        <div class="card-body p-0 d-flex mt-2">
                           <i class="feather-lock text-grey-500 me-3 font-lg"></i>
                           <h4 class="fw-600 mb-0 text-grey-900 font-xssss mt-0 me-4">Unfollow Group <span class="d-block font-xsssss fw-500 mt-1 lh-3 text-grey-500">Save to your saved items</span></h4>
                        </div>
                     </div>
                  </div>
                  <div id="exTab1" class="">
                     <ul  class="nav nav-pills">
                        <li class="active">
                           <a  href="#1a" data-toggle="tab">About Info</a>
                        </li>
                        <li><a href="#2a" data-toggle="tab">{{$postcount}}  Posts</a>
                        </li>
                        <li><a href="#3a" data-toggle="tab">{{$postcount}} Media</a>
                        </li>
                     </ul>
                     <div class="tab-content clearfix">
                        <div class="tab-pane active" id="1a">
                           <section id="aboutinfo111" class="tab-panel">
                              <div class="card w-100 shadow-xss rounded-xxl border-0 p-4 mb-3">
                                 <p class="profile-flower"><i class="fa fa-info-circle" aria-hidden="true"></i>
                                    @php
                                    if(!empty($users)) { echo $users->name;  }else{ echo Auth::user()->name; } @endphp
                                 </p>
                                 <div class="card-body p-0 d-flex">
                                    <div class="row">
                                       <div class="col-md-5"><img src="{{url('/')}}/public/images/{{ $users->profile_image}}"></div>
                                       <div class="col-md-7">
                                          <div class="aboutinfotab">
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <p class="mt-10">@php
                                    if(!empty($users)){ echo $users->bio;  }else{ echo Auth::user()->bio; } @endphp
                                 </p>
                              </div>
                           </section>
                        </div>
                        <div class="tab-pane" id="2a">
                           <section id="marzen1" class="tab-panel">
                              @foreach($post as $postval)
                              @php   $comment = DB::table('tbl_post_comments')->where('post_id',$postval->id)->orderBy('id', 'DESC')->get(); 
                              @endphp 
                              <div class="card w-100 shadow-xss rounded-xxl border-0 p-4 mb-3">
                                 <div class="card-body p-0 d-flex">
                                    @if(!empty($users->profile_image)) 
                                    <figure class="avatar me-3"><img src="{{url('/')}}/public/images/{{ $users->profile_image}}" alt="image" class="shadow-sm rounded-circle w45"></figure>
                                    @else
                                    <figure class="avatar me-3"><img src="{{url('/')}}/public/front_assets/images/default-profile-pic-e1513291410505.jpg" alt="image" class="shadow-sm rounded-circle w45"></figure>
                                    @endif
                                    <h4 class="fw-700 text-grey-900 font-xssss mt-1 ">{{$users->name}}<span class="d-block font-xssss fw-500 mt-1 lh-3 text-grey-500 "> {{$postval->published_at}}</span></h4>
                                    <a href="#" class="ms-auto" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false"><i class="ti-more-alt text-grey-900 btn-round-md bg-greylight font-xss"></i></a>
                                    <div class="dropdown-menu dropdown-menu-end p-4 rounded-xxl border-0 shadow-lg" aria-labelledby="dropdownMenu2">
                                       <div class="card-body p-0 d-flex mt-2">
                                          <i class="feather-lock text-grey-500 me-3 font-lg"></i>
                                          <h4 class="fw-600 mb-0 text-grey-900 font-xssss mt-0 me-4">
                                             <form action="{{ url('/posts/delete', $postval->id) }}" class="d-inline-block" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Are you sure that you want to delete this post?')" class="btn btn-sm btn-danger">Delete Post</button>
                                             </form>
                                             <span class="d-block font-xsssss fw-500 mt-1 lh-3 text-grey-500"></span>
                                          </h4>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="card-body p-0 me-lg-5 ">
                                    <p class="fw-500 text-grey-500 lh-26 font-xssss w-100 ">
                                       {{$postval->content}}
                                       <!--   <a href="# " class="fw-600 text-primary ms-2 ">See more</a> -->
                                    </p>
                                 </div>
                                 @if(!empty($subscribed) or  $flag==2)
                                 <div class="card-body d-block p-0 ">
                                    <div class="row ps-2 pe-2 ">
                                       @php  $postimage = DB::table('tbl_post_images')->where('post_id',$postval->id)->orderBy('id', 'DESC')->get();
                                      
                                       @endphp
                                        <?php
               $now = date('Y-m-d h:i:s');
               if($postval->post_cat_id == 3 || $postval->post_cat_id == 4 || $postval->post_cat_id == 5)  
               
             $purchagedPost = DB::table('tbl_post_payment')->where('post_id',$postval->id)->where('expiry_date','>',$now)->first();
             else
             $purchagedPost = DB::table('tbl_post_payment')->where('post_id',$postval->id)->first();
          
                ?>
                                       @if(!empty($postimage)) 
                                       @foreach($postimage as $val)
                                       <?php $extension = substr($val->image, -3); ?>
                                       @if(count($postimage)==4 OR count($postimage)==2 )
                                       <div class="col-xs-6 col-sm-6 p-1">
                                          @if($extension=='mp4')
                                          <video width="200" height="200" controls>
                                             <source src="public/{{$val->image}}" type="video/mp4">
                                          </video>
                                          @else
                                          <a href="{{url('/')}}/images/posts/{{$val->image}}"  onclick="multiimage('{{$val->id}}','{{$val->likes}}')"   data-lightbox="roadtrip"><img src="{{url('/')}}/images/posts/{{$val->image}}" class="rounded-3 w-100" alt="image"></a>           
                                          @endif      
                                       </div>
                                       @elseif(count($postimage)==3)
                                       <div class="col-xs-4 col-sm-4 p-1">
                                          @if($extension=='mp4')
                                          <video width="200" height="200" controls>
                                             <source src="public/{{$val->image}}" type="video/mp4">
                                          </video>
                                          @else
                                          <a href="{{url('/')}}/images/posts/{{$val->image}}"     onclick="multiimage('{{$val->id}}','{{$val->likes}}')"   data-lightbox="roadtrip"><img src="{{url('/')}}/images/posts/{{$val->image}}" class="rounded-3 w-100" alt="image"></a>           
                                          @endif               
                                       </div>
                                       @else
                                       @if($purchagedPost!='' or Auth::user()->role_id== 2 or  $postval->amount== '')
                                       <div class="col-xs-12 col-sm-12 p-1">
                                          @if($extension=='mp4')
                                          <video loop autoplay muted controls class="float-right w-100 " width="320" height="240">
                                             <source src="public/{{$val->image}}" type="video/mp4 ">
                                          </video>
                                          @else
                                          <a href="{{url('/')}}/images/posts/{{$val->image}}"     onclick="multiimage('{{$val->id}}','{{$val->likes}}')"   data-lightbox="roadtrip"><img src="{{url('/')}}/images/posts/{{$val->image}}" class="rounded-3 w-100" alt="image"></a>           
                                          @endif            
                                       </div>
                                       @else
                                       <div class="card-body d-block p-0 ">
                                          <div class="row ps-2 pe-2 ">
                                             <div class="col-xs-12 col-sm-12 p-1">
                                                <img src="{{url('/')}}/public/images/outline-lock-icon-vector-eps-security-lock-outline-outline-lock-icon-vector-eps-security-lock-outline-sign-144153297.jpg" height="200px" width="200px" class="rounded-3 w-100" alt="image">        
                                             </div>
                                          </div>
                                       </div>
                                       <div class="subscribe-post "> <a href="# " class="text-center p-2 lh-24 ms-1 ls-3 d-inline-block rounded-xl bg-current font-xsss fw-700 ls-lg subscribe text-white " data-toggle="modal" data-target="#messagetips">
                                          unlock For $ {{$postval->amount}}
                                          </a>
                                       </div>
                                       @endif
                                       @endif
                                       @endforeach
                                       @endif 
                                    </div>
                                 </div>
                                 @else
                                 <div class="card-body d-block p-0 ">
                                    <div class="row ps-2 pe-2 ">
                                       <div class="col-xs-12 col-sm-12 p-1">
                                          <img src="{{url('/')}}/public/images/outline-lock-icon-vector-eps-security-lock-outline-outline-lock-icon-vector-eps-security-lock-outline-sign-144153297.jpg" height="200px" width="200px" class="rounded-3 w-100" alt="image">        
                                       </div>
                                    </div>
                                 </div>
                                 @endif
                                 <div class="card-body d-flex p-0 mt-3 ">
                                    <meta name="csrf-token" content="{{ csrf_token() }}">
                                    <a href="# "  onclick="likepost('{{$postval->id}}')" class="emoji-bttn d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss me-2 " disabled>
                                       <i class="feather-thumbs-up text-white bg-primary-gradiant me-1 btn-round-xs font-xss" ></i> <i class="feather-heart text-white bg-red-gradiant me-2 btn-round-xs font-xss "></i>
                                       <p id="postlike_{{$postval->id}}" class="like0">{{$postval->likes}}  </p>
                                       Like
                                    </a>
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
                                    <a href="# " onclick="postcomment('{{$postval->id}}')" class="d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss "><i class="feather-message-circle text-dark text-grey-900 btn-round-sm font-lg "></i><span class="d-none-xss ">{{$postval->comments}} Comment</span></a>
                                    <a href="# " id="dropdownMenu21 " data-bs-toggle="dropdown " aria-expanded="false " class="ms-auto d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss "><i class="feather-share-2
                                       text-grey-900 text-dark btn-round-sm font-lg "></i><span class="d-none-xs ">Share</span></a>
                                    <div class="dropdown-menu dropdown-menu-end p-4 rounded-xxl border-0 shadow-lg " aria-labelledby="dropdownMenu21 ">
                                       <h4 class="fw-700 font-xss text-grey-900 d-flex align-items-center ">Share <i class="feather-x ms-auto font-xssss btn-round-xs bg-greylight text-grey-900 me-2 "></i></h4>
                                       <div class="card-body p-0 d-flex ">
                                          <ul class="d-flex align-items-center justify-content-between mt-2 ">
                                             <li class="me-1 "><a href="# " class="btn-round-lg bg-facebook "><i class="font-xs ti-facebook text-white "></i></a></li>
                                             <li class="me-1 "><a href="# " class="btn-round-lg bg-twiiter "><i class="font-xs ti-twitter-alt text-white "></i></a></li>
                                             <li class="me-1 "><a href="# " class="btn-round-lg bg-linkedin "><i class="font-xs ti-linkedin text-white "></i></a></li>
                                             <li class="me-1 "><a href="# " class="btn-round-lg bg-instagram "><i class="font-xs ti-instagram text-white "></i></a></li>
                                             <li><a href="# " class="btn-round-lg bg-pinterest "><i class="font-xs ti-pinterest text-white "></i></a></li>
                                          </ul>
                                       </div>
                                       <div class="card-body p-0 d-flex ">
                                          <ul class="d-flex align-items-center justify-content-between mt-2 ">
                                             <li class="me-1 "><a href="# " class="btn-round-lg bg-tumblr "><i class="font-xs ti-tumblr text-white "></i></a></li>
                                             <li class="me-1 "><a href="# " class="btn-round-lg bg-youtube "><i class="font-xs ti-youtube text-white "></i></a></li>
                                             <li class="me-1 "><a href="# " class="btn-round-lg bg-flicker "><i class="font-xs ti-flickr text-white "></i></a></li>
                                             <li class="me-1 "><a href="# " class="btn-round-lg bg-black "><i class="font-xs ti-vimeo-alt text-white "></i></a></li>
                                             <li><a href="# " class="btn-round-lg bg-whatsup "><i class="font-xs feather-phone text-white "></i></a></li>
                                          </ul>
                                       </div>
                                       <h4 class="fw-700 font-xssss mt-4 text-grey-500 d-flex align-items-center mb-3 ">Copy Link</h4>
                                       <i class="feather-copy position-absolute right-35 mt-3 font-xs text-grey-500 "></i>
                                       <input type="text " value="https://socia.be/1rGxjoJKVF0 " class="bg-grey text-grey-500 font-xssss border-0 lh-32 p-2 font-xssss fw-600 rounded-3 w-100 theme-dark-bg ">
                                    </div>
                                 </div>
                                 @if(!empty($subscribed ) or $flag ==2)

                                 @elseif($profile->subscribe_plan > 0)
                                 <div class="subscribe-post "> <a href="# " class="text-center p-2 lh-24 ms-1 ls-3 d-inline-block rounded-xl bg-current font-xsss fw-700 ls-lg subscribe text-white " onclick="subscribe('{{ $profile->id}}')">
                                    Subscribe for $ {{$profile->subscribe_plan}}  
                                    </a>
                                 </div>
                                 @else
                                   <div class="subscribe-post "> <a href="# " class="text-center p-2 lh-24 ms-1 ls-3 d-inline-block rounded-xl bg-current font-xsss fw-700 ls-lg subscribe text-white " onclick="subscribe('{{ $profile->id}}')">
                                    Subscribe to see user's posts
                                    </a>
                                 </div>
                                 @endif
                              </div>
                              @foreach($comment as $cval)
                              @php $commentuser = DB::table('users')->where('id',$cval->comment_user_id )->orderBy('id', 'DESC')->first(); @endphp
                              @if(!empty($subscribed )or $flag ==2)
                                          <div  class="commentboxall">
               <div class="img-name">
                  @if(!empty($commentuser->profile_image))
                  <figure class="avatar me-3"><img src="{{url('/')}}/public/images/{{$commentuser->profile_image}}" alt="image" class="shadow-sm rounded-circle w35"></figure>
                  @elseif(!empty($commentuser->social_type))
                  <figure class="avatar me-3"><img src="{{url('/')}}/public/front_assets/images/default-profile-pic-e1513291410505.jpg" alt="image" class="shadow-sm rounded-circle w35"></figure>
                  @else
                  <figure class="avatar me-3"><img src="{{$commentuser->profile_image}}" alt="image" class="shadow-sm rounded-circle w35"></figure>
                  @endif
                  <h4 class="fw-700 text-grey-900 font-xssss mt-1 viewall">{{$commentuser->name}} <span class="d-block font-xssss fw-500 mt-1 lh-3 text-grey-500">{{$cval->comment}}</span></h4>
                  @if($cval->likes==0) 
                  <div  onclick="commentLike('{{$cval->id}}')" class="commentboxalllike "><i class="fa fa-heart"></i></div>
                  @else  
                  <div  onclick="commentLike('{{$cval->id}}')" class="commentboxalllike active"><i class="fa fa-heart"></i></div>
                  @endif  
               </div>
               <div class="reply">
                  <div class="clike">
                     <h6 id="clikes_{{$cval->id}}">  @if($cval->likes==0) @else  {{$cval->likes}} @endif  Like</h6>
                     <h6 onclick="postcomment('{{$cval->id}}')">reply</h6>
                     <a href="#" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false"><i class="ti-more-alt text-grey-900 btn-round-md bg-greylight font-xss"></i></a>
                     <div class="dropdown-menu dropdown-menu-end rounded-xxl border-0 shadow-lg" aria-labelledby="dropdownMenu2">
                        <div class="card-body p-0 d-flex">
                           <i class="feather-lock text-grey-500 me-3 font-lg"></i>
                           <h4 class="fw-600 mb-0 text-grey-900 font-xssss mt-0 me-4">
                              <button type="button" onclick="deletecomment('{{$cval->id}}')" class="btn btn-lg ">Delete </button>
                              <span class="d-block font-xsssss fw-500 mt-1 lh-3 text-grey-500"></span>
                           </h4>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
                        
                              <div class="reply">
                                 <div class="clike">
                                    <h6 onclick="commentLike('{{$cval->id}}')"> @if($cval->likes==0) @else  {{$cval->likes}} @endif   Like</h6>
                                    <h6 onclick="postcomment('{{$cval->id}}')">reply</h6>
                                 </div>
                              </div>
                              <div  class="comment-text_{{$cval->id}} comment-boxall">
                                 <div class="reply-to-reply">
                                    <!--@if(!empty($commentuser->profile_image))                       -->
                                    <!--             <figure class="avatar me-3"><img src="{{url('/')}}/public/images/{{ $commentuser->profile_image}}" alt="image" class="shadow-sm rounded-circle w45"></figure>-->
                                    <!--             @else-->
                                    <!--             <figure class="avatar me-3"><img src="{{url('/')}}/public/front_assets/images/default-profile-pic-e1513291410505.jpg" alt="image" class="shadow-sm rounded-circle w45"></figure> -->
                                    <!--         @endif-->
                                    <!--        <input type="search" name="" class="form-control" placeholder="Write a Reply... " onsearch="replycomment('{{$postval->id}}','{{$cval->id}}')" id="replycomment_{{$cval->id}}" >-->
                                    <!--<i class="fa fa-paper-plane" aria-hidden="true"></i>-->
                                 </div>
                              </div>
                              @endif
                              @endforeach
                              @if(!empty($subscribed ))
                              <div class="responsecomment{{$postval->id}} responsecomment_clike" >
                              </div>
                              <div class="comment">

                                 @if(Auth::user()->social_profile_image!='' and Auth::user()->social_id!='')                       
                                 <figure class="avatar me-3"><img src="{{Auth::user()->social_profile_image}}" alt="image" class="shadow-sm rounded-circle w45"></figure>
                                 @elseif(Auth::user()->profile_image)
                                  <figure class="avatar me-3"><img src="{{url('/')}}/public/images/{{ Auth::user()->profile_image}}" alt="image" class="shadow-sm rounded-circle w45"></figure>
                                  @else
                                 <figure class="avatar me-3"><img src="{{url('/')}}/public/front_assets/images/default-profile-pic-e1513291410505.jpg" alt="image" class="shadow-sm rounded-circle w45"></figure>
                                 @endif
                                 <input type="search"  class="form-control" id="commentval{{$postval->id}}" onsearch="postcommentsave('{{$postval->id}}')" placeholder="Write a Comment..."  >
                                 <i class="fa fa-paper-plane" aria-hidden="true"></i>
                              </div>
                              @endif
                              @endforeach
                           </section>
                        </div>
                        <div class="tab-pane" id="3a">
                           <section id="rauchbier1 " class="tab-panel ">
                              <div id="exTab1" class="">
                                 <ul class="nav nav-pills">
                                    <li class="active">
                                       <a href="#all" data-toggle="tab">all</a>
                                    </li>
                                    <li><a href="#photo" data-toggle="tab">Photo</a>
                                    </li>
                                    <li><a href="#video" data-toggle="tab">Video</a>
                                    </li>
                                 </ul>
                                 <div class="tab-content clearfix">
                                    <div class="tab-pane active" id="all">
                                       <section id="photo" class="tab-panel">
                                          <div class="card-body d-block p-0">
                                             <div class="row ps-2 pe-2">
                                                @foreach ($postimagevideo as $image)
                                                @php $extensionimage = substr($image->image, -3); @endphp
                                                @if($extensionimage=='jpg'||$extensionimage=='jpeg'||$extensionimage=='png' ||$extensionimage=='gif')
                                                <div class="col-xs-4 col-sm-4 p-1">
                                                   <a href="{{url('/')}}/images/posts/{{$image->image}}" data-lightbox="roadtrip"><img src="{{url('/')}}/images/posts/{{$image->image}}" class="rounded-3 w-100" alt="image"></a>
                                                </div>
                                                @endif
                                                @endforeach
                                             </div>
                                          </div>
                                       </section>
                                    </div>
                                    <div class="tab-pane" id="video">
                                       <section id=" " class="tab-panel ">
                                          <div class="card-body d-block p-0">
                                             <div class="row ps-2 pe-2">
                                                @foreach ($postimagevideo as $video)
                                                @php $extensionvideo = substr($video->image, -3); @endphp
                                                @if($extensionvideo=='mp4'|| $extensionvideo=='mkv')
                                                <div class="col-xs-4 col-sm-4 p-1">
                                                   <video width="200" height="200" controls>
                                                      <source src="public/{{$video->image}}" type="video/mp4">
                                                   </video>
                                                </div>
                                                @endif
                                                @endforeach
                                             </div>
                                          </div>
                                       </section>
                                    </div>
                                 </div>
                              </div>
                           </section>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
 <div id="messagetips" class="modal fade" role="dialog">
   <meta name="csrf-token" content="{{ csrf_token() }}">
   <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">SEND TIP</h4>
         </div>
         <div class="modal-body">
            <ul class="message-friend">
               </li>
               <li>
               </li>
            </ul>
            <div class="tipamountarea">
               <label>Tip amount</label>
               <input type="text" placeholder="Tip Amount">
               <label>Payment method <span>Minimum $5 USD</span></label>
               <div class="dropdown-wrapper">
                  <div class="ae-dropdown dropdown">
                     <div class="ae-select">
                        <span class="ae-select-content"></span>
                        <i class="fa fa-angle-down"></i>
                     </div>
                     <ul class="dropdown-menu ae-hide">
                        <li class='selected'><a><img src="{{url('/')}}/public/front_assets/images/download.png"> ... ... ... 7230 </a></li>
                        <li><a data-toggle="modal" data-target="#addcard">+ add new card </a></li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Save</button>
         </div>
      </div>
   </div>
</div>
         <div class="col-xl-6 col-xxl-6 col-lg-6">
            <div class="right-side home-rfixe" data-spy="affix" data-offset-top="270">
               <div class="row">
                  <div class="col-xl-8 col-xxl-8 col-lg-8 ps-lg-0">
                     <div class="card w-100 shadow-xss rounded-xxl border-0 mb-3">
                        <div class="card-body search-boxright">
                           <div class="form-group mb-0 icon-input">
                              <i class="feather-search font-sm text-grey-400"></i>
                              <input type="text" placeholder="Start typing to search.." class="bg-grey border-0 lh-32 pt-2 pb-2 ps-5 pe-3 font-xssss fw-500 rounded-xl theme-dark-bg">
                           </div>
                        </div>
                        <!--End Search-->
                        <div class="card-body d-flex pt-4 profile-rightside  pb-0 border-top-xs bor-0">
                           <div class="celebs_box">
                              <h4>Suggestions</h4>
                               <div class="banner-slider clebs-sugg owl-carousel owl-theme dot-style2 owl-nav-link link-style3">
                                 <div class="owl-items style1  align-items-center">
                                    @foreach($suggestion as $suggestionval)
                                    <div class="celebs">
                                       @if($suggestionval->profile_image=='')
                                       <img src="https://site2demo.in/celebs/public/images/default-profile-pic-e1513291410505.jpg">
                                       @else
                                       <img src="{{url('/')}}/public/images/{{$suggestionval->profile_image}}">
                                       @endif
                                       @php $parameter =['id' =>$suggestionval->id];
                                       $parameter = Crypt::encrypt($parameter); @endphp
                                       <div class="celebs-porfile-pic">  @if($suggestionval->cover_image=='')<img src="https://site2demo.in/celebs/public/images/default-profile-pic-e1513291410505.jpg">@else<img src="{{url('/')}}/public/images/{{ $suggestionval->cover_image}}"> @endif</div>
                                       <div class="info-celebs-box">
                                          <h6><a href="{{url('profile/'.$parameter)}}">{{$suggestionval->name}}</a></h6>
                                          <p>{{$suggestionval->nickname}}</p>
                                       </div>
                                    </div>
                                    @endforeach
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-4 col-xxl-4 col-lg-4 ps-lg-0">
                     <div class="card-body text-center">
                        <h4 class="fw-700 mb-0 mt-1 font-xssss text-grey-900">Watch my video to find out what's included with my UnCUT content, private messaging services & monthly subscription packages</h4>
                        <div class="subscribe-img text-center">
                           <img src="{{url('/')}}/public/front_assets/images/ppf.png" alt="img" class="img-fluid mb-2"><a href="#" data-toggle="modal" data-target="#uncutsubscribe">Click Here</a>
                        </div>
                     </div>
                     <div class="card w-100 shadow-xss rounded-xxl border-0 mb-3 right-box">
                        <div class="card-bodyoverflow-hidden border-top-xs bor-0">
                           <h4 class="fw-700 text-grey-900 font-xssss mt-1 text-center"></h4>
                           <a data-toggle="modal" data-target="#videosubscribe"> <img src="{{url('/')}}/public/front_assets/images/s2.png" alt="img" class="img-fluid mb-2"></a>
                           <p class="text-center mb-0"><b>Body by Lorrie</b></p>
                        </div>
                        <div class="card-bodyoverflow-hidden border-top-xs bor-0">
                           <div class="support-r">
                              <p>supports:</p>
                              <img src="{{url('/')}}/public/front_assets/images/s1.jpg" class="img-fluid mb-2">
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
<div class="app-header-search ">
   <form class="search-form ">
      <div class="form-group searchbox mb-0 border-0 p-1 ">
         <input type="text " class="form-control border-0 " placeholder="Search... ">
         <i class="input-icon ">
            <ion-icon name="search-outline " role="img " class="md hydrated " aria-label="search outline "></ion-icon>
         </i>
         <a href="# " class="ms-1 mt-1 d-inline-block close searchbox-close ">
         <i class="ti-close font-xs "></i>
         </a>
      </div>
   </form>
</div>
</div>

@endsection
@include('front.modal.Post_Popup')
@include('front.js.custom')