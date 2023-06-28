

<div class="modal editprofile" id="myModalprofile" >

    <div class="modal-dialog modal-lg">

      <div class="modal-content" style="height:400px;">

        <div class="modal-body" > <button type="button" class="close" data-dismiss="modal">&times;</button>

          <form id="imageUploadForm" action="javascript:void(0)" enctype="multipart/form-data">
          <div class="file">
                                        <label for="input-file">
                                            <i class="fa fa-picture-o"></i> Add Photo
                                        </label>
                                        <input id="input-file" name="photo_name" type="file" onchange="readURL(this);">
                                    </div>

             @csrf

             <!-- <input  type="file" name="photo_name" id="photo_name" onchange="readURL(this);" required="" /> -->
              @if($user->profile_image =='')
             <figure class="avatar position-absolute w100 z-index-1" ><img src="{{url('/')}}/public/front_assets/images/default-profile-pic-e1513291410505.jpg"  alt="image" class="float-right p-1 bg-white rounded-circle w-250" id="blah" ></figure>
          
@else
          <figure class="avatar position-absolute w100 z-index-1" ><img src="{{url('/')}}/public/images/{{$user->profile_image}}" alt="image" class="float-right p-1 bg-white rounded-circle w-250" id="blah" ></figure>
          @endif
        </div>

       

        <!-- Modal footer -->

        <div class="modal-footer">
          <ul>
            <li><a href="#"> <i class="fa fa-edit"></i>Edit Profile</a></li>
            <li><a href="#">  <i class="fa fa-camera" aria-hidden="true"></i>Add Photo</a></li>
            <li><a href="#">   <i class="fa fa-picture-o" aria-hidden="true"></i>Frames</a></li>
        </ul>
 
            <button type="submit" class="btn btn-info" >save</button>

          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

        </div>

         </form>

        

      </div>

    </div>

  </div>


  
<div class="modal editprofile" id="coverimage" >

    <div class="modal-dialog modal-lg">

      <div class="modal-content" style="height:400px;">

        <div class="modal-body" > <button type="button" class="close" data-dismiss="modal">&times;</button>

          <form id="coverimageUploadForm" action="javascript:void(0)" enctype="multipart/form-data" method="post">
              <input id="input-file" name="cover_name" type="file" onchange="readcoverURL(this);">
          
             @csrf

             <!-- <input  type="file" name="photo_name" id="photo_name" onchange="readURL(this);" required="" /> -->
              @if($user->cover_image =='')
             <figure class="avatar position-absolute w100 z-index-1" ><img src="{{url('/')}}/public/front_assets/images/default-profile-pic-e1513291410505.jpg"  alt="image" class="float-right p-1 bg-white rounded-circle w-250" id="blah1" ></figure>
          
@else
          <figure class="avatar position-absolute w100 z-index-1" ><img src="{{url('/')}}/public/images/{{$user->cover_image}}" alt="image" class="float-right p-1 bg-white rounded-circle w-250" id="blah1" ></figure>
          @endif
        </div>

       

        <!-- Modal footer -->

        <div class="modal-footer">
          <ul>
            <li><a href="#"> <i class="fa fa-edit"></i>Edit Profile</a></li>
            <li><a href="#">  <i class="fa fa-camera" aria-hidden="true"></i>Add Photo</a></li>
            <li><a href="#">   <i class="fa fa-picture-o" aria-hidden="true"></i>Frames</a></li>
        </ul>
 
            <button type="submit" class="btn btn-info" >save</button>

          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

        </div>

         </form>

        

      </div>

    </div>

  </div>