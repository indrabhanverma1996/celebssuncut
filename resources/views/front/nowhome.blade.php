@extends('layouts.appFront')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

@if (session('status'))

<div class="alert alert-success" role="alert">

   {{ session('status') }}

</div>

@endif

@section('content')

<div class="middle-sidebar-left">

   <div class="row feed-body">

      <div class="col-xl-6 col-xxl-8 col-lg-8">

         <div class="card w-100 shadow-none bg-transparent bg-transparent-card border-0 p-0 mb-0">

            <div class="owl-carousel category-card owl-theme overflow-hidden nav-none">

               <div class="item">

                  <div data-bs-toggle="modal" data-bs-target="#Modalstory" class="card w125 h200 d-block border-0 shadow-none rounded-xxxl bg-dark overflow-hidden mb-3 mt-3">

                     <div class="card-body d-block p-3 w-100 position-absolute bottom-0 text-center">

                        <a href="#">

                           <span class="btn-round-lg bg-white"><i class="feather-plus font-lg"></i></span>

                           <div class="clearfix"></div>

                           <h4 class="fw-700 position-relative z-index-1 ls-1 font-xssss text-white mt-2 mb-1">Add Story </h4>

                        </a>

                     </div>

                  </div>

               </div>

               <div class="item">

                  <div data-bs-toggle="modal" data-bs-target="#Modalstory" class="card w125 h200 d-block border-0 shadow-xss rounded-xxxl bg-gradiant-bottom overflow-hidden cursor-pointer mb-3 mt-3" style="background-image: url({{url('/')}}/public/front_assets/images/s-1.jpg);">

                     <div class="card-body d-block p-3 w-100 position-absolute bottom-0 text-center">

                        <a href="#">

                           <figure class="avatar ms-auto me-auto mb-0 position-relative w50 z-index-1"><img src="{{url('/')}}/public/front_assets/images/user-11.png" alt="image" class="float-right p-0 bg-white rounded-circle w-100 shadow-xss"></figure>

                           <div class="clearfix"></div>

                           <h4 class="fw-600 position-relative z-index-1 ls-1 font-xssss text-white mt-2 mb-1">Victor Exrixon </h4>

                        </a>

                     </div>

                  </div>

               </div>

               <div class="item">

                  <div data-bs-toggle="modal" data-bs-target="#Modalstory" class="card w125 h200 d-block border-0 shadow-xss rounded-xxxl bg-gradiant-bottom overflow-hidden cursor-pointer mb-3 mt-3" style="background-image: url({{url('/')}}/public/front_assets/images/s-2.jpg);">

                     <div class="card-body d-block p-3 w-100 position-absolute bottom-0 text-center">

                        <a href="#">

                           <figure class="avatar ms-auto me-auto mb-0 position-relative w50 z-index-1"><img src="{{url('/')}}/public/front_assets/images/user-12.png" alt="image" class="float-right p-0 bg-white rounded-circle w-100 shadow-xss"></figure>

                           <div class="clearfix"></div>

                           <h4 class="fw-600 position-relative z-index-1 ls-1 font-xssss text-white mt-2 mb-1">Surfiya Zakir </h4>

                        </a>

                     </div>

                  </div>

               </div>

               <div class="item">

                  <div data-bs-toggle="modal" data-bs-target="#Modalstory" class="card w125 h200 d-block border-0 shadow-xss rounded-xxxl bg-gradiant-bottom overflow-hidden cursor-pointer mb-3 mt-3">

                     <video loop autoplay muted controls class="float-right w-100">

                        <source src="{{url('/')}}/public/front_assets/images/s-4.mp4" type="video/mp4">

                     </video>

                     <div class="card-body d-block p-3 w-100 position-absolute bottom-0 text-center">

                        <a href="#">

                           <figure class="avatar ms-auto me-auto mb-0 position-relative w50 z-index-1"><img src="{{url('/')}}/public/front_assets/images/user-9.png" alt="image" class="float-right p-0 bg-white rounded-circle w-100 shadow-xss"></figure>

                           <div class="clearfix"></div>

                           <h4 class="fw-600 position-relative z-index-1 ls-1 font-xssss text-white mt-2 mb-1">Goria Coast </h4>

                        </a>

                     </div>

                  </div>

               </div>

               <div class="item">

                  <div data-bs-toggle="modal" data-bs-target="#Modalstory" class="card w125 h200 d-block border-0 shadow-xss rounded-xxxl bg-gradiant-bottom overflow-hidden cursor-pointer mb-3 mt-3 me-1">

                     <video loop autoplay muted controls class="float-right w-100">

                        <source src="{{url('/')}}/public/front_assets/images/s-3.mp4" type="video/mp4">

                     </video>

                     <div class="card-body d-block p-3 w-100 position-absolute bottom-0 text-center">

                        <a href="#">

                           <figure class="avatar ms-auto me-auto mb-0 position-relative w50 z-index-1"><img src="{{url('/')}}/public/front_assets/images/user-4.png" alt="image" class="float-right p-0 bg-white rounded-circle w-100 shadow-xss"></figure>

                           <div class="clearfix"></div>

                           <h4 class="fw-600 position-relative z-index-1 ls-1 font-xssss text-white mt-2 mb-1">{{Auth::user()->name}} </h4>

                        </a>

                     </div>

                  </div>

               </div>

               <div class="item">

                  <div data-bs-toggle="modal" data-bs-target="#Modalstory" class="card w125 h200 d-block border-0 shadow-xss rounded-xxxl bg-gradiant-bottom overflow-hidden cursor-pointer mb-3 mt-3" style="background-image: url('/assets/images/s-5.jpg');">

                     <div class="card-body d-block p-3 w-100 position-absolute bottom-0 text-center">

                        <a href="#">

                           <figure class="avatar ms-auto me-auto mb-0 position-relative w50 z-index-1"><img src="{{url('/')}}/public/front_assets/images/user-3.png" alt="image" class="float-right p-0 bg-white rounded-circle w-100 shadow-xss"></figure>

                           <div class="clearfix"></div>

                           <h4 class="fw-600 position-relative z-index-1 ls-1 font-xssss text-white mt-2 mb-1">David Goria </h4>

                        </a>

                     </div>

                  </div>

               </div>

               <div class="item">

                  <div data-bs-toggle="modal" data-bs-target="#Modalstory" class="card w125 h200 d-block border-0 shadow-xss rounded-xxxl bg-gradiant-bottom overflow-hidden cursor-pointer mb-3 mt-3" style="background-image: url(assets/images/s-6.jpg);">

                     <div class="card-body d-block p-3 w-100 position-absolute bottom-0 text-center">

                        <a href="#">

                           <figure class="avatar ms-auto me-auto mb-0 position-relative w50 z-index-1"><img src="{{url('/')}}/public/front_assets/images/user-2.png" alt="image" class="float-right p-0 bg-white rounded-circle w-100 shadow-xss"></figure>

                           <div class="clearfix"></div>

                           <h4 class="fw-600 position-relative z-index-1 ls-1 font-xssss text-white mt-2 mb-1">Seary Victor </h4>

                        </a>

                     </div>

                  </div>

               </div>

            </div>

         </div>

         <div class="card w-100 shadow-xss rounded-xxl border-0 ps-4 pt-4 pe-4 pb-3 mb-3">

            <div class="card-body p-0 d-flex">

               <a href="#" class=" font-xssss fw-600 text-grey-500 card-body p-0 d-flex align-items-center"><i class="btn-round-sm font-xs text-primary feather-edit-3 me-2 bg-greylight"></i>Create Post</a>

               <button class="post-btn" onclick="singlepost()">Post</button>

            </div>

            <div class="card-body p-0 mt-3 position-relative">

               @if(!empty($user->profile_image))

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

         <div class="card w-100 shadow-xss rounded-xxl border-0 p-4 mb-3">

            @foreach($post as $postval)

            <div class="card-body p-0 d-flex">

               @php  $users = DB::table('users')->where('id',$postval->user_id)->first(); 

               $comment = DB::table('tbl_post_comments')->where('post_id',$postval->id)->orderBy('id', 'DESC')->take(5)->get();

               $commentcount = count($comment);

               @endphp

               @if(!empty($users->profile_image))                       

               <figure class="avatar me-3"><img src="{{url('/')}}/public/images/{{ $users->profile_image}}" alt="image" class="shadow-sm rounded-circle w45"></figure>

               @else

               <figure class="avatar me-3"><img src="{{url('/')}}/public/front_assets/images/default-profile-pic-e1513291410505.jpg" alt="image" class="shadow-sm rounded-circle w45"></figure>

               @endif

               <h4 class="fw-700 text-grey-900 font-xssss mt-1">{{$users->name}} <span class="d-block font-xssss fw-500 mt-1 lh-3 text-grey-500">{{$postval->published_at}}</span></h4>

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

               <a  class="d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss" onclick="postcomment('{{$postval->id}}')"><i class="feather-message-circle text-dark text-grey-900 btn-round-sm font-lg" ></i><span class="d-none-xss" id="commentcount{{$postval->id}}">{{$commentcount}} Comment</span></a>

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

            <div  class="commentboxall">

               <div class="img-name">

                  @if(!empty($comment->profile_image))

                  <figure class="avatar me-3"><img src="{{url('/')}}/public/images/{{$comment->profile_image}}" alt="image" class="shadow-sm rounded-circle w35"></figure>

                  @elseif(!empty($comment->social_type))

                  <figure class="avatar me-3"><img src="{{url('/')}}/public/front_assets/images/default-profile-pic-e1513291410505.jpg" alt="image" class="shadow-sm rounded-circle w35"></figure>

                  @else

                  <figure class="avatar me-3"><img src="{{$comment->profile_image}}" alt="image" class="shadow-sm rounded-circle w35"></figure>

                  @endif

                  <h4 class="fw-700 text-grey-900 font-xssss mt-1 viewall">{{$comment->name}} <span class="d-block font-xssss fw-500 mt-1 lh-3 text-grey-500">{{$cval->comment}}</span></h4>
                   @if($cval->likes==0) <div  onclick="commentLike('{{$cval->id}}')" class="commentboxalllike "><i class="fa fa-heart"></i></div>@else  <div  onclick="commentLike('{{$cval->id}}')" class="commentboxalllike active"><i class="fa fa-heart"></i></div> @endif  
                  
               </div>

               <div class="reply">

                  <div class="clike">
                       
                     <h6 id="clikes_{{$cval->id}}">  @if($cval->likes==0) @else  {{$cval->likes}} @endif  Like</h6>

                     <h6 onclick="postcomment('{{$cval->id}}')">reply</h6>

                  </div>

               </div>

            </div>

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

            <!-- <h2 ><a href="#" >View more Comments</a></h2> -->

            <div class="comment">

               <figure class="avatar me-3"><img src="{{url('/')}}/public/front_assets/images/default-profile-pic-e1513291410505.jpg" alt="image" class="shadow-sm rounded-circle w35"></figure>

               <input type="search"  class="form-control" id="commentval{{$postval->id}}" onsearch="postcommentsave('{{$postval->id}}')" placeholder="Write a Comment..." required >

               <i class="fa fa-paper-plane" aria-hidden="true"></i>

            </div>

            @endforeach

         </div>

         <script></script>

         <div class="card w-100 text-center shadow-xss rounded-xxl border-0 p-4 mb-3 mt-3">

            <div class="snippet mt-2 ms-auto me-auto" data-title=".dot-typing">

               <div class="stage">

                  <div class="dot-typing"></div>

               </div>

            </div>

         </div>

      </div>

      <div class="col-xl-6 col-xxl-8 col-lg-8">

         <div class="right-side">

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

                     <div class="card-body d-flex pt-4 ps-4 pe-4 pb-0 border-top-xs bor-0">

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

                     <h4 class="fw-700 mb-0 font-xssss text-grey-900">Our celeb's help over 5000 charities every day Thank you!</h4>

                  </div>

                  <div class="card w-100 shadow-xss rounded-xxl border-0 mb-3 right-box">

                     <div class="card-bodyoverflow-hidden border-top-xs bor-0">

                        <h4 class="fw-700 text-grey-900 font-xssss mt-1 text-center"></h4>

                        <img src="{{url('/')}}/public/front_assets/images/g-2.jpg" alt="img" class="img-fluid mb-2">

                        <p class="text-center">Kim Kardashian has raised £1,200,00.00</p>

                     </div>

                     <div class="card-bodyoverflow-hidden border-top-xs bor-0">

                        <img src="{{url('/')}}/public/front_assets/images/g-3.jpg" alt="img" class="img-fluid mb-2">

                        <p class="text-center">Christiano Ronaldo has raised £1,400,00.00</p>

                     </div>

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

