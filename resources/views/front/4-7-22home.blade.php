@extends('layouts.appFront')
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
@if (session('status'))
<div class="alert alert-success" role="alert">
   {{ session('status') }}
</div>
@endif
@section('content')
<div class="middle-sidebar-left">
   <div class="row feed-body">
      <div class="col-md-12">
         <div class="uncutcontentcreator">
            <a href=""><img src="{{url('/')}}/public/front_assets/images/h1.jpg" alt="image"><h1>Content <span>Creators</span></h1></a>
         </div>
         <div class="card w-100 shadow-none bg-transparent bg-transparent-card border-0 p-0 mb-0">

<div class="owl-carousel reel_bg  category-card owl-theme overflow-hidden nav-none">
  
<div class="item">

                  <div data-bs-toggle="modal" data-bs-target="#Modalstory" class="ppp card w125 h200 d-block border-0 shadow-xss rounded-xxxl bg-gradiant-bottom overflow-hidden cursor-pointer mb-3 mt-3">
                  <div class="video_bg">
                     <div class="card-body d-block p-3 w-100 position-absolute bottom-0 text-center">
                     <div class="image-upload">
                        <a href="{{url('/stories/create')}}">
                          
                       

                           <span class="btn-round-lg bg-white"><i class="feather-plus font-lg"></i></span>
              
                           <div class="clearfix"></div>

                           <h4 class="fw-700 position-relative z-index-1 ls-1 font-xssss text-white mt-2 mb-1">Add Story </h4>
       
                        </a>
                        <input id="file-input" accept=".png, .jpg, .jpeg,.mp4" name="realvideo" onchange="statusvideos(this);" type="file" />
</div>

                     </div>
                     </div>
                  </div>

               </div>
              

   @foreach($postmedia as $postmediavideo)
   <div class="item">
<?php $extension = substr($postmediavideo->image, -3);

              $postuser = DB::table('users')->where('id',$postmediavideo->post_user_id)->first();
 $parameter =['id' =>$postuser->id];

                                         $parameters = Crypt::encrypt($parameter); 
                     ?>
      <div data-bs-toggle="modal" data-bs-target="#Modalstory" class="ppp card w125 h200 d-block border-0 shadow-xss rounded-xxxl bg-gradiant-bottom overflow-hidden cursor-pointer mb-3 mt-3">
         <div class="video_bg">
          @if($extension=='mp4' OR $extension=='MKV' )
         <video loop autoplay muted controls class="float-right w-100">

            <source src="public/{{$postmediavideo->image}}">

         </video>
          @endif
         <div class="card-body d-block  w-100 position-absolute bottom-0 text-center">

            <a href="#">
                @if(!empty($postuser->social_profile_image!='' and $postuser->social_id!=''))
                 <figure class="avatar ms-auto me-auto mb-0 position-relative w50 z-index-1"><img src="{{$val->profile_image}}" alt="image" class="float-right p-0 bg-white rounded-circle w-100 shadow-xss"></figure>
                  @elseif(!empty($postuser->profile_image))
                  <figure class="avatar ms-auto me-auto mb-0 position-relative w50 z-index-1"><img src="{{url('/')}}/public/images/{{ $postuser->profile_image}}" alt="image" class="float-right p-0 bg-white rounded-circle w-100 shadow-xss"></figure>
                  
                  @else
                   <figure class="avatar ms-auto me-auto mb-0 position-relative w50 z-index-1"><img src="{{url('/')}}/public/front_assets/images/default-profile-pic-e1513291410505.jpg" alt="image" class="float-right p-0 bg-white rounded-circle w-100 shadow-xss"> </figure>
                  
                  @endif
               

               <div class="clearfix"></div>

               <h4 class="fw-600 position-relative z-index-1 ls-1 font-xssss text-white mt-2 mb-1"><a href="{{url('profile/'.$parameters)}}" style="color:#f2f2f2;">{{$postuser->name}}</a></h4>

            </a>

         </div>
         </div>
      </div>

   </div>
  @endforeach
   

</div>

