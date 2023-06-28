         <div class="tab-pane active" id="tab1">
                           @foreach($users as $subscribe)
                           <ul class="message-friend">
                           <li> @if(!empty($subscribe->profile_image) )
                           <img src="{{url('/')}}/public/images/{{$subscribe->profile_image}}">
                           @elseif(!empty($subscribe->social_type))
                           <img src="{{url('/')}}/public/front_assets/images/default-profile-pic-e1513291410505.jpg">
                           @else
                           <img src="{{$subscribe->profile_image}}">
                           @endif</li>
                           <li>
                           <p> {{$subscribe->name}}<span> @ {{$subscribe->nickname}} </span></p>
                           <a href="{{url('my/chats/chat/'.$subscribe->id)}}">
                               @php $message = DB::table('tbl_messages')->whereRaw('(from_user_id =' . $subscribe->id . ' AND to_user_id =' . Auth::user()->id . ') OR (to_user_id =' . $subscribe->id. ' AND from_user_id =' . Auth::user()->id . ')')->orderBy('id', 'desc')->latest()->first(); @endphp
                           <p class="toosmall"> @if(!empty($message->from_message)) {{$message->from_message}} @endif</p>
                           </a>
                           </li>
                           <li>
                           <form action="{{ url('/subscribeduser/Destroy', $subscribe->id) }}" method="post">
                           @csrf
                           @method('DELETE')
                           <button type="submit" ><i class="fa fa-close"  onclick="return confirm('Are you sure that you want to delete this post?')"></i></button>
                           </form>
                           <span><?php if(!empty($message->created_at)){
                              $date  = strtotime($message->created_at); echo date('h:i a', $date); } ?> </span>
                           </li>
                           </ul>
                           @endforeach
                           </div>