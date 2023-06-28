<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>

  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />
<div class="modal fade" id="postsedual" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
            <a href="#" class="subscribe close"  data-dismiss="modal"><i class="fa fa-close close-box"></i></a>
                <div class="modal-body">
                    <div class="polldayselect">
                        
                     
                        <div class="row">
                           <div class="card-body d-flex">
                               <div class="col-md-12 ">
                             
                                   <h6>Create Post</h6>
                                   @if(!empty(Auth::user()->profile_image))
                                    <figure class="avatar me-3"><img src="{{url('/')}}/public/images/{{Auth::user()->profile_image}}" alt="image" class="shadow-sm rounded-circle w45"></figure>
                                   @else
                                <figure class="avatar me-3"><img src="{{url('/')}}/public/front_assets/images/default-profile-pic-e1513291410505.jpg" alt="image" class="shadow-sm rounded-circle w45"></figure>
                                   @endif
                                   

                                    <h4 class="fw-700 text-grey-900 font-xssss mt-1">{{Auth::user()->name}} <span class="d-block font-xssss fw-500 mt-1 lh-3 text-grey-500"></span></h4>

                                    
                                    </div>
                                </div>
                                   <form  method="post" enctype="multipart/form-data" action="{{url('createpost')}}">
                           @csrf
                                    <div class="col-md-12"> <textarea name="message" class="h100 bor-0 w-100 p-2 ps-5 font-xssss text-grey-500 fw-500 border-light-md theme-dark-bg" cols="30" rows="10" placeholder="What's on your mind?"></textarea></div>
                            <div class="col-md-12">
                            <label>Select Post Category</label>
                            <div class="form-group">
                              
      <select class="selectpicker des select-search" data-show-subtext="false" data-live-search="true" style="-webkit-appearance: none;"  name="postcategory" id="postcategory" 
      onchange="dddd()">
     
                           @foreach($postcategory as $val)
                                        <option value="{{$val->id}}">{{$val->category_name }}</option>
                                        @endforeach
      </select>
        </div> </div>
         <div class="col-md-12" id="postamountddd">
          <div class="form-group">
          <input type="text"  value=""   name="amount"  placeholder="Amount" onkeypress="if(isNaN(this.value + String.fromCharCode(event.keyCode) )) return false" maxlenth="10">
</div>
     </div>  
                            <div class="col-md-12">
                                <!-- <img src="{{url('/')}}/public/front_assets/images/default-profile-pic-e1513291410505.jpg" style="width:100%;height:100px;" id="post-image" >
 -->                                  <div id="photos" class="row">
     
     <div class="file">
                                        <label for="input-file">
                                            <i class="fa fa-picture-o"></i> 
                                        </label>
                                        <input id="input-file"  name="photo[]" id="photo" type="file" accept=".png, .jpg, .jpeg,.mp4" onchange="readFile(this);" multiple>
                                    </div>
                                  
 </div>
                                         
                          
                            </div>
                         
                        </div>
                    <div class="savepollarea">
                        <a href="#" class="subscribe" class="close" data-dismiss="modal">Cancel</a>
                        <button  type="submit" class="btn btn-primary">Post</button>
                    </div>
                    </form>
                </div>

            </div>

        </div>
    </div>

</div>

