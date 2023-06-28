@extends('layouts.appFront')
@section('content')
<div class="middle-sidebar-bottom">
   <div class="middle-sidebar-left">
      <div class="row feed-body">
         <div class="col-xl-6 col-xxl-6 col-lg-6">
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
                           
                         <div class="chatHistryBox"></div>
                          <div class="chat-typearea">

                          <div class="chat">
  <div class="chat__wrapper">
    <div class="chat__message">
      <div class="date"></div>
      <div>Message #1</div>
    </div>
    <div class="chat__message chat__message-own">
      <div class="date"></div>
      <div>Message #2</div>
    </div>
  </div>
</div>
<div class="chat__form">
<meta name="csrf-token" content="{{ csrf_token() }}">
    <input id="message" type="text" placeholder="Type your message here ...">
    <button type="button" onclick="messagesend('{{$chat->id}}')" >Send</button>

</div>
<div id="result"></div>
<style>
   
.chat {
    width: 100%;
    max-width: 800px;
    height: calc(100vh - 50px);
    min-height: 100%;
    padding: 15px 30px;
    margin: 0 auto;
    overflow-y: scroll;
    background-color: #fff;
    transform: rotate(180deg);
    direction: rtl;
}

.chat__wrapper {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -ms-flex-direction: column-reverse;
    flex-direction: column-reverse;
    -webkit-box-pack: end;
    -ms-flex-pack: end;
    justify-content: flex-end;
}



.chat__message {
    font-size: 18px;
    padding: 10px 20px;
    border-radius: 25px;
    color: #000;
    background-color: #e6e7ec;
    max-width: 600px;
    width: -webkit-fit-content;
    width: -moz-fit-content;
    width: fit-content;
    position: relative;
    margin: 15px 0;
    word-break: break-all;
    transform: rotate(180deg);
    direction: ltr;
}

.chat__message:after {
    content: "";
    width: 20px;
    height: 12px;
    display: block;
    background-image: url("https://stageviewcincyshakes.firebaseapp.com/icon-gray-message.e6296433d6a72d473ed4.png");
    background-repeat: no-repeat;
    background-position: center;
    background-size: contain;
    position: absolute;
    bottom: -2px;
    left: -5px;
}

.chat__message-own {
    color: #fff;
    margin-left: auto;
    background-color: #00a9de;
}

.chat__message-own:after {
    width: 19px;
    height: 13px;
    left: inherit;
    right: -5px;
    background-image: url("https://stageviewcincyshakes.firebaseapp.com/icon-blue-message.2be55af0d98ee2864e29.png");
}

.chat__form {
    background-color: #e0e0e0;
}

.chat__form form {
    max-width: 800px;
    margin: 0 auto;
    height: 50px;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
}

.chat__form input {
    height: 40px;
    font-size: 16px;
    min-width: 90%;
    padding-left: 15px;
    background-color: #fff;
    border-radius: 15px;
    border: none;
}

.chat__form button {
    width: 10%;
    height: 100%;
    font-size: 16px;
    background-color: transparent;
    border: none;
    text-align: center;
    text-transform: uppercase;
    cursor: pointer;
}

.chat__form button:hover {
    font-weight: bold;
}
   </style>

                            <!--  <meta name="csrf-token" content="{{ csrf_token() }}">
                              <textarea cols="30" rows="2" id="message"></textarea>
                              <div class="buttonarea">
                                 <ul>
                                    <li>
                                       <div class='file'>
                                          <label for='input-file'>
                                             <div class="tooltip-star"><i class="font-md text-success text-danger feather-image me-2"></i>
                                                <span class="tooltiptext">Add Media</span>
                                             </div>
                                          </label>
                                          <input id='input-file' type='file' />
                                       </div>
                                    </li>
                                    <li>
                                       <div class="tooltip-star" data-toggle="modal" data-target="#messagetip"><i class="fa fa-dollar"></i>
                                          <span class="tooltiptext">messages with tips appear at the top of recipient inbox</span>
                                       </div>
                                    </li>
                                 </ul>
                                 <button type="button" onclick="messagesend('{{$chat->id}}')" class="form-control">send</button>
                              </div>-->
                           </div>
         </div>
      </div>
   </div>
   <!-- main content -->
   <!-- right chat -->
