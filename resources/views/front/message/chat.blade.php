
@extends('layouts.appFront')
@section('content')
<style type="text/css">
   

   .chatHistryBox {
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



</style>
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
                         
                             <input type="hidden" id="lastmsgid" value="0">


                         <div class="chatHistryBox"></div>
                          
                          <div class="chat-typearea">
                              <meta name="csrf-token" content="{{ csrf_token() }}">
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
                              </div>
                           </div>
         </div>
      </div>
   </div>
   <!-- main content -->
   <!-- right chat -->
</div>
@endsection
<!-- Modal -->
@include('front.modal.tipamount')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script>
  $(window).on("load",function(){
      setTimeout(function(){
         console.log('call')
         callChatHistry();
       
      }, 3000);
   })

$(document).ready(function(){

setInterval(function(){
$(".chatHistryBox").load()
callChatHistry();
refresh();
}, 1000);
});


  function callChatHistry() {
      var lastid = $("#lastmsgid").val();
       
      $.ajax({
         url: "{{url()->current()}}",
         type: "get",
         dataType: 'json',
         data:{lastid:lastid},
         success:function(data){

            if( lastid < data['lastmsgid']){
             
             $(".chatHistryBox").html(data['html']);
          
             $("#lastmsgid").val(data['lastmsgid']);
              
            }

           
           
          
         }
      })
   }


   function  messagesend(id){

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
      
             callChatHistry();
             
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
