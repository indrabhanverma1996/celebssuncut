@extends('layouts.appFront')
@section('content')
<div class="middle-sidebar-bottom">
  <div class="row editpppg">
        <div class="col-md-4">
            <div class="middle-sidebar-left ">
              <div class="tab">
                <button class="tablinks" onclick="openCity(event, 'profile')" id="defaultOpen">Profile</button>
                <button class="tablinks" onclick="openCity(event, 'account')">Account</button>
                <button class="tablinks" onclick="openCity(event, 'privicyandsafety')">Privicy and safety</button>
                <button class="tablinks" onclick="openCity(event, 'notification')">Notifications</button>
              </div>
              </div>
          </div>

          <div class="col-md-8">
             @if (session('error'))
    
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif
                    <div class="row">
                     <div class="col-md-4" >

                    <div class="alert alert-success" id="msg" role="alert">
                          
                        </div ></div>
                        </div>
        <div class="profile-editer">
            <div id="profile" class="tabcontent">
              
              <div class="row">
                  <div class="col-md-4">
                    <h1 > Edit profile</h1>
                  </div>
                  <div class="col-md-6">
                  </div>
                  <div class="col-md-2">
                    <button class="post-btn" onclick="saveuserdetails()">Save</button>
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                  </div>
              </div>
              <div class="row feed-body ">
                  <div class="col-md-12 scroll">
                    <div class="card w-100 border-0 p-0 bg-white shadow-xss rounded-xxl">
                        <div class="card-body h250 p-0 rounded-xxl overflow-hidden m-3 profile-cover">
                          <img src="{{url('/')}}/public/images/{{$user->cover_image}}" alt="image">
                          <div class="vip-logo"><img src="{{url('/')}}/public/front_assets/images/vip.jpg"> </div>
                          <button  data-toggle="modal" id="coverimage" class="btn btn-primary" data-target="#coverimage">Cover image</button>
                        </div>
                        <div class="card-body p-0 position-relative profile-down">
                          @if($user->profile_image =='')
                          <figure class="avatar position-absolute w100 z-index-1" style="top:-40px; left: 30px;"><img src="{{url('/')}}/public/front_assets/images/default-profile-pic-e1513291410505.jpg" alt="image" class="float-right p-1 bg-white rounded-circle w-100" data-toggle="modal" data-target="#myModalprofile"></figure>
                          @else
                          <figure class="avatar position-absolute w100 z-index-1" style="top:-40px; left: 30px;"><img src="{{url('/')}}/public/images/{{$user->profile_image}}" alt="image" class="float-right p-1 bg-white rounded-circle w-100" data-toggle="modal" data-target="#myModalprofile"></figure>
                          @endif
                          <div class="profile-downtext">
                              <h4 class="fw-700 font-sm mt-2 mb-4 pl-15">{{Auth::user()->name}} <span class="fw-500 font-xssss text-grey-500 mt-1 mb-3 d-block">
                                </span>
                              </h4>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-11" style="margin-left:15px;">
                              <label for="input-login">Username</label><input at-attr="input" autocomplete="on" name="username" maxlength="24" id="username" placeholder="" type="text" class="form-control" value="<?php if($user->nickname){ echo $user->nickname; } else { 
                              } ?>">
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-11" style="margin-left:15px;">
                              <label for="input-login">First Name</label><input at-attr="input" autocomplete="on" name="first_name" maxlength="24" id="first_name" placeholder="" type="text" class="form-control" value="{{$user->first_name}}">
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-11" style="margin-left:15px;">
                              <label for="input-login">Last Name</label><input at-attr="input" autocomplete="on" name="last_name" maxlength="24" id="last_name" placeholder="" type="text" class="form-control" value="{{$user->last_name}}">
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-11" style="margin-left:15px;">
                              <label for="input-login">Bio</label>
                              <textarea cols="20" rows="3"  id="bio" class="form-control"  placeholder=" Bio"> {{$user->bio}}</textarea>
                             
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-11" style="margin-left:15px;">
                              <label for="input-login">profession</label>
                              <textarea cols="20" rows="3"  id="profesion" class="form-control"  placeholder=" Bio"> {{$user->name_title}}</textarea>
                             
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-11" style="margin-left:15px;">
                              <label for="input-login">Location</label><input at-attr="input" autocomplete="on" name="location" id="location" maxlength="24" id="input-login" placeholder="" type="text" class="form-control" value="{{$user->location}}">
                          </div>
                        </div>
                        <div class="row" >
                          <div class="col-md-11" style="margin-left:15px;">
                              <label for="input-login">Website Url</label><input at-attr="input" autocomplete="on" name="websiteurl"  id ="websiteurl"maxlength="24" id="input-login" placeholder="" type="text" class="form-control" value="{{$user->websiteurl}}">
                          </div>
                        </div>
                    </div>
                    <div class="row" >
                        <div class="col-md-11">
                          <a class="addaccount" href ="{{url('/my/banking')}}">Add bank account and payment information</a>
                        </div>
                    </div>
                  </div>
              </div>
            </div>
            <div id="account" class="tabcontent">
              <h2 style="margin-left:20px; margin-top:20px ;"> Account Info</h2>
              <table class="table table-bordered">
                  <tbody class="accounts">
                  
                    <tr><td><p onclick="account('username')"><i  class="fa fa-angle-right" ></i> Username</p></td></tr>

                     <tr><td><p onclick="account('email')"><i  class="fa fa-angle-right"></i> Email</p></td></tr>
                      <tr><td><p onclick="account('phoneno')"><i  class="fa fa-angle-right"></i> Phoneno</p></td></tr>
                       

                <tr><td><p onclick="account('password')"><i class="fa fa-angle-right"></i> Password</p></td></tr>
                      
                     <tr>

                        <td>
                          <a href="{{url('age-verification')}}" class="button"> Account Verification <i class="fa fa-angle-right"></i>
                         
                        </td>
                    </tr>
                  </tbody>
              </table>
            </div>
            <div id="privicyandsafety" class="tabcontent">
              <h2 style="margin-left:20px; margin-top:20px ;"> Account Info</h2>
              <table class="table table-bordered">
                  <tbody>
                    <tr>
                        <td>Show activity status <label class="switch">
                          <input type="checkbox" checked onclick="toggle()" id="rt">
                          <span class="slider round"></span>
                          </label>
                        </td>
                    </tr>
                    <tr>
                        <td>  Show subscription offers <label class="switch">
                          <input type="checkbox" checked>
                          <span class="slider round"></span>
                          </label>
                        </td>
                    </tr>
                  </tbody>
              </table>
            </div>
            <div id="notification" class="tabcontent">
              <h2 style="margin-left:20px; margin-top:20px ;"> Notifications</h2>
              <table class="table table-bordered">
                  <tbody>
                    <tr>
                        <td> Push Notification</td>
                    </tr>
                    <tr>
                        <td> Email Notification</td>
                    </tr>
                    <tr>
                        <td> Site Notification</td>
                    </tr>
                    <tr>
                        <td> SMS  Notification</td>
                    </tr>
                  </tbody>
              </table>
            </div>
        </div>
      </div>
