<script>
 $(document).ready(function(){
  
   $("#postamountddd").hide();  

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

function price(priceval,postid){

   document.getElementById('postid').value =  postid;

   document.getElementById('htmlamount').innerHTML = priceval;
}

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
   $(".responsecomment"+postid).append('<div class="img-name"><figure class="avatar me-3"><img src="'+ base_url +'/celebs/public/front_assets/images/default-profile-pic-e1513291410505.jpg" alt="image" class="shadow-sm rounded-circle w35"></figure> <h4  fw-700 text-grey-900 font-xssss mt-1 viewall ">'+data.name+' <span class="d-block font-xssss fw-500 mt-1 lh-3 text-grey-500">'+data.response+'</span></h4><div  onclick="commentLike('+data.commentid+')" class="commentboxalllike "><i class="fa fa-heart"></i></div></div><div class="clike"><h6 id="clikes_"'+data.commentid+'></h6><h6 onclick="postcomment('+data.commentid+')">reply</h6<h6 id="clikes_"'+data.commentid+'></h6>></div></div>');
    document.getElementById("commentcount"+postid).innerHTML = data.commentcount;
      }else{   
          $(".responsecomment"+postid).append('<div class="img-name"><figure class="avatar me-3"><img src="'+ base_url +'/celebs/public/images/'+data.profile_image+'" alt="image" class="shadow-sm rounded-circle w35"></figure><h4 fw-700 text-grey-900 font-xssss mt-1 viewall">'+data.name+' <span class="d-block font-xssss fw-500 mt-1 lh-3 text-grey-500">'+data.response+'</span></h4><div  onclick="commentLike('+data.commentid+')" class="commentboxalllike "><i class="fa fa-heart"></i></div></div><div class="clike"><h6 id="clikes_"'+data.commentid+'></h6><h6 onclick="postcomment('+data.commentid+')">reply</h6></div></div>'); 
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
   
   $(".responsereplycomment"+commentid).append('<div class="reply"><div class="img-name"><figure class="avatar me-3"><img src="'+ base_url +'/celebs/public/front_assets/images/default-profile-pic-e1513291410505.jpg" alt="image" class="shadow-sm rounded-circle w35"></figure><h4 class="fw-700 text-grey-900 font-xssss mt-1">'+data.name+' <span class="d-block font-xssss fw-500 mt-1 lh-3 text-grey-500">'+data.response+'</span></h4></div></div><div class="reply"><div class="clike"><h6 onclick="commentLike('+data.replycommentid+')">Like</h6><h6 onclick="postcomment('+data.replycommentid+')">reply</h6></div></div>');
   
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
   
             console.log(data);
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
   
      function deletecomment(commentid){
   
   alert('Are you sure that you want to delete comment');
   
    
   
     
   
      $.ajax({
   
             headers: {
   
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   
         },
         url: "{{url('comment/remove')}}",
   
         type: "post",
   
         dataType: 'JSON',
   
         data: {commentid:commentid},
   
         success:function(data){           
   
   
   
          }
   
         });
   
      }


       function subscribe(profilerid,planname){
           $.ajax({
   
             headers: {
   
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   
         },
   
         url: "{{url('subscribe')}}",
   
         type: "post",
   
         dataType: 'JSON',
   
         data: {profilerid:profilerid,planname:planname},
   
         success:function(data){           
           location.reload();
      
   
          }
   
         });
   
   
          
      }
   
   
</script>