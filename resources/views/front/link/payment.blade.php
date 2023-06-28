

@extends('layouts.appFront')



@section('content')

<div class="middle-sidebar-bottom">

                <div class="middle-sidebar-left">

                    <div class="card w-100 border-0 bg-white shadow-xs p-0 mb-4">

                        <div class="card-body p-4 w-100 bg-current border-0 d-flex rounded-3">

                            <a href="default-settings.html" class="d-inline-block mt-2"><i class="ti-arrow-left font-sm text-white"></i></a>

                            <h4 class="font-xs text-white fw-600 ms-4 mb-0 mt-2">Payment Method</h4>

                        </div>
                @if(session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                        <div class="card-body p-lg-5 p-4 w-100 border-0">

                            <div class="row">

                                <div class="col-lg-5">

                                    <div class="col-lg-12 ps-0">

                                        <h4 class="mb-4 font-lg fw-700 mont-font mb-5">Saved Card </h4>

                                    </div>

                                    <div class="cleafrfix"></div>

                                    <div class="card border-0 shadow-none mb-4 mt-3">

                                        <div class="card-body d-block text-left p-0">

                                            <div class="item w-100 h150 bg-white rounded-xxl overflow-hidden text-left shadow-md ps-3 pt-2 align-items-end flex-column d-flex">

                                                <div class="card border-0 shadow-none p-0 bg-transparent-card text-left w-100">

                                                    <div class="row">

                                                        <div class="col-6">

                                                            <img src="{{url('/')}}/public/front_assets/images/b-9.png" alt="icon" class="w40 float-left d-inline-block">

                                                        </div>

                                                        <div class="col-6 text-right pe-4">

                                                            <img src="{{url('/')}}/public/front_assets/images/chip.png" alt="icon" class="w30 float-right d-inline-block mt-2 me-2">

                                                        </div>

                                                    </div>

                                                </div>

                                                <div class="card border-0 shadow-none p-0 bg-transparent-card text-left w-100 mt-auto">

                                                    <h4 class="text-grey-900 font-sm fw-700 mont-font mb-3 text-dark-color">$ 5960.00 <span class="d-block fw-500 text-grey-500 font-xssss mt-1 text-dark-color">Debit Card</span></h4>

                                                </div>

                                            </div>

                                        </div>

                                    </div>



                                    <div class="card border-0 shadow-none mb-4">

                                        <div class="card-bod6 d-block text-left 2 fw-600-0">

                                            <div class="item w-100 h150 bg-gold-gradiant rounded-xxl overflow-hidden text-left shadow-md ps-3 pt-2 align-items-end flex-column d-flex">

                                                <div class="card bg-transparent border-0 bg-transparent-card shadow-none p-0 text-left w-100">

                                                    <div class="row">

                                                        <div class="col-6">

                                                            <img src="{{url('/')}}/public/front_assets/images/b-14.png" alt="icon" class="w90 float-left d-inline-block">

                                                        </div>

                                                        <div class="col-6 text-right pe-4">

                                                            <img src="{{url('/')}}/public/front_assets/images/chip.png" alt="icon" class="w30 float-right d-inline-block mt-2 me-2 rounded-xxl">

                                                        </div>

                                                    </div>

                                                </div>

                                                <div class="card bg-transparent border-0 bg-transparent-card shadow-none p-0 text-left w-100 mt-auto">

                                                    <h4 class="text-white font-sm fw-700 mont-font mb-3">$ 5960.00 <span class="d-block fw-500 text-white font-xssss mt-1">Debit Card</span></h4>

                                                </div>

                                            </div>

                                        </div>

                                    </div>



                                    <div class="card border-0 mb-4 shadow-none">

                                        <div class="card-body d-block text-left p-0">

                                            <div class="item w-100 h150 bg-primary rounded-xxl text-left shadow-md ps-3 pt-2 align-items-end flex-column d-flex">

                                                <div class="card bg-transparent border-0 bg-transparent-card shadow-none p-0 text-left w-100">

                                                    <div class="row">

                                                        <div class="col-6">



                                                            <img src="{{url('/')}}/public/front_assets/images/b-10.png" alt="icon" class="w40 float-left d-inline-block">

                                                        </div>

                                                        <div class="col-6 text-right pe-4">

                                                            <img src="{{url('/')}}/public/front_assets/images/chip.png" alt="icon" class="w30 float-right d-inline-block mt-2 me-2 rounded-3">

                                                        </div>

                                                    </div>

                                                </div>

                                                <div class="card bg-transparent border-0 bg-transparent-card shadow-none p-0 text-left w-100 mt-auto">

                                                    <h4 class="text-white mb-3 font-sm fw-700 mont-font">$ 2260.00 <span class="d-block fw-500 text-grey-300 font-xssss mt-1">Debit Card</span></h4>

                                                </div>

                                            </div>

                                        </div>

                                    </div>



                                    <a href="#" class="rounded-xxl border-dashed mb-2 p-3 w-100 fw-600 fw-700 text-center font-xssss mont-font text-uppercase ls-3 text-grey-900 d-block  text-dark">Add Card</a>



                                </div>

                                <div class="col-lg-6 offset-lg-1">

                                    <div class="rounded-xxl bg-greylight h-100 p-3">

                                        <div class="col-lg-12 ps-0">

                                            <!-- <h4 class="mb-4 font-xs fw-700 mont-font mt-0">Add Card </h4> -->

                                        </div>

                                        <div class="col-lg-12">

                                            <div class="item ms-auto me-auto mt-3 w-100 h150 bg-white rounded-xxl text-left shadow-lg ps-3 pt-2 align-items-end flex-column d-flex">

                                                <div class="card border-0 bg-transparent-card shadow-none p-0 text-left w-100">

                                                    <div class="row">

                                                        <div class="col-6 ps-2">

                                                            <img src="{{url('/')}}/public/front_assets/images/b-17.png" alt="icon" class="w60 float-left d-inline-block">

                                                        </div>

                                                        <div class="col-6 text-right pe-4">

                                                            <img src="{{url('/')}}/public/front_assets/images/chip.png" alt="icon" class="w30 float-right d-inline-block mt-2 me-2">

                                                        </div>

                                                    </div>

                                                </div>

                                                <div class="card border-0 bg-transparent-card shadow-none p-0 text-left w-100 mt-auto">

                                                    <h4 class="text-grey-900 font-sm fw-700 mont-font text-dark-color">**** **** **** 2234 <span class="d-block fw-500 text-grey-500 font-xssss mt-0 mb-3 text-dark-color">Credit Card</span></h4>

                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-lg-12 mt-5">

                                            <form method="post" action="{{url('addCard')}}">
                                       @csrf
                                                <div class="form-group mb-1">

                                                    <label class="text-dark-color text-grey-600 font-xssss mb-2 fw-600" for="exampleInputPassword1">Card Number</label>

                                                    <div class="form-group icon-tab">

                                                        <input type="text" class="bg-white font-xsss border-0 rounded-3 form-control ps-4 bg-color-none border-bottom text-grey-900" placeholder="1234 1234 1234 1234" name="card_number">

                                                    </div>

                                                </div>

                                                <div class="form-group mb-1">

                                                    <label class="text-dark-color text-grey-600 font-xssss mb-2 fw-600" for="exampleInputPassword1">Card Holder Name</label>

                                                    <div class="form-group icon-tab">

                                                        <input type="text" class="bg-white border-0 rounded-3 form-control ps-4 bg-color-none border-bottom text-grey-900" placeholder="Name" name="card_holder_name">

                                                    </div>

                                                </div>

                                                <div class="row">

                                                    <div class="col-6">

                                                        <div class="form-group mb-1">

                                                            <label class="text-dark-color text-grey-600 font-xssss mb-2 fw-600" for="exampleInputPassword1">Month</label>

                                                            <div class="form-group icon-tab">

                                                                <input type="text" class="bg-white border-0 rounded-3 form-control ps-4 bg-color-none border-bottom text-grey-900" placeholder="03" name="expiry_month">

                                                            </div>

                                                        </div>

                                                    </div>

                                                    <div class="col-6">

                                                        <div class="form-group mb-1">

                                                            <label class="text-dark-color text-grey-600 font-xssss mb-2 fw-600" for="exampleInputPassword1">Year</label>

                                                            <div class="form-group icon-tab">

                                                                <input type="text" class="bg-white border-0 rounded-3 form-control ps-4 bg-color-none border-bottom text-grey-900" placeholder="2021" name="expiry_year">

                                                            </div>

                                                        </div>

                                                    </div>
                                            <div class="form-group mb-1">

                                                    <label class="text-dark-color text-grey-600 font-xssss mb-2 fw-600" for="exampleInputPassword1">cvv</label>

                                                    <div class="form-group icon-tab">

                                                        <input type="Number" class="bg-white font-xsss border-0 rounded-3 form-control ps-4 bg-color-none border-bottom text-grey-900" placeholder="cvv" name="cvv">

                                                    </div>

                                                </div>
                                                    <div class="col-12">

                                                        <button  type="submit" class="rounded-3 bg-current mb-2 mt-4 p-3 w-100 fw-600 fw-700 text-center font-xssss mont-font text-uppercase ls-3 text-white d-block">Pay Now</button>

                                                    </div>

                                                </div>

                                            </form>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    <!-- <div class="card w-100 border-0 p-2"></div> -->

                </div>



            </div>

        </div>

        <!-- main content -->



        <!-- right chat -->





        <div class="app-header-search">

            <form class="search-form">

                <div class="form-group searchbox mb-0 border-0 p-1">

                    <input type="text" class="form-control border-0" placeholder="Search...">

                    <i class="input-icon">

                        <ion-icon name="search-outline" role="img" class="md hydrated" aria-label="search outline"></ion-icon>

                    </i>

                    <a href="#" class="ms-1 mt-1 d-inline-block close searchbox-close">

                        <i class="ti-close font-xs"></i>

                    </a>

                </div>

            </form>

        </div>







@endsection