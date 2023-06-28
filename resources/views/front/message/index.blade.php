@extends('layouts.appFront')
@section('content')
<div class="middle-sidebar-bottom">
   <div class="middle-sidebar-left">
      <div class="row feed-body">
         <div class="col-xl-5 col-xxl-8 col-lg-8">
            <div class="card w-100 shadow-xss rounded-xxl border-0 p-4 mb-3">
               <div class="card-body p-0 d-flex">
                  <div class="poll-page messageind">
                     <div class="row">
                        <div class="col-md-12">
                           <div class="search-message-page">
                              <h1><i class="feather-arrow-left"></i>MESSAGES</h1>
                              <div class="search-form">
                                 <label for="search-field"><span class="screen-reader-text">To search this site, enter a search term</span></label>
                         <input class="search-field" id="search-field" type="search" name="s" value=""  onsearch="search_func()"   aria-required="false" autocomplete="off" placeholder="Search" />
                                 <button class="search-submit">
                                    <span class="screen-reader-text">Search</span>
                                    <div class="tooltip-star"><i class="fa fa-search"></i> <span class="tooltiptext">Search</span></div>
                                 </button>
                              </div>
                              <div class="new-messageplush">
                                 <div class="tooltip-star"><i class="fa fa-plus" aria-hidden="true"></i>
                                    <span class="tooltiptext">New Message</span>
                                 </div>
                              </div>
                           </div>
                           <ul class="recent-down">
                              <li>RECENT</li>
                              <li>
                                 <div class="dropdown">
                                    <button onclick="myFunction()" class="dropbtn">
                                       <div class="tooltip-star"><i class="fa fa-outdent"></i>
                                          <span class="tooltiptext">More</span>
                                       </div>
                                    </button>
                                    <div id="myDropdown" class="dropdown-content">
                                       <ul class="nav nav-tabs">
                                          <li class="active"><a href="#tab1" data-toggle="tab"><input type="radio" id="recent" name="recent" value="recent"
             checked> Recent </a></li>
                                          <li><a href="#tab2" data-toggle="tab"><input type="radio" id="unreadfirst" name="recent" value="unreadfirst"
             > Unread First </a></li>
                                          <li><a href="#tab3" data-toggle="tab"><input type="radio" id="oldest" name="recent" value="oldest"
             > Oldest unread first </a></li>
                                          <li><a href="#tab4" data-toggle="tab"><input type="radio" id="markall" name="recent" value="markall"
             > Mark all as read  </a></li>
                                          <li><a href="#tab5" data-toggle="tab"><input type="radio" id="select" name="recent" value="select"
             > Select </a></li>
                                       </ul>
                                    </div>
                              </li>
                           </ul>
                           <div class="tab-content">
                           <div class="tab-pane active" id="tab1">
                              @foreach($users as $subscribe)
                           <ul class="message-friend">
                           <li> @if(!empty($subscribe->social_profile_image) )
                  <img src="{{$subscribe->social_profile_image}}">             
                  @elseif(!empty($subscribe->profile_image))
                    <img src="{{url('/')}}/public/images/{{$subscribe->profile_image}}">                 
                  @else
                <img src="{{url('/')}}/public/front_assets/images/default-profile-pic-e1513291410505.jpg">
                  @endif</li>
                           <li>
                           <p><a href="{{url('my/chats/chat/'.$subscribe->id)}}" style="color:black;"> {{$subscribe->name}}</a><span> @ {{$subscribe->nickname}} </span></p>
                            <a href="{{url('my/chats/chat/'.$subscribe->id)}}">
                               @php $message = DB::table('tbl_messages')->whereRaw('(from_user_id =' . $subscribe->id . ' AND to_user_id =' . Auth::user()->id . ') OR (to_user_id =' . $subscribe->id. ' AND from_user_id =' . Auth::user()->id . ')')->orderBy('id', 'desc')->latest()->first(); @endphp
                           <p class="toosmall">
                              @if(!empty($message->from_message)) {{$message->from_message}} @endif</p>
                           </a>
                           </li>
                             <li>
                           <span><?php if(!empty($message->created_at)){
                              $date  = strtotime($message->created_at); echo date('h:i a', $date); } ?> </span>
                           </li>
                           <li>
                                 <form action="{{ url('/subscribeduser/Destroy', $subscribe->id) }}" class="d-inline-block" method="post">
                           @csrf
                           @method('DELETE')
                           <button type="submit" ><i class="fa fa-close"  onclick="return confirm('Are you sure that you want to delete this post?')"></i></button>
                           </form>
                           </li>
                          
                           </ul>
                           @endforeach
                           </div>
                           </div>
                           </div>
                        </div>
                    
                     </div>
                  </div>
               </div>
               </div>
               <div class="col-xl-7 col-xxl-8 col-lg-8">
                  <div class="right-side messagearea">
                     <div class="row">
                        <div class="b-chats__conversations-content m-empty-chat">
                           <div class="conversations-start">
                              <div class="conversations-start__title"> Select any Conversation or send a New Message </div>
                              <div class="conversations-start__content"><a href="{{url('my/chats/send')}}" class="g-btn m-rounded m-lg m-block m-fix-width m-mall-auto"> New message </a></div>
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
</div>
@endsection
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script>

  

   $(function(){
   var hash = window.location.hash;
   hash && $('ul.nav a[href="' + hash + '"]').tab('show');
   
   $('.nav-tabs a').click(function (e) {
    $(this).tab('show');
    var scrollmem = $('body').scrollTop();
    window.location.hash = this.hash;
    $('html,body').scrollTop(scrollmem);
   });
   });
</script>