 <div class="col-xl-6 col-xxl-6 col-lg-6">
               <div class="right-side messagearea">
                  <div class="row">
                     <div class="b-chats__conversations-content m-empty-chat onlychat">
                        <div class="conversations-start">
                           <div class="conversations-start__title" id="chatid" >
                              @foreach($message1 as $val)
 
 
   <div class="message-friend message-friend2  to">
               
    

          

         @if($val->from_user_id != Auth::user()->id)
         <div class="msgmsg">
            
               @php  $user = DB::table('users')->where('id', $val->from_user_id)->first(); @endphp
            
               @if(!empty($user->profile_image) )
               <img src="{{url('/')}}/public/images/{{$user->profile_image}}">
               @elseif(!empty($user->social_type))
               <img src="{{url('/')}}/public/front_assets/images/default-profile-pic-e1513291410505.jpg">
               @else
               <!-- <img src="{{$user->profile_image}}"> -->
               <img src="http://localhost/celebs/public/images/20220421070627.png">
               @endif
           
               <div class="charemessingarea">
                  <span class="messonep">{{$val->from_message}}

                      <p class="messtime">@php  
             $cu = date('Y-m-d H:i:s');
$a = $val->created_at;
$d1= new DateTime($cu); 
$d2= new DateTime($a ); 
$interval= $d1->diff($d2); 
 $hour = ($interval->days * 24) + $interval->h; 

$date  = strtotime($val->created_at);
if($hour>24){
echo date('d-M-Y h:i a', $date);

}else{
echo date('h:i a', $date);

}
@endphp</p>
                  </span>
                  </br>
                  
                 
                  
               </div>
             
         </div>
    
</div>
            
         @else
         <div class="message-friend message-friend2 from">
         <div id="charemessing">
         </div>
            <div class="charemessingarea">
            <span class="messtwop"> {{$val->from_message}}
                @if($val->to_message=='')
            <p class="messtime messtwoptime">@php  
             $cu = date('Y-m-d H:i:s');
$a = $val->created_at;
$d1= new DateTime($cu); 
$d2= new DateTime($a ); 
$interval= $d1->diff($d2); 
$hour = ($interval->days * 24) + $interval->h; 
$date  = strtotime($val->created_at);
if($hour>24){
echo date('d-M-Y h:i a', $date);

}else{
echo date('h:i a', $date);

}
@endphp</p>
            @endif
            </span>
            </br>
           
         </div>
         <div id="charemessingto">
         </div>
        
     
</div>
    @endif
@endforeach
                           </div>
                          
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <script>
var objDiv = document.getElementById("chatid");
objDiv.scrollTop = objDiv.scrollHeight;
</script>