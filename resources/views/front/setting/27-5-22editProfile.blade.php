  

@extends('layouts.appFront')

@section('content')

<div class="middle-sidebar-bottom">

                <div class="middle-sidebar-left">



<div class="tab">

  <button class="tablinks" onclick="opentab(event, 'profile')" id="defaultOpen">Profile</button>

  <button class="tablinks" onclick="opentab(event, 'Account')">Account</button>

  <button class="tablinks" onclick="opentab(event, 'privicyandsafety')">Privicy and safety</button>



  <button class="tablinks" onclick="opentab(event, 'notification')">Notifications</button>

</div>



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

                              

                                <div class="card-body h250 p-0 rounded-xxl overflow-hidden m-3 profile-cover"><img src="{{url('/')}}/public/images/{{$user->cover_image}}" alt="image"><div class="vip-logo"><img src="{{url('/')}}/public/front_assets/images/vip.jpg"> </div><button  data-toggle="modal" id="coverimage" class="btn btn-primary" data-target="#coverimage">Cover image</button></div>
                  
                                <div class="card-body p-0 position-relative profile-down">
                                @if($user->profile_image =='')
                                    <figure class="avatar position-absolute w100 z-index-1" style="top:-40px; left: 30px;"><img src="{{url('/')}}/public/front_assets/images/default-profile-pic-e1513291410505.jpg" alt="image" class="float-right p-1 bg-white rounded-circle w-100" data-toggle="modal" data-target="#myModalprofile"></figure>
 @else
 <figure class="avatar position-absolute w100 z-index-1" style="top:-40px; left: 30px;"><img src="{{url('/')}}/public/images/{{$user->profile_image}}" alt="image" class="float-right p-1 bg-white rounded-circle w-100" data-toggle="modal" data-target="#myModalprofile"></figure>
@endif
<div class="profile-downtext"> <h4 class="fw-700 font-sm mt-2 mb-4 pl-15">{{Auth::user()->name}} <span class="fw-500 font-xssss text-grey-500 mt-1 mb-3 d-block">

                                        

                                        </span></h4></div>

                                        

                                        </div>
                                          <div class="row">

                                            <div class="col-md-11" style="margin-left:15px;">

                                           <label for="input-login" class="form-group">Username</label><input at-attr="input" autocomplete="on" name="username" maxlength="24" id="username" placeholder="" type="text" class="form-control" value="@if($user->nickname)@ {{$user->nickname}}@else @endif"></div> 

                                           

                                        </div>
                                        <div class="row">

                                            <div class="col-md-11" style="margin-left:15px;">

                                           <label for="input-login" class="form-group">Name</label><input at-attr="input" autocomplete="on" name="username" maxlength="24" id="name" placeholder="" type="text" class="form-control" value="{{$user->name}}"></div> 

                                           

                                        </div>

                                         <div class="row">

                                            <div class="col-md-11" style="margin-left:15px;">

                                           <label for="input-login" class="form-group">Bio</label>

                                        <input at-attr="input" autocomplete="on" id="bio" name="bio" maxlength="24" id="input-login" placeholder="" type="text" class="form-control" value="{{$user->bio}}"></div> 

                                           

                                        </div>
                                         <div class="row">

                                            <div class="col-md-11" style="margin-left:15px;">

                                           <label for="input-login" class="form-group">Location</label><input at-attr="input" autocomplete="on" name="location" id="location" maxlength="24" id="input-login" placeholder="" type="text" class="form-control" value="{{$user->location}}"></div> 





                                           </div> <div class="row" >

                                            <div class="col-md-11" style="margin-left:15px;">

                                           <label for="input-login" class="form-group">Website Url</label><input at-attr="input" autocomplete="on" name="websiteurl"  id ="websiteurl"maxlength="24" id="input-login" placeholder="" type="text" class="form-control" value="{{$user->websiteurl}}"></div> 

                                           </div> 

                                            </div>
                                            
                                           <div class="row"style="margin-bottom:100px ;" >

                                            <div class="col-md-11" style="margin-left:15px; margin-top:20px;">

                                            <a href ="{{url('/my/banking')}}">Add bank account and payment information</a>

                                           </div>
                                               </div>



                        </div>

                        

                    </div>

</div>





<div id="Account" class="tabcontent">

      <h2 style="margin-left:20px; margin-top:20px ;"> Account Info</h2>

<table class="table table-bordered">

   

    <tbody>

      

      <tr>

      

        <td>

        

         <a href="#email"><input type="text" class="form-control" name="" value="{{$user->email}}"> <i class="fa fa-angle-right" ></i></td>

        

      </tr>



      <tr>

        <td>

         <a href="#email"><input type="text" class="form-control" name="" value=""> <i class="fa fa-angle-right" style="margin-left:600px;"></i>

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

      

        <td>Show activity status <label class="switch" style="margin-left:510px;">

   <input type="checkbox" checked onclick="toggle()" id="rt">

  <span class="slider round"></span>

</label></td>

        

      </tr>



      <tr>

        <td>  Show subscription offers <label class="switch" style="margin-left:655px;">

  <input type="checkbox" checked>

  <span class="slider round"></span>

</label></td>

        

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

               



           </div></div>


  

           @endsection



           @include('front.modal.profile_image')



<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="{{ asset('public/front_assets/js/notify.js')}}"></script>



<script type="text/javascript">

    



     $(document).ready(function (e) { 

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


     function saveuserdetails(){
    var name = $("#name").val();
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
        data: {username:username,name:name,bio:bio,location:location,websiteurl:websiteurl},
        success:function(data){ 
            $('#replycomment_' + commentid ).val('');


}
});
}

 

</script>

<script type="text/javascript">
    
    $(function(){
    document.getElementById("risposta").onchange = function(e) {
        selected_value = this.value;
        if (selected_value == "") {
            $.notify("Seleziona una risposta...", "info");
        } else {
            if (selected_value == "1") {
                $.notify("Risposta esatta!", "success");
            } else {
                $.notify("Risposta errata!", "error");
            }
        }
    };
 });



</script>