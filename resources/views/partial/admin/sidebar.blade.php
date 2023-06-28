

<nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="profile-image">
                
                  <div class="dot-indicator bg-success"></div>
                </div>
                <div class="text-wrapper">
                  <p class="profile-name">Celebsuncut</p>
                  <p class="designation">{{Auth::user()->role()->first()->title}}</p>
                </div>
                <div class="icon-container">
                  <i class="icon-bubbles"></i>
                  <div class="dot-indicator bg-danger"></div>
                </div>
              </a>
            </li>
            <li class="nav-item nav-category">
              <span class="nav-link">Dashboard</span>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('/')}}">
                <span class="menu-title">Dashboard</span>
                <i class="icon-screen-desktop menu-icon"></i>
              </a>
            </li>
              @if(Auth::user()->role()->first()->title=='Administrator')
             @canany(['users_access','roles_access','permissions_access'])

             
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic ">
                <span class="menu-title">Users Management</span>
                <i class="icon-layers menu-icon"></i>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  @can('users_access')
                                    <li class="nav-item">
                                        <a class="nav-link  @if(request()->is('admin/users') || request()->is('admin/users/*')) is_active @endif" href="{{ url('admin/celebrity') }}" aria-expanded="false">
                                            celebrity
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link  @if(request()->is('admin/users') || request()->is('admin/users/*')) is_active @endif" href="{{ route('admin.users.index') }}" aria-expanded="false">
                                            Users
                                        </a>
                                    </li>
                                @endcan
                                  @can('roles_access')
                                    <li class="nav-item">
                                        <a class="nav-link   @if(request()->is('admin/roles') || request()->is('admin/roles/*')) is_active @endif" href="{{ route('admin.roles.index') }}" aria-expanded="false">
                                           
                                            Roles
                                        </a>
                                    </li>
                                @endcan

                                @can('permissions_access')
                                    <li class="nav-item">
                                        <a class="nav-link waves-effect waves-dark  @if(request()->is('admin/permissions') || request()->is('admin/permissions/*')) is_active @endif" href="{{ route('admin.permissions.index') }}" aria-expanded="false">
                                           
                                            Permissions
                                        </a>
                                    </li>
                                @endcan
                 
                </ul>
              </div>
            </li>
             @endcanany
            <!-- <li class="nav-item">
              <a class="nav-link" href="">
                <span class="menu-title">Category</span>
                <i class="icon-globe menu-icon"></i>
              </a>
            </li> -->
            
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                <span class="menu-title">Category Management</span>
                <i class="icon-doc menu-icon"></i>
              </a>
              <div class="collapse" id="auth">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="{{ url('admin/category/create') }}"> Create Category </a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{ url('admin/Category') }}">Category List </a></li>
                  
                 
                </ul>
              </div>
              
            </li>
             <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                <span class="menu-title">Organization Management</span>
                <i class="icon-doc menu-icon"></i>
              </a>
              
              <div class="collapse" id="auth">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="{{ url('admin/organization/create') }}"> Create Organization</a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{ url('admin/organization') }}">Organization List </a></li>
                  
                 
                </ul>
              </div>
            </li>
        <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                <span class="menu-title">Onfido Management</span>
                <i class="icon-doc menu-icon"></i>
              </a>
              
              <div class="collapse" id="auth">
                <ul class="nav flex-column sub-menu">
                
                  <li class="nav-item"> <a class="nav-link" href="{{ route('admin.onfido.index') }}">Onfido List </a></li>
                  
                 
                </ul>
              </div>
            </li>
             
            @endif
     @if(Auth::user()->role()->first()->title=='Celeberity')


            
             <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                <span class="menu-title">Subscription Management</span>
                <i class="icon-doc menu-icon"></i>
              </a>
              
              <div class="collapse" id="auth">
                <ul class="nav flex-column sub-menu">
                 <li class="nav-item"> <a class="nav-link" href="{{ url('Celeberity/subscription') }}">Subscription List </a></li>
                  
                 
                </ul>
              </div>
            </li>
            
             <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                <span class="menu-title">Subscription Plan</span>
                <i class="icon-doc menu-icon"></i>
              </a>
              
              <div class="collapse" id="auth">
                <ul class="nav flex-column sub-menu">
                 <li class="nav-item"> <a class="nav-link" href="{{ url('Celeberity/subscription/create') }}">Add Plan </a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{ url('Celeberity/subscription/plan') }}">Plan  list</a></li>
                 
                </ul>
              </div>
            </li>
          <!--  <li class="nav-item">-->
          <!--    <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">-->
          <!--      <span class="menu-title">Charity Amount Management </span>-->
          <!--      <i class="icon-doc menu-icon"></i>-->
          <!--    </a>-->
          <!--    <div class="collapse" id="auth">-->
          <!--      <ul class="nav flex-column sub-menu">-->
          <!--<li class="nav-item"> <a class="nav-link" -->
          <!--  href="{{route('Celeberity.Charity.create') }}"> Create Charity </a></li>-->
          <!--        <li class="nav-item"> <a class="nav-link"-->
          <!--         href="{{ route('Celeberity.Charity.index') }}">Charity List </a></li>-->
                  
                 
          <!--      </ul>-->
          <!--    </div>-->
          <!--  </li>-->

     @endif

          </ul>
        </nav>





        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
       
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
