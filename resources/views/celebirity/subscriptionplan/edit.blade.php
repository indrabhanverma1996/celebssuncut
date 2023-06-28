 

@extends('layouts.appAdmin')



@section('content')



 <div class="page-header">

             

              <nav aria-label="breadcrumb">

                <ol class="breadcrumb">

                  <li class="breadcrumb-item"><a href="#">Forms</a></li>

                  <li class="breadcrumb-item active" aria-current="page">Plan Form </li>

                </ol>

              </nav>

            </div>



 @if (session('success'))

                        <div class="alert alert-success" role="alert">

                            {{ session('success') }}

                        </div>

                    @endif

            <div class="row">

              <div class="col-md-6 grid-margin stretch-card">

                <div class="card">

                  <div class="card-body">

                   

                    <form class="forms-sample" action="{{url('Celeberity/subscription/update/'.$subscriptionplan->id)}}">

                        @csrf

                     {{-- <div class="form-group">

                        <label for="exampleInputUsername1"> Plan Name</label>

                        <input type="text" class="form-control" id="exampleInputUsername1" name="plan_name" placeholder=" Plan Name" value="{{$subscriptionplan->plan_name}}">

                      </div> --}}

                       <div class="form-group">

                        <label for="exampleInputUsername1"> Plan Price</label>

                        <input type="text" class="form-control" id="exampleInputUsername1" name="plan_price" placeholder="Plan Price" value="{{$subscriptionplan->plan_price}}">

                      </div>

                      <div class="form-group">

                        <label for="exampleInputUsername1"> Plan Expiry days</label>

                        <input type="text" class="form-control" id="exampleInputUsername1" name="plan_days" placeholder="days" value="{{$subscriptionplan->plan_days}}">

                      </div>

                       <div class="form-group">

                        <label for="exampleInputUsername1">Category </label>

                        <select class="form-control" name="category_id">

                            @foreach($category as $val)

                          <option value="{{$val->id}}">{{$val->category_name}}</option>

                        @endforeach;

                        </select>

                      </div>

                      

                      <button type="submit" class="btn btn-primary mr-2">Submit</button>

                      

                    </form>

                  </div>

                </div>

              </div>

             <!--  <div class="col-md-6 grid-margin stretch-card">

                <div class="card">

                  <div class="card-body">

                    <h4 class="card-title">Horizontal Form</h4>

                    <p class="card-description"> Horizontal form layout </p>

                    <form class="forms-sample">

                      <div class="form-group row">

                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Email</label>

                        <div class="col-sm-9">

                          <input type="text" class="form-control" id="exampleInputUsername2" placeholder="Username">

                        </div>

                      </div>

                      <div class="form-group row">

                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Email</label>

                        <div class="col-sm-9">

                          <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Email">

                        </div>

                      </div>

                      <div class="form-group row">

                        <label for="exampleInputMobile" class="col-sm-3 col-form-label">Mobile</label>

                        <div class="col-sm-9">

                          <input type="text" class="form-control" id="exampleInputMobile" placeholder="Mobile number">

                        </div>

                      </div>

                      <div class="form-group row">

                        <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Password</label>

                        <div class="col-sm-9">

                          <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password">

                        </div>

                      </div>

                      <div class="form-group row">

                        <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Re Password</label>

                        <div class="col-sm-9">

                          <input type="password" class="form-control" id="exampleInputConfirmPassword2" placeholder="Password">

                        </div>

                      </div>

                      <div class="form-check form-check-flat form-check-primary">

                        <label class="form-check-label">

                          <input type="checkbox" class="form-check-input"> Remember me </label>

                      </div>

                      <button type="submit" class="btn btn-primary mr-2">Submit</button>

                      <button class="btn btn-light">Cancel</button>

                    </form>

                  </div>

                </div>

              </div>

 -->





@endsection