</div>
@endsection
<!-- Modal -->
<div id="messagetip" class="modal fade" role="dialog">
   <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">SEND TIP</h4>
         </div>
         <div class="modal-body">
            <ul class="message-friend">
               <li> @if(!empty($chat->profile_image) )
                  <img src="{{url('/')}}/public/images/{{$chat->profile_image}}">
                  @elseif(!empty($chat->social_type))
                  <img src="{{url('/')}}/public/front_assets/images/default-profile-pic-e1513291410505.jpg">
                  @else
                  <img src="{{$chat->profile_image}}">
                  @endif
               </li>
               <li>
                  <p>Workout with @ {{$chat->name}}</p>
                  <a href="{{url('my/chats/chat/'.$chat->id)}}">
                     <p class="toosmall">Workout with @ {{$chat->name}}</p>
                  </a>
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
                        <li class='selected'><a><img src="{{asset('public/front_assets/images/download.png')}}"> ... ... ... 7230 </a></li>
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
<!--Add Card--->
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
            <form method="post" action="{{url('BillingDetails')}}">
            @csrf 
            <div class="tipamountarea">
               <div class="row">
                  <div class="col-md-6">
                     <label>country</label>

                     <select id="country" name="country" >
                        <option>select country</option>
                        @foreach($country as $val)
                        <!-- <img src="https://countryflagsapi.com/png/{{$val->sortname}}">  -->
                        <option value="{{$val->id}}">{{$val->name}}</option>
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
                     <input type="text" placeholder="City" name="city">
                  </div>
                  <div class="col-md-6">
                     <label>ZIP / Postal Code</label>
                     <input type="text" placeholder="City" name="postal_code">
                  </div>
               </div>
               <h2>CARD DETAILS</h2>
               <div class="row">
                  <div class="col-md-6"><label>Email</label><input  type="text" placeholder="Email" name="email" value="{{Auth::user()->email}}"></div>
                  <div class="col-md-6"><label>Name on the card</label><input type="text" placeholder="Name on the card" name="card_name"></div>
                  <div class="col-md-12"><label>Card Number</label><input type="text" placeholder=" Card number" name="Expiration" ></div>
                  <div class="col-md-6"><label> Expiration </label><input type="text" placeholder="MM / YY" name="cvvno"></div>
                  <div class="col-md-6"><label>CVC No</label><input type="text" placeholder="CVC"></div>
               </div>
               <div class="row">
                  <div class="col-md-12">
                     <div class="tick">
                        <input type="radio" id="huey" name="drone" value="huey"
                           checked>
                        <label for="huey">Tick here to confirm that you are at least 18 years old and the age of majority in your place of residence</label>
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="tip-box">
                        OnlyFans will make a one-time charge of $0.10 when adding your payment card. The charges on your credit card statement will appear as "OnlyFans".
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
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script>
     $(document).ready(function(){
    $('#chat__form').on('click', function(e) {
        e.preventDefault();
        var message = $('#text-message').val();
        $('#text-message').val('');
        var date = new Date().toJSON().slice(0, 10).replace(/-/g, '/');
        // $('.chat__wrapper').append('<div class="chat__message chat__message-own"><div class="date">' + date + '</div><div>' + message + '</div></div>')
    })
});
      </script>
<script>


$(document).ready(function(){

setInterval(function(){
$(".chatHistryBox").load()
//callChatHistry();
// refresh();

}, 1000);
});
   function callChatHistry() {
      $.ajax({
         url: "{{url()->current()}}",
         dataType: 'json',
         success:function(data){
            console.log(data)
           
            $(".chat__wrapper").html(data['html']);
         }
      })
   }


   function  messagesend(id){
alert(3);
      var message = $("#message").val();   
      if(message==''){
         return false;
      }
   
      $.ajax({
   
         headers: {   
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         },
   
         url: "{{url('message')}}",
         type: "post",
         dataType: 'JSON',
         data: {message:message,id:id},
         success:function(data){    
            console.log("send");
            $('#message').val('');
      
            // var base_url = window.location.origin;
     
            // if(data.to_message == null){
     
            //    $("#charemessing").append('<br><span>'+data.from_message+'</spam><br><p class="messtime">'+data.created_at+'</p>');   
            // } else if(data.from_message == null){
            //    $("#charemessingto").append('<br><span >'+data.to_message+'</spam><br><p class="messtime">'+data.created_at+'</p>');
            // }
             callChatHistry();
            //   callChatHistry1();
         }
   
      });
   
   }
   
    var hash = window.location.hash;
    hash && $('ul.nav a[href="' + hash + '"]').tab('show');
    
    $('.nav-tabs a').click(function (e) {
     $(this).tab('show');
     var scrollmem = $('body').scrollTop();
     window.location.hash = this.hash;
     $('html,body').scrollTop(scrollmem);
    });
   
    
   
   
   
    /*----payment Option---*/
    // onClick new options list of new select
   $('.ae-select-content').text($('.dropdown-menu > li.selected').text());
   var newOptions = $('.dropdown-menu > li');
   newOptions.click(function() {
       $('.ae-select-content').text($(this).text());
       $('.dropdown-menu > li').removeClass('selected');
       $(this).addClass('selected');
   });
   
   var aeDropdown = $('.ae-dropdown');
   aeDropdown.click(function() {
       $('.dropdown-menu').toggleClass('ae-hide');
   });
   
    $(document).ready(function(){
   
       $('#country').change(function(){
         var countryId = $('#country').val();
     $.ajax({
         url: "{{url('getState')}}",
         type: "get",
         data: {countryId:countryId},
         success:function(data){  
             $('#state').html(data);
         }
     });
   });
   });
</script>




