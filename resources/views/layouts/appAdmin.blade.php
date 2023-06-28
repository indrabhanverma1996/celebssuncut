<!DOCTYPE html>

<html lang="en">

  <head>

    <!-- Required meta tags -->

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title> Admin</title>

    <!-- plugins:css -->

    <link rel="stylesheet" href="{{url('/')}}/public/admin_assets/vendors/simple-line-icons/css/simple-line-icons.css">

    <link rel="stylesheet" href="{{url('/')}}/public/admin_assets/vendors/flag-icon-css/css/flag-icon.min.css">

    <link rel="stylesheet" href="{{url('/')}}/public/admin_assets/vendors/css/vendor.bundle.base.css">

    <!-- endinject -->

    <!-- Plugin css for this page -->

    <link rel="stylesheet" href="{{url('/')}}/public/admin_assets/./vendors/daterangepicker/daterangepicker.css">

    <link rel="stylesheet" href="{{url('/')}}/public/admin_assets/./vendors/chartist/chartist.min.css">

    <!-- End plugin css for this page -->

    <!-- inject:css -->

    <!-- endinject -->

    <!-- Layout styles -->

    <link rel="stylesheet" href="{{url('/')}}/public/admin_assets/./css/style.css">

    <!-- End layout styles -->

    <link rel="shortcut icon" href="{{url('/')}}/public/admin_assets/./images/favicon.png" />

  </head>

  <body>

    <div class="container-scroller">

      <!-- partial:partials/_navbar.html -->

      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">

        <div class="navbar-brand-wrapper d-flex align-items-center">

          <a class="navbar-brand brand-logo" href="http://site2demo.in/celebs/">

            <img src="{{url('/')}}/public/front_assets/images/logo.png" alt="logo" class="logo-dark" />

          </a>

          <a class="navbar-brand brand-logo-mini" href="http://site2demo.in/celebs/"><img src="{{url('/')}}/public/admin_assets/images/logo-mini.svg" alt="logo" /></a>

        </div>

        <div class="navbar-menu-wrapper d-flex align-items-center flex-grow-1">

          <h5 class="mb-0 font-weight-medium d-none d-lg-flex">Welcome Celebsuncut dashboard!</h5>

          <ul class="navbar-nav navbar-nav-right ml-auto">

            <form class="search-form d-none d-md-block" action="#">

              <i class="icon-magnifier"></i>

              <input type="search" class="form-control" placeholder="Search Here" title="Search here">

            </form>

            <li class="nav-item"><a href="#" class="nav-link"><i class="icon-basket-loaded"></i></a></li>

            <li class="nav-item"><a href="#" class="nav-link"><i class="icon-chart"></i></a></li>

            <li class="nav-item dropdown">

              

              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="messageDropdown">

               <!--  <a class="dropdown-item py-3">

                  <p class="mb-0 font-weight-medium float-left">You have 7 unread mails </p>

                  <span class="badge badge-pill badge-primary float-right">View all</span>

                </a> -->

                <div class="dropdown-divider"></div>

                

              

            <li class="nav-item dropdown d-none d-xl-inline-flex user-dropdown">

              <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">

                <img class="img-xs rounded-circle ml-2" src="{{url('/')}}/public/admin_assets/images/faces/face8.jpg" alt="Profile image"> <span class="font-weight-normal"> Admin </span></a>

              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">

                <div class="dropdown-header text-center">

                  <img class="img-md rounded-circle" src="{{url('/')}}/public/admin_assets/rounded-circle ml-2/images/faces/face8.jpg" alt="Profile image">

                  <p class="mb-1 mt-3">{{Auth::user()->name}}</p>

                  <p class="font-weight-light text-muted mb-0">{{Auth::user()->email}}</p>

                </div>

                <a href=""class="dropdown-item"><i class="dropdown-item-icon icon-user text-primary"></i> My Profile <span class="badge badge-pill badge-danger">1</span></a>

                

                <a  href="{{url('logout')}}"class="dropdown-item"><i class="dropdown-item-icon icon-power text-primary"></i>Sign Out</a>

              </div>

            </li>

          </ul>

          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">

            <span class="icon-menu"></span>

          </button>

        </div>

      </nav>

      <!-- partial -->

      <div class="container-fluid page-body-wrapper">

        <!-- partial:partials/_sidebar.html -->

         @include('partial.admin.sidebar')

        <!-- partial -->

        <div class="main-panel">

          <div class="content-wrapper">

          @yield('content')

          </div>

          <!-- content-wrapper ends -->

          <!-- partial:partials/_footer.html -->

          <footer class="footer">

            <div class="d-sm-flex justify-content-center justify-content-sm-between">

              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span>

             

            </div>

          </footer>

          <!-- partial -->

        </div>

        <!-- main-panel ends -->

      </div>

      <!-- page-body-wrapper ends -->

    </div>

    <!-- container-scroller -->

    <!-- plugins:js -->

    <script src="{{url('/')}}/public/admin_assets/vendors/js/vendor.bundle.base.js"></script>

    <!-- endinject -->

    <!-- Plugin js for this page -->

    <script src="{{url('/')}}/public/admin_assets/./vendors/chart.js/Chart.min.js"></script>

    <script src="{{url('/')}}/public/admin_assets/./vendors/moment/moment.min.js"></script>

    <script src="{{url('/')}}/public/admin_assets/./vendors/daterangepicker/daterangepicker.js"></script>

    <script src="{{url('/')}}/public/admin_assets/./vendors/chartist/chartist.min.js"></script>

    <!-- End plugin js for this page -->

    <!-- inject:js -->

    <script src="{{url('/')}}/public/admin_assets/js/off-canvas.js"></script>

    <script src="{{url('/')}}/public/admin_assets/js/misc.js"></script>

    <!-- endinject -->

    <!-- Custom js for this page -->

    <script src="{{url('/')}}/public/admin_assets/./js/dashboard.js"></script>

    <!-- End custom js for this page -->

  </body>

</html>