</div>
   
      </div>
      <div class="col-xl-6 col-xxl-6 col-lg-6">
         <div class="card w-100 shadow-xss rounded-xxl border-0 ps-4 pt-4 pe-4 pb-3 mb-3" >
            <div class="card-body p-0 d-flex">
               <a href="#" class=" font-xssss fw-600 text-grey-500 card-body p-0 d-flex align-items-center"><i class="btn-round-sm font-xs text-primary feather-edit-3 me-2 bg-greylight"></i>Create Post</a>
               <button class="post-btn" onclick="singlepost()">Post</button>
            </div>
            <div class="card-body p-0 mt-3 position-relative">
               @if(!$user->social_profile_image!='' and $user->social_id!='')
               <figure class="avatar position-absolute ms-2 mt-1 top-5"><img src="{{$user->social_profile_image}}" alt="image" class="shadow-sm rounded-circle w30"></figure>
               @elseif(!empty($user->profile_image))
              
                <figure class="avatar position-absolute ms-2 mt-1 top-5"><img src="{{url('/')}}/public/images/{{$user->profile_image}}" alt="image" class="shadow-sm rounded-circle w30"></figure>
               @else
              <figure class="avatar position-absolute ms-2 mt-1 top-5"><img src="{{url('/')}}/public/front_assets/images/default-profile-pic-e1513291410505.jpg" alt="image" class="shadow-sm rounded-circle w30"></figure>
               @endif
               <textarea name="message" class="mani-textare h100 bor-0 w-100 rounded-xxl p-2 ps-5 font-xssss text-grey-500 fw-500 border-light-md theme-dark-bg" cols="30" rows="10" placeholder="What's on your mind? {{$user->name}}" id="singlepost"></textarea>
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
         </div>
         <div class="card w-100 shadow-xss rounded-xxl border-0 p-4 mb-3 card-effect-none">
            @foreach($post as $postval)
            <div class="cardseperatore">
            <div class="card-body p-0 d-flex">
               @php  $users = DB::table('users')->where('id',$postval->user_id)->first(); 
               $comment = DB::table('tbl_post_comments')->where('post_id',$postval->id)->orderBy('id', 'DESC')->take(5)->get();
               $commentcount = count($comment);
               
               @endphp
               <?php
               $now = date('Y-m-d h:i:s');
               if($postval->post_cat_id == 3 || $postval->post_cat_id == 4 || $postval->post_cat_id == 5)  
               
             $purchagedPost = DB::table('tbl_post_payment')->where('post_id',$postval->id)->where('expiry_date','>',$now)->first();
             else
             $purchagedPost = DB::table('tbl_post_payment')->where('post_id',$postval->id)->first();
          
                ?>

                 @if(!$users->social_profile_image!='' and $users->social_id!=''))
                  <figure class="avatar me-3"><img src="{{ $users->social_profile_image}}" alt="image" class="shadow-sm rounded-circle w45"></figure>
              
               @elseif(!empty($users->profile_image))
               <figure class="avatar me-3"><img src="{{url('/')}}/public/images/{{ $users->profile_image}}" alt="image" class="shadow-sm rounded-circle w45"></figure>
               @else
               <figure class="avatar me-3"><img src="{{url('/')}}/public/front_assets/images/default-profile-pic-e1513291410505.jpg" alt="image" class="shadow-sm rounded-circle w45"></figure>
               @endif
              
               <h4 class="fw-700 text-grey-900 font-xssss mt-1">{{$users->name}} <span class="d-block font-xssss fw-500 mt-1 lh-3 text-grey-500">@php $date  = strtotime($postval->published_at); @endphp {{date('d-M-Y  h:i a', $date)}}</span></h4>
               @if($postval->user_id==Auth::user()->id )
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
               @endif
            </div>

            <div class="card-body p-0 me-lg-5">
               <p class="fw-500 text-grey-500 lh-26 font-xssss w-100">{{$postval->content}} <a href="#" class="fw-600 text-primary ms-2"></a></p>
            </div>
            <div class="card-body d-block p-0">
               <div class="row ps-2 pe-2 multi-photo">
                  @php  $postimage = DB::table('tbl_post_images')->where('post_id',$postval->id)->get();@endphp
                  @if(!empty($postimage)) 
                  @foreach($postimage as $val)
                  <?php $extension = substr($val->image, -3);
                     ?>
                  <input type="hidden" value="" id="multiid_{{ $val->id}}">
                   @if($purchagedPost!='' or Auth::user()->id == $postval->user_id )
                  @if(count($postimage)==4 OR count($postimage)==2 )
                  <div class="col-xs-6 col-sm-6 p-1">
                     @if($extension=='mp4')
                     <video loop autoplay muted controls class="float-right w-100 " width="320" height="240">
                        <source src="public/{{$val->image}}" type="video/mp4 ">
                     </video>
                     @else
                     <a href="{{url('/')}}/images/posts/{{$val->image}}"  onclick="multiimage('{{$val->id}}','{{$val->likes}}')"   data-lightbox="roadtrip"><img src="{{url('/')}}/images/posts/{{$val->image}}" class="rounded-3 w-100" alt="image"></a>           
                     @endif      
                  </div>
                  @elseif(count($postimage)==3)
                  <div class="col-xs-4 col-sm-4 p-1">
                     @if($extension=='mp4')
                     <video loop autoplay muted controls class="float-right w-100 " width="320" height="240">
                        <source src="public/{{$val->image}}" type="video/mp4 ">
                     </video>
                     @else
                     <a href="{{url('/')}}/images/posts/{{$val->image}}"     onclick="multiimage('{{$val->id}}','{{$val->likes}}')"   data-lightbox="roadtrip"><img src="{{url('/')}}/images/posts/{{$val->image}}" class="rounded-3 w-100" alt="image"></a>           
                     @endif               
                  </div>
                  @else
                  <div class="col-xs-12 col-sm-12 p-1">
                     @if($extension=='mp4')
                     <video loop autoplay muted controls class="float-right w-100 " width="320" height="240">
                        <source src="public/{{$val->image}}" type="video/mp4 " >
                     </video>
                     @else
                     <a href="{{url('/')}}/images/posts/{{$val->image}}"     onclick="multiimage('{{$val->id}}','{{$val->likes}}')"   data-lightbox="roadtrip"><img src="{{url('/')}}/images/posts/{{$val->image}}" class="rounded-3 w-100" alt="image"></a>           
                     @endif            
                  </div>

                  @endif
                  @else

                  <div class="col-xs-12 col-sm-12 p-1">                    
                     <img src="{{url('/')}}/public/images/outline-lock-icon-vector-eps-security-lock-outline-outline-lock-icon-vector-eps-security-lock-outline-sign-144153297.jpg" height="200px" width="200px" class="rounded-3 w-100" alt="image">
                     <div class="subscribe-post "> <a href="# " class="text-center p-2 lh-24 ms-1 ls-3 d-inline-block rounded-xl bg-current font-xsss fw-700 ls-lg subscribe text-white " data-toggle="modal" data-target="#postamount" onclick="price('{{$postval->amount}}','{{$postval->id}}')">
                        unlock For $ {{$postval->amount}}
                                          </a>
                                       </div>     
                  </div>
                  
                    @endif 
                  @endforeach
                  @endif

               </div>
            </div>
            <div class="card-body d-flex p-0 mt-3 like-commentarea ">
               <meta name="csrf-token" content="{{ csrf_token() }}">
               <a href="#"   class="emoji-bttn d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss me-2">
                  <i class="feather-thumbs-up bg-primary-gradiant me-1 btn-round-xs font-xss" ></i> <i class="feather-heart text-white bg-red-gradiant me-2 btn-round-xs font-xss" onclick="likepost('{{$postval->id}}')"></i>
                  <p id="postlike_{{$postval->id}}" class="like0">@if($postval->likes==0) @else {{$postval->likes}} @endif  </p>
                  Likes
               </a>
               <div class="emoji-wrap">
                  <ul class="emojis list-inline mb-0">
                     <li class="emoji list-inline-item"><i class="em em---1"></i> </li>
                     <li class="emoji list-inline-item"><i class="em em-angry"></i></li>
                     <li class="emoji list-inline-item"><i class="em em-anguished"></i> </li>
                     <li class="emoji list-inline-item"><i class="em em-astonished"></i> </li>
                     <li class="emoji list-inline-item"><i class="em em-blush"></i></li>
                     <li class="emoji list-inline-item"><i class="em em-clap"></i></li>
                     <li class="emoji list-inline-item"><i class="em em-cry"></i></li>
                     <li class="emoji list-inline-item"><i class="em em-full_moon_with_face"></i></li>
                  </ul>
               </div>
               <!--   <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo_{{$postval->id}}">comment</button>-->
               <a  class="d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss" onclick="postcomment('{{$postval->id}}')"><i class="feather-message-circle text-dark text-grey-900 btn-round-sm font-lg" ></i><span class="d-none-xss" id="commentcount{{$postval->id}}" >{{$commentcount}} Comment</span></a>
               <a href="#" id="dropdownMenu21" data-bs-toggle="dropdown" aria-expanded="false" class="ms-auto d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss"><i class="feather-share-2 text-grey-900 text-dark btn-round-sm font-sm"></i><span class="d-none-xs">Share</span></a>
               <div class="dropdown-menu dropdown-menu-end p-4 rounded-xxl border-0 shadow-lg" aria-labelledby="dropdownMenu21">
                  <h4 class="fw-700 font-xss text-grey-900 d-flex align-items-center">Share <i class="feather-x ms-auto font-xssss btn-round-xs bg-greylight text-grey-900 me-2"></i></h4>
                  <div class="card-body p-0 d-flex">
                     <ul class="d-flex align-items-center justify-content-between mt-2">
                        <li class="me-1"><a href="#" class="btn-round-lg bg-facebook"><i class="font-xs ti-facebook text-white"></i></a></li>
                        <li class="me-1"><a href="#" class="btn-round-lg bg-twiiter"><i class="font-xs ti-twitter-alt text-white"></i></a></li>
                        <li class="me-1"><a href="#" class="btn-round-lg bg-linkedin"><i class="font-xs ti-linkedin text-white"></i></a></li>
                        <li class="me-1"><a href="#" class="btn-round-lg bg-instagram"><i class="font-xs ti-instagram text-white"></i></a></li>
                        <li><a href="#" class="btn-round-lg bg-pinterest"><i class="font-xs ti-pinterest text-white"></i></a></li>
                     </ul>
                  </div>
                  <div class="card-body p-0 d-flex">
                     <ul class="d-flex align-items-center justify-content-between mt-2">
                        <li class="me-1"><a href="#" class="btn-round-lg bg-tumblr"><i class="font-xs ti-tumblr text-white"></i></a></li>
                        <li class="me-1"><a href="#" class="btn-round-lg bg-youtube"><i class="font-xs ti-youtube text-white"></i></a></li>
                        <li class="me-1"><a href="#" class="btn-round-lg bg-flicker"><i class="font-xs ti-flickr text-white"></i></a></li>
                        <li class="me-1"><a href="#" class="btn-round-lg bg-black"><i class="font-xs ti-vimeo-alt text-white"></i></a></li>
                        <li><a href="#" class="btn-round-lg bg-whatsup"><i class="font-xs feather-phone text-white"></i></a></li>
                     </ul>
                  </div>
                  <h4 class="fw-700 font-xssss mt-4 text-grey-500 d-flex align-items-center mb-3">Copy Link</h4>
                  <i class="feather-copy position-absolute right-35 mt-3 font-xs text-grey-500"></i>
                  <input type="text" value="https://socia.be/1rGxjoJKVF0" class="bg-grey text-grey-500 font-xssss border-0 lh-32 p-2 font-xssss fw-600 rounded-3 w-100 theme-dark-bg">
               </div>
            </div>
            <!--  <div  class="comment-text_{{$postval->id}} comment-boxall">
               <figure class="avatar me-3"><img src="{{url('/')}}/public/front_assets/images/default-profile-pic-e1513291410505.jpg" alt="image" class="shadow-sm rounded-circle w35"></figure> 
               
                 <h4 class="fw-700 text-grey-900 font-xssss mt-1">{{$users->name}} <span class="d-block font-xssss fw-500 mt-1 lh-3 text-grey-500">looking nice</span></h4>
               
                 <div class="reply">
               
                 <h6>like</h6>
               
                 <h6>reply</h6></div>
               
                 <div class="reply-to-reply">
               
                    <figure class="avatar me-3"><img src="{{url('/')}}/public/front_assets/images/default-profile-pic-e1513291410505.jpg" alt="image" class="shadow-sm rounded-circle w35"></figure>
               
                     <input type="text" name="" class="form-control" id="demo" placeholder="Write a Reply...">
               
               <i class="fa fa-paper-plane" aria-hidden="true"></i>
               
               </div>
               
               <div class="comment">
               
                                   <figure class="avatar me-3"><img src="{{url('/')}}/public/front_assets/images/default-profile-pic-e1513291410505.jpg" alt="image" class="shadow-sm rounded-circle w35"></figure>
               
                   <input type="text" name="" class="form-control" id="demo" placeholder="Write a Comment...">
               
                   <i class="fa fa-paper-plane" aria-hidden="true"></i>
               
               </div>
               
                </div> -->
            @foreach($comment as $cval)
            @php $comment = DB::table('users')->where('id',$cval->comment_user_id )->first();
            $replycommentuser = DB::table('users')->where('id',$cval->comment_user_id)->first();
            $replycomments = DB::table('tbl_post_comment_replies')->where('comment_id',$cval->id )->get();
            @endphp
             @if($purchagedPost!='' or Auth::user()->id==$postval->user_id)
            <div  class="commentboxall">
               <div class="img-name">
                 @if(!empty($comment->social_profile_image!='' and $comment->social_id!=''))
                  <figure class="avatar me-3"><img src="{{url('/')}}/public/images/{{$comment->social_profile_image}}" alt="image" class="shadow-sm rounded-circle w35"></figure>

                  @elseif($comment->profile_image!='')
                  <figure class="avatar me-3"><img src="{url('/')}}/public/images/{{$comment->profile_image}}" alt="image" class="shadow-sm rounded-circle w35"></figure>
                  @else
                  
                   <figure class="avatar me-3"><img src="{{url('/')}}/public/front_assets/images/default-profile-pic-e1513291410505.jpg" alt="image" class="shadow-sm rounded-circle w35"></figure>
                  @endif
                  <h4 class="fw-700 text-grey-900 font-xssss mt-1 viewall">{{$comment->name}} <span class="d-block font-xssss fw-500 mt-1 lh-3 text-grey-500">{{$cval->comment}}</span></h4>
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
            @endif
            @foreach($replycomments as $reply)
            <!-- -->
            <!--$replycommentuser = DB::table('users')->where('id',$reply->comment_user_id)->first();-->
            <!--                  -->
            <!--   <div class="reply">-->
            <!--<div class="img-name">-->
            <!--             @if(!empty($replycommentuser->profile_image))-->
            <!--           <figure class="avatar me-3"><img src="{{url('/')}}/public/front_assets/images/default-profile-pic-e1513291410505.jpg" alt="image" class="shadow-sm rounded-circle w35"></figure>-->
            <!--           @elseif(!empty($replycommentuser->social_type))-->
            <!--            <figure class="avatar me-3"><img src="{{url('/')}}/public/front_assets/images/default-profile-pic-e1513291410505.jpg" alt="image" class="shadow-sm rounded-circle w35"></figure> -->
            <!--           @else-->
            <!--            <figure class="avatar me-3"><img src="{{$replycommentuser->profile_image}}" alt="image" class="shadow-sm rounded-circle w35"></figure> -->
            <!--@endif-->
            <!-- <h4 class="fw-700 text-grey-900 font-xssss mt-1">{{$replycommentuser->name}} <span class="d-block font-xssss fw-500 mt-1 lh-3 text-grey-500">{{$reply->comment}}</span></h4> </div> -->
            <!--    <div class="clike">                     -->
            <!--<h6 onclick="replycommentLike('{{$reply->id}}')">Like</h6>-->
            <!--             <h6 onclick="postcomment('{{$cval->id}}')">reply</h6>-->
            <!--             </div>-->
            <!--</div>-->
            @endforeach
            <!--    <div class="responsereplycomment{{$cval->id}}" >-->
            <!--</div>-->
            <!-- <div  class="comment-text_{{$cval->id}}"> -->
            <!--    <div class="reply-to-reply comment">-->
            <!--       <figure class="avatar me-3"><img src="{{url('/')}}/public/front_assets/images/default-profile-pic-e1513291410505.jpg" alt="image" class="shadow-sm rounded-circle w35"></figure>-->
            <!--        <input type="search" name="" class="form-control" placeholder="Write a Reply... " onsearch="replycomment('{{$postval->id}}','{{$cval->id}}')" id="replycomment_{{$cval->id}}" required>-->
            <!--<i class="fa fa-paper-plane" aria-hidden="true"></i>-->
            <!-- </div></div>-->
            @endforeach
            <div class="responsecomment{{$postval->id}} responsecomment_clike" >
            </div>
            <div class="comment">
              
                 @if(Auth::user()->social_profile_image!='' and Auth::user()->social_id!=''))
           <figure class="avatar me-3"><img src="{{ Auth::user()->social_profile_image}}" alt="image" class="shadow-sm rounded-circle w45"></figure>
              
               @elseif(!empty(Auth::user()->profile_image))
               <figure class="avatar me-3"><img src="{{url('/')}}/public/images/{{ Auth::user()->profile_image}}" alt="image" class="shadow-sm rounded-circle w45"></figure>
               @else
               <figure class="avatar me-3"><img src="{{url('/')}}/public/front_assets/images/default-profile-pic-e1513291410505.jpg" alt="image" class="shadow-sm rounded-circle w45"></figure>
               @endif
               <input type="search"  class="form-control" id="commentval{{$postval->id}}" onsearch="postcommentsave('{{$postval->id}}')" placeholder="Write a Comment..." required >
               <i class="fa fa-paper-plane" aria-hidden="true"></i>
            </div>
            </div>
            @endforeach
            

         </div>
        
         <div class="card w-100 text-center shadow-xss rounded-xxl border-0 p-4 mb-3 mt-3">
            <div class="snippet mt-2 ms-auto me-auto" data-title=".dot-typing">
               <div class="stage">
                  <div class="dot-typing"></div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-xl-6 col-xxl-6 col-lg-6">
         <div class="right-side home-rfixe" data-spy="affix" data-offset-top="270">
            <div class="row">
               <div class="col-xl-5 col-xxl-5 col-lg-5 ">   <div class="card-body d-flex pt-4 profile-rightside  pb-0 border-top-xs bor-0">
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
               <div class="col-xl-3 col-xxl-3 col-lg-3 ps-lg-0">
                  <div class="card w-100 shadow-xss rounded-xxl border-0 mb-3">
                    
                     <!--End Search-->
                     <div class="bor-0">
                        <div class="celebs_box charity-work">
                           <h4 class="text-center">Charity Work</h4>
                           <img src="{{url('/')}}/public/front_assets/images/img12.jpg" alt="img" class="img-fluid mb-2">
                           <p class="text-center">Kim Kardashian has