@include('front.modal.Post_Popup')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>

   function postcommentsave(postid){

    var commentval = $("#commentval"+postid).val();

     if(commentval==''){

         return false;

     }

      $.ajax({

             headers: {

             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

         },

         url: "{{url('comment')}}",

         type: "post",

         dataType: 'JSON',

         data: {postid:postid,commentval:commentval},

         success:function(data){ 

       $('#commentval' + postid ).val('');

     var base_url = window.location.origin;

      if(data.profile_image == 'null'){

   $(".responsecomment"+postid).append('<div class="img-name"><figure class="avatar me-3"><img src="'+ base_url +'/celebs/public/front_assets/images/default-profile-pic-e1513291410505.jpg" alt="image" class="shadow-sm rounded-circle w35"></figure><h4 class="fw-700 text-grey-900 font-xssss mt-1">'+data.name+' <span class="d-block font-xssss fw-500 mt-1 lh-3 text-grey-500">'+data.response+'</span></h4><div  onclick="commentLike('+data.commentid+')" class="commentboxalllike "><i class="fa fa-heart"></i></div><div  onclick="commentLike('+data.commentid+')" class="commentboxalllike "><i class="fa fa-heart"></i></div><div class="clike"><h6 id="clikes_"'+data.commentid+'></h6><h6 onclick="postcomment('+data.commentid+')">reply</h6></div></div>');

        document.getElementById("commentcount"+postid).innerHTML = data.commentcount;

      }else{

          $(".responsecomment"+postid).append('<div class="img-name"><figure class="avatar me-3"><img src="'+ base_url +'/celebs/public/images/'+data.profile_image+'" alt="image" class="shadow-sm rounded-circle w35"></figure><h4 class="fw-700 text-grey-900 font-xssss mt-1">'+data.name+' <span class="d-block font-xssss fw-500 mt-1 lh-3 text-grey-500">'+data.response+'</span></h4><div  onclick="commentLike('+data.commentid+')" class="commentboxalllike "><i class="fa fa-heart"></i></div></div><div  onclick="commentLike('+data.commentid+')" class="commentboxalllike"><i class="fa fa-heart"></i></div><div class="clike"><h6 id="clikes_"'+data.commentid+'></h6><h6 onclick="commentLike('+data.commentid+')"> Like</h6><h6 onclick="postcomment('+data.commentid+')">reply</h6></div></div>'); 
   document.getElementById("commentcount"+postid).innerHTML = data.commentcount;

          

      }

          }

         });

   }

   

   

   function replycomment(postid,commentid){

    var commentval = $("#replycomment_"+commentid).val();

   if(commentval==''){

         return false;

     }

      $.ajax({

             headers: {

             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

         },

         url: "{{url('replycomment')}}",

         type: "post",

         dataType: 'JSON',

         data: {commentval:commentval,commentid:commentid},

         success:function(data){ 

             $('#replycomment_' + commentid ).val('');

     var base_url = window.location.origin;

       if(data.profile_image == 'null'){

   $(".responsereplycomment"+commentid).append('<div class="reply"><div class="img-name"><figure class="avatar me-3"><img src="'+ base_url +'/celebs/public/front_assets/images/default-profile-pic-e1513291410505.jpg" alt="image" class="shadow-sm rounded-circle w35"></figure><h4 class="fw-700 text-grey-900 font-xssss mt-1">'+data.name+' <span class="d-block font-xssss fw-500 mt-1 lh-3 text-grey-500">'+data.response+'</span></h4></div></div><div class="reply"><div class="clike">Like</h6><h6 onclick="postcomment('+data.replycommentid+')">reply</h6></div></div>');

   }else{

     $(".responsereplycomment"+commentid).append('<div class="reply"><div class="img-name"><figure class="avatar me-3"><img src="'+ base_url +'/celebs/public/images/'+data.profile_image+'" alt="image" class="shadow-sm rounded-circle w35"></figure><h4 class="fw-700 text-grey-900 font-xssss mt-1">'+data.name+' <span class="d-block font-xssss fw-500 mt-1 lh-3 text-grey-500">'+data.response+'</span></h4></div></div><div class="reply"><div class="clike"><h6 onclick="commentLike('+data.replycommentid+')">Like</h6><h6 onclick="postcomment('+data.replycommentid+')">reply</h6></div></div>');

   }

          }

         });

   }

   function commentLike(commentId){

   

     $.ajax({

             headers: {

             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

         },

         url: "{{url('commentLike')}}",

         type: "post",

         dataType: 'JSON',

         data: {commentId:commentId},

         success:function(data){ 

        document.getElementById("clikes_"+commentId).innerHTML = data.count+' Like';
       
        
        

      

          }

         });

   

   }

   function replycommentLike(commentId){

   

     $.ajax({

             headers: {

             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

         },

         url: "{{url('replycommentLike')}}",

         type: "post",

         dataType: 'JSON',

         data: {commentId:commentId},

         success:function(data){ 

                  

        document.getElementById("postlike_"+postid).innerHTML = data.count;

          }

         });

   

   }

   

   

   function postcomment(commentid){

         

         $(".comment-text_"+commentid).toggle();

   

   }

   //plan location update

   function likepost(postid){

                 

      

         $.ajax({

             headers: {

             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

         },

         url: "{{url('like')}}",

         type: "post",

         dataType: 'JSON',

         data: {postid:postid},

         success:function(data){ 

          

        

        document.getElementById("postlike_"+postid).innerHTML = data.count;

          }

         });

   

     }

   

   

   

   

   //multiple 

   

   

   function multiimage(ids,likes){

     sessionStorage.setItem("id", ids);

   document.getElementById("font-xss").innerHTML = likes;

   

   }

         function multipostlike(){

             let multiid = sessionStorage.getItem("id");

          

                 $.ajax({

                     headers: {

                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                 },

                 url: "{{url('multilikepost')}}",

                 type: "post",

                 dataType: 'JSON',

                 data: {multiid:multiid},

                 success:function(data){ 

                     console.log(data);               

             document.getElementById("font-xss").innerHTML = data.count;

                  }

                 });

         

             }

   

   

        

   

   function multipostcomments(){

   

      let multiid = sessionStorage.getItem("id");

     

      $.ajax({

             headers: {

             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

         },

         url: "{{url('multipostcomment')}}",

         type: "post",

         dataType: 'JSON',

         data: {multiid:multiid,commentval:commentval},

         success:function(data){ 

            

         $("ol").append("<li>Appended item</li>");

        document.getElementById("text-grey-500_"+postid).innerHTML = data.response;

          }

         });

     }

   

   

     function singlepost(){

   

    var message = $("#singlepost").val();

    

     if(message==''){

         return false;

     }

      $.ajax({

             headers: {

             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

         },

         url: "{{url('singlepost')}}",

         type: "post",

         dataType: 'JSON',

         data: {message:message},

         success:function(data){           

       $('#singlepost').val('');

          }

         });

     }

      

</script>