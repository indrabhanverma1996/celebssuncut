<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Welcome to Celeb's Uncut The official website where you get to meet your favourite stars,influencers and inspirational people</title>

    <link rel="stylesheet" href="{{url('/')}}/public/front_assets/css/themify-icons.css">

    <link rel="stylesheet" href="{{url('/')}}/public/front_assets/css/feather.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="{{ asset('public/front_assets/js/custom.js')}}"></script>
    <!-- Favicon icon -->

    <link rel="icon" type="image/png" sizes="16x16" href="{{url('/')}}/public/front_assets/images/favicon.png">

    <!-- Custom Stylesheet -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{ asset('public/front_assets/css/style.css') }}">

    <link rel="stylesheet" href="{{ asset('public/front_assets/css/emoji.css')}}">

    <link rel="stylesheet" href="{{ asset('public/front_assets/css/lightbox.css')}}">

    <link rel="stylesheet" href="{{ asset('public/front_assets/css/video-player.css')}}">

    <link rel="stylesheet" href="{{ asset('public/front_assets/css/custome.css')}}">

  <link rel="stylesheet" href="{{ asset('public/front_assets/css/custom.css')}}">



   

</head>

  

<body class="color-theme-blue mont-font">

    <div class="main-wrapper">



        <!-- navigation top-->

        <div class="nav-header shadow-xs border-0">

            <div class="nav-top">

                <a href="{{url('/')}}"><img src="{{url('/')}}/public/front_assets/images/logo.jpg"></a>

                <a href="#" class="mob-menu ms-auto me-2 chat-active-btn"><i class="feather-message-circle text-grey-900 font-sm btn-round-md bg-greylight"></i></a>

                <a href="#" class="mob-menu me-2"><i class="feather-video text-grey-900 font-sm btn-round-md bg-greylight"></i></a>

                <a href="#" class="me-2 menu-search-icon mob-menu"><i class="feather-search text-grey-900 font-sm btn-round-md bg-greylight"></i></a>

                <button class="nav-menu me-0 ms-2"></button>

            </div>
            @php 


$message =DB::table('tbl_messages')->orderBy('id', 'DESC')->take(1)->first();


            @endphp
<div class="topheader">


        <!--    <form action="#" class="float-left header-search">

                <div class="form-group mb-0 icon-input">

                    <i class="feather-search font-sm text-grey-400"></i>

                    <input type="text" placeholder="Start typing to search.." class="bg-grey border-0 lh-32 pt-2 pb-2 ps-5 pe-3 font-xssss fw-500 rounded-xl w350 theme-dark-bg">

                </div>

            </form>-->
<div class="right-logouticon">
            <a href="{{url('/')}}" class="p-2 text-center ms-3 menu-icon center-menu-icon"><i class="feather-home font-lg alert-primary btn-round-lg theme-dark-bg text-current "></i></a>
            <a href="#" class="p-2 text-center ms-auto menu-icon" id="dropdownMenu3" data-bs-toggle="dropdown" aria-expanded="false"><span class="dot-count bg-warning"></span><i class="feather-bell font-xl text-current"></i></a>

            <div class="dropdown-menu dropdown-menu-end p-4 rounded-3 border-0 shadow-lg" aria-labelledby="dropdownMenu3">



                <h4 class="fw-700 font-xss mb-4">Notification</h4>

                <div class="Notification"></div>

                <!-- <div class="card bg-transparent-card w-100 border-0 ps-5 mb-3">

                    <img src="{{url('/')}}/public/front_assets/images/user-4.png" alt="user" class="w40 position-absolute left-0">

                    <h5 class="font-xsss text-grey-900 mb-1 mt-0 fw-700 d-block">Goria Coast <span class="text-grey-400 font-xsssss fw-600 float-right mt-1"> 2 min</span></h5>

                    <h6 class="text-grey-500 fw-500 font-xssss lh-4">Mobile Apps UI Designer is require..</h6>

                </div>



                <div class="card bg-transparent-card w-100 border-0 ps-5 mb-3">

                    <img src="{{url('/')}}/public/front_assets/images/user-7.png" alt="user" class="w40 position-absolute left-0">

                    <h5 class="font-xsss text-grey-900 mb-1 mt-0 fw-700 d-block">Surfiya Zakir <span class="text-grey-400 font-xsssss fw-600 float-right mt-1"> 1 min</span></h5>

                    <h6 class="text-grey-500 fw-500 font-xssss lh-4">Mobile Apps UI Designer is require..</h6>

                </div>

                <div class="card bg-transparent-card w-100 border-0 ps-5">

                    <img src="{{url('/')}}/public/front_assets/images/user-6.png" alt="user" class="w40 position-absolute left-0">

                    <h5 class="font-xsss text-grey-900 mb-1 mt-0 fw-700 d-block">Victor Exrixon <span class="text-grey-400 font-xsssss fw-600 float-right mt-1"> 30 sec</span></h5>

                    <h6 class="text-grey-500 fw-500 font-xssss lh-4">Mobile Apps UI Designer is require..</h6>

                </div>
 -->
            </div>
            <a href="{{url('logout')}}" class="p-0 ms-3 menu-icon"><i class="fa fa-power-off" aria-hidden="true"></i></a>
            </div>




<script type="text/javascript">
   

</script>