</div>
</div>

@endsection
@include('front.modal.profile_image')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script type="text/javascript">
  
  
 function openCity(evt, cityName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
        }

        window.onload=function(){
    openCity(event, 'profile');
};
</script>
   
<script type="text/javascript">
   $(document).ready(function (e) { 
   $("#msg").hide();
   $('#imageUploadForm').on('submit',(function(e) {
   
   
   
   $.ajaxSetup({ 
   
   headers: { 
   
   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') 
   
   } 
   
   }); 
   
   e.preventDefault();
   
   var formData = new FormData(this);
   
   $.ajax({ 
   
   type:'POST', 
   
   url: "{{url('save-photo')}}",
   
   
   
   data:formData, 
   
   cache:false, 
   
   contentType: false, 
   
   processData: false, 
   
   success:function(data){ 
   
     $('#original').attr('src', 'public/images/'+ data.photo_name);
   
    location.reload(); 
   
   }, 
   
   error: function(data){ 
   
     console.log(data); 
   
   }
   
   
   
   });
   
   
   
   }));
   
    
   $('#coverimageUploadForm').on('submit',(function(e) {
   
   
   
   $.ajaxSetup({ 
   
   headers: { 
   
   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') 
   
   } 
   
   }); 
   
   e.preventDefault();
   
   var formData = new FormData(this);
   
   $.ajax({ 
   
   type:'POST', 
   
   url: "{{url('save-cover-photo')}}",
   
   
   
   data:formData, 
   
   cache:false, 
   
   contentType: false, 
   
   processData: false, 
   
   success:function(data){ 
   
   $('#original').attr('src', 'public/images/'+ data.photo_name);
   
    location.reload(); 
   
   }, 
   
   error: function(data){ 
   
     console.log(data); 
   
   }
   
   
   
   });
   
   
   
   }));
   
   
   
   });
   

   
function account(value) {
  
   $.ajax({
          headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
     
         url: "{{url('/my/settings/account')}}",
         dataType: 'json',
         data:{account:value},
         success:function(data){
            console.log(data)
            $(".accounts").html(data['html']);
           
         }
      })
   }



   function saveuserdetails(){
   var first_name = $("#first_name").val();
     var last_name = $("#last_name").val();
     var profesion = $("#profesion").val();
   var username = $("#username").val();
   var bio = $("#bio").val();
   var location = $("#location").val();
   var websiteurl = $("#websiteurl").val();
   
   $.ajax({
          headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: "{{url('save-userdetails')}}",
      type: "post",
      dataType: 'JSON',
      data: {username:username,first_name:first_name,last_name:last_name,bio:bio,location:location,websiteurl:websiteurl,profesion:profesion},
      success:function(data){
        $("#msg").show();    
      $("#msg").html(data.response);
       $("#msg").fadeOut(3000);
          $('#replycomment_' + commentid ).val('');
      

       }
   });
    
   
   }
   
function changePassword(){
  
var current_password = $("#cpassword").val();

     var new_password = $("#new_password").val();
     var new_confirm_password = $("#new_confirm_password").val();
   
   
   $.ajax({
          headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: "{{url('changePassword')}}",
      type: "post",
      dataType: 'JSON',
      data: {current_password:current_password,new_password:new_password,new_confirm_password:new_confirm_password},
      success:function(data){
        var current_password = $("#cpassword").val('');

     var new_password = $("#new_password").val('');
     var new_confirm_password = $("#new_confirm_password").val('');
   
   
        $("#mssag").show();    
      $("#mssag").html(data.response);
       $("#mssag").fadeOut(3000);
         

       }
   });
    


}   
   
</script>
<script type="text/javascript">
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}   
</script>