helped raise £2,800,000.00
</p>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-xl-4 col-xxl-4 col-lg-4 ps-lg-0 vloglatest">
                  <div class="text-center">
                     <h4 class="text-center">Check out Dan's latest VLog</h4>
                     <p class="text-center">How to create award winning content</p>
                     <img src="{{url('/')}}/public/front_assets/images/img13.jpg" alt="img" class="img-fluid mb-2">
                  </div>
                
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- //lightbox -->
<div id="appendToThis">
   <div class="right-comment chat-left scroll-bar theme-dark-bg">
      <div class="card-body ps-2 pe-4 pb-0 d-flex">
         <meta name="csrf-token" content="{{ csrf_token() }}">
         <!-- <figure class="avatar ms-3"><img src="../images/user-8.png" alt="image" class="shadow-sm rounded-circle w45"></figure> -->
         <h4 class="fw-700 text-grey-900 font-xssss mt-1 text-left"><span class="d-block font-xssss fw-500 mt-1 lh-3 text-white ">2 hour ago</span></h4>
      </div>
      <div class="card-body d-flex ps-2 pe-4 pt-0 mt-0 comment_share_like">
         <a href="#" class="d-flex align-items-center fw-600  lh-26 font-xssss ms-3 "  ><i class="feather-thumbs-up text-white bg-primary-gradiant me-1 btn-round-xs font-xss" id="font-xss" onclick="multipostlike()"> </i>   Like</a>
         <a href="#" class="d-flex align-items-center fw-600  lh-26 font-xssss "  onclick="multipostcomments()"><i class="feather-message-circle  btn-round-sm font-lg " id ="font-lg"></i>  Comment</a>
      </div>
      <div class="card w-100 border-0 shadow-none right-scroll-bar">
         <div class="card-body border-top-xs pt-4 pb-3 pe-4 d-block ps-5">
            <figure class="avatar me-3"><img src="{{url('/')}}/public/front_assets/images/default-profile-pic-e1513291410505.jpg" alt="image" class="shadow-sm rounded-circle w35"></figure>
            <div class="chat p-3 bg-greylight rounded-xxl d-block text-left theme-dark-bg">
               <h4 class="fw-700 text-grey-900 font-xssss mt-0 mb-1">
                  Victor Exrixon <a href="#" class="ms-auto right-commentdelete" id="dropdownMenu6 " data-bs-toggle="dropdown" aria-expanded="false"><i class="ti-more-alt text-grey-900 btn-round-md bg-greylight font-xss"></i></a>
                  <div class="dropdown-menu dropdown-menu-end p-4 rounded-xxl border-0 shadow-lg" aria-labelledby="dropdownMenu6">
                     <div class="card-body p-0 d-flex">
                        <i class="feather-bookmark text-grey-500 me-3 font-lg"></i>
                        <h4 class="fw-600 text-grey-900 font-xssss mt-0 me-4">Edit </h4>
                     </div>
                     <div class="card-body p-0 d-flex mt-2">
                        <i class="feather-alert-circle text-grey-500 me-3 font-lg"></i>
                        <h4 class="fw-600 text-grey-900 font-xssss mt-0 me-4">Delete</h4>
                     </div>
                  </div>
               </h4>
               <div class="comment">
                  <figure class="avatar me-3"><img src="{{url('/')}}/public/front_assets/images/default-profile-pic-e1513291410505.jpg" alt="image" class="shadow-sm rounded-circle w35"></figure>
                  <input type="search"  class="form-control" id="commentval" onsearch="postcommentsave('')" placeholder="Write a Comment..."  >
                  <i class="fa fa-paper-plane" aria-hidden="true"></i>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection

<div id="postamount" class="modal fade" role="dialog">
   <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">CONFIRM POST PURCHASE</h4>
         </div>
         <div class="modal-body">
            <ul class="message-friend">
               
            <div class="tipamountarea">
               <h5 class="modal-title">You will be charged  $10</h5>
               <label>Payment method <span>Minimum $5 USD</span></label>
                <div  data-toggle="modal" data-target="#addcard"  onclick="price">+ add new card</div>
               
            </div>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Save</button>
         </div>
      </div>
   </div>
</div>

<div id="addcard" class="modal fade" role="dialog">
   <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">ADD CARD</h4>
         </div>
         <div class="modal-body">
            <h2>BILLING DETAILS</h2>
            <p>We are fully compliant with Payment Card Industry Data Security Standards.</p>
            <form method="post" action="{{url('gocardlessPayment')}}">
            @csrf 
            <div class="tipamountarea">
               <div class="row">
                  <div class="col-md-6">
                     <label>country</label>

                     <select id="country" name="country"  >
                        <option>select country</option>
                        @foreach($country as $val)
                        <!-- <img src="https://countryflagsapi.com/png/{{$val->sortname}}">  -->
                        <option value="{{$val->id}}" <?php if($val->name == $ipdat->geoplugin_countryName){ echo"selected"; }  ?>>{{$val->name}}</option>
                        @endforeach
                     </select>
                  </div>
                  <div class="col-md-6">
                     <label>State / Province</label>
                     <select id="state" name="state">
                      
                     </select>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-12">
                     <label>Street</label>
                     <input type="text" name="street" placeholder="Street">
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-6">
                     <label>City</label>
                     <input type="text" placeholder="City" name="city" value="{{$ipdat->geoplugin_city}}">
                  </div>
                  <div class="col-md-6">
                     <label>ZIP / Postal Code</label>
                     <input type="text" placeholder="City" name="postal_code">
                  </div>
               </div>
               <h2>CARD DETAILS</h2>
               <div class="row">
                  <div class="col-md-6"><label>Email</label><input  type="text" placeholder="Email" name="email" value="{{Auth::user()->email}}" readonly></div>
                 <!--  <div class="col-md-6"><label>Name on the card</label><input type="text" placeholder="Name on the card" name="card_name"></div>
                  <div class="col-md-12"><label>Card Number</label><input type="text" placeholder=" Card number" name="Expiration" ></div>
                  <div class="col-md-6"><label> Expiration </label><input type="text" placeholder="MM / YY" name="cvvno"></div>
                  <div class="col-md-6"><label>CVC No</label><input type="text" placeholder="CVC"></div> -->
               </div>
               <input type="hidden" name="postid" id="postid" value="">
               <div class="row">
                  <div class="col-md-12">
                     <div class="tick">
                        <input type="radio" id="huey" name="drone" value="huey"
                           checked>
                        <label for="huey">Tick here to confirm that you are at least 18 years old and the age of majority in your place of residence</label>
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="tip-box" >
                        OnlyFans will make a one-time charge of $<p id="htmlamount"></p> when adding your payment card. The charges on your credit card statement will appear as "OnlyFans".
                     </div>
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
               <button type="submit" class="btn btn-default" >Save</button>
            </div>
            </form>
         </div>
      </div>
   </div>
</div>
@include('front.modal.Post_Popup')
@include('front.js.custom')