
<nav class="navigation scroll-bar">

            <div class="container ps-0 pe-0">

                <div class="nav-content">

                    <div class="nav-wrap bg-transparent-card rounded-xxl shadow-xss pb-1 mb-2 mt-2">



                        <ul class="mb-1 top-content">

                            <li class="logo">

                                <div class="profile-area">

                                    <figure class="avatar me-3">
                                       @if(!empty(Auth::user()->social_profile_image))
                                     
                                        <img src="{{Auth::user()->social_profile_image}}" alt="image" class="shadow-sm rounded-circle w45">
                                       @elseif(!empty(Auth::user()->profile_image))
                                      
                                        <img src="{{url('/')}}/public/images/{{Auth::user()->profile_image}}" alt="image" class="shadow-sm rounded-circle w45">
                                        @else
                                         <img src="{{url('/')}}/public/front_assets/images/default-profile-pic-e1513291410505.jpg" alt="image" class="shadow-sm rounded-circle w45">
                                       @endif
                                       
                                    </figure>
                                    <p>{{Auth::user()->name}} </p>

                                </div>

                            </li>





                            @if(Auth::user()->role()->first()->title=='Celeberity')

                            <li><a href="{{url('admin\dashboard')}}" class="nav-content-bttn open-font"><span>Admin Panel</span></a></li>

                            @endif

                            <li><a href="#" class="nav-content-bttn open-font"><span>Trending</span></a></li>

                            <li><a href="{{url('my/notifications')}}" class="nav-content-bttn open-font"><span>Notifications</span></a></li>

                            <li><a href="{{url('my/subscriptions')}}" class="nav-content-bttn open-font"><span>Subscriptions</span></a></li>

                            <li><a href="{{url('my/chats/')}}" class="nav-content-bttn open-font"><span>Messages</span></a></li>

                            <li><a href="#" class="nav-content-bttn open-font"><span>Lists</span></a></li>

                            <li><a href="{{url('card-number')}}" class="nav-content-bttn open-font"><span>Add Card</span></a></li>

                            <li><a href="{{url('profile')}}" class="nav-content-bttn open-font"><span>My Profile</span></a></li>
                              @if(Auth::user()->role()->first()->title=='Celeberity')
                            <li><a href="{{ route('Celeberity.Charity.index') }}" class="nav-content-bttn open-font"><span>Charity Work</span></a></li>
                                @endif
                            <li><a href="#" class="nav-content-bttn open-font"><span>Make a Donation</span></a></li>

                            <li><a href="#" class="nav-content-bttn open-font"><span>How it Works</span></a></li>

                        </ul>

                    </div>

                </div>

            </div>

        </nav>