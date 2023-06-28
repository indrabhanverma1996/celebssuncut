@extends('layouts.appFront')

@section('content')



<div class="middle-sidebar-bottom">

<div class="middle-sidebar-left">

<div class="row feed-body ">
  
   <div class="col-md-8 ">


      <div class="card w-100 border-0 p-0 bg-white shadow-xss rounded-xxl bankdetails">  @if (session('error'))
    
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif
                     @if (session('success'))
    
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    
  <form action="{{url('/savebankdetails')}}" method="post" enctype="multipart/form-data" >
  <h4>Add bank account and payment information</h4>
             @csrf

         <div class="row">

            <div class="col-md-6">

               <label for="input-login" class="form-group">First Name</label><input at-attr="input" autocomplete="on" name="first_name" maxlength="24" id="username" placeholder="" type="text" class="form-control" value="{{Auth::user()->first_name}}" >

            </div>

             <div class="col-md-6">

               <label for="input-login" class="form-group"> Last Name</label><input at-attr="input" autocomplete="on" name="last_name" maxlength="24" id="last_name" placeholder="" type="text" class="form-control" value="{{Auth::user()->last_name}}" >

            </div>

         </div>


         <div class="row">

            <div class="col-md-6" >

               <label for="input-login" class="form-group">Account Number</label>
 
               <input at-attr="input"  name="account_number"  id="input-login" placeholder="Account Number" type="text" onkeypress="if(isNaN(this.value + String.fromCharCode(event.keyCode) )) return false"  maxlenth="10" class="form-control"  value="@if(!empty($bank->account_number)){{$bank->account_number}}@else @endif" required >

            </div>
            <div class="col-md-6" >

               <label for="input-login" class="form-group">Branch code</label>

               <input at-attr="input" autocomplete="on" id="branch_code" name="branch_code" maxlength="24" id="input-login" placeholder="Branch Code" type="text" class="form-control" value="@if(!empty($bank->branch_code)){{$bank->branch_code}} @else @endif" required >

            </div>

         </div>
     
          <div class="row">

            <div class="col-md-6" >

               <label for="input-login" class="form-group">Country</label>

               <input at-attr="input" autocomplete="on" id="country" name="country" maxlength="24" id="input-login" placeholder="" type="text" class="form-control" value="@if(!empty($bank->country)){{$bank->country}}@else @endif" required>

            </div>


            <div class="col-md-6">

               <label for="input-login" class="form-group">Address</label><input at-attr="input" autocomplete="on" name="address" id="address" maxlength="24" id="input-login" placeholder="" type="text" class="form-control" value="@if(!empty($bank->address)){{$bank->address}} @else @endif" required>

            </div>

         </div>
         

         <div class="row" >

            <div class="col-md-6">

               <label for="input-login" class="form-group">City</label><input at-attr="input" autocomplete="on" name="city"  id ="city"maxlength="24" id="input-login" placeholder="" type="text" class="form-control" value="@if(!empty($bank->city)){{$bank->city}} @else @endif" required>

            </div>

            <div class="col-md-6">

               <label for="input-login" class="form-group">Zip / Postal Code</label><input at-attr="input" autocomplete="on" name="postal_code"  id ="postal_code" maxlength="24" id="input-login" placeholder="" type="text" class="form-control" value="@if(!empty($bank->postal_code)){{$bank->postal_code}} @else @endif" required>

            </div>

         </div>


         <div class="row" >

            <div class="col-md-12">

               <label for="input-login" class="form-group">Twiter </label><input at-attr="input" autocomplete="on" name="twiter"  id ="twiter"  id="input-login" placeholder="" type="text" class="form-control" value="@if(!empty($bank->twiter)){{$bank->twiter}} @else @endif" required>

            </div>

         </div>

         <div class="row" >

            <div class="col-md-12">

               <label for="input-login" class="form-group">instagram</label><input at-attr="input" autocomplete="on" name="instagram"  id ="instagram"  id="input-login" placeholder="" type="text" class="form-control" value="@if(!empty($bank->instagram)){{$bank->instagram}}@else @endif" required>

            </div>

         </div>

         <div class="row" >

            <div class="col-md-12">

               <label for="input-login" class="form-group">other</label><input at-attr="input" autocomplete="on" name="websiteurl"  id ="websiteurl"maxlength="24" id="input-login" placeholder="" type="text" class="form-control" value="" >

            </div>

         </div>

         <div class="row" >

            <div class="col-md-12">

     <label for="input-login" class="form-group"> Date of Birth</label>
               <input at-attr="input" autocomplete="on" name="date_of_birth"  id ="date_of_birth"maxlength="24" id="input-login" placeholder="" type="date" class="form-control" value="<?php if(!empty($bank->date_of_birth)){ echo $bank->date_of_birth; } else{ } ?>">

            </div>

         </div>

         <div class="row" >

            <div class="col-md-12">

               <label for="input-login" class="form-group"> document Type</label>

               <select class="form-control" name="doc_type" required>

                  <option>--choose--</option >

                  <option value="passport" >Passport</option>


                  <option value="driving_licence">Drivers License</option>

               </select>

            </div>

         </div>

         <div class="row" >

            <div class="col-md-8">

               <label for="input-login" class="form-group"> PHOTO OF YOUR ID</label>                 
               <input at-attr="input" autocomplete="on" name="card_photo"  id ="card_photo"maxlength="24" id="input-login" placeholder="" type="file" class="form-control" value=""  >
             </div>
            <div class="col-md-4">
         <label for="input-login" class="form-group"> </label>
               @if(!empty($bank))
         <img id="original" src="{{ url('public/userdoc/'.$bank->card_photo) }}" height="40" width="40">
           @endif 
            </div>

         </div>

         <div class="row" >

            <div class="col-md-8">

               <label for="input-login" class="form-group">  PHOTO OF HOLDING YOUR ID</label>

         
               <input at-attr="input" autocomplete="on" name="card_photo_holding_id"  id ="card_photo_holding_id" maxlength="24" id="input-login" placeholder="" type="file" class="form-control" value="@if(!empty($bank)) {{ $bank->card_photo}}@else  @endif"  >

            </div>
          <div class="col-md-4">

               <label for="input-login" class="form-group">  </label>

         
                 @if(!empty($bank))
         <img id="original" src="{{ url('public/userdoc/'.$bank->card_photo_holding_id ) }}" height="40" width="40">
              @endif 

            </div>
         </div>

         <div class="row" >

            <div class="col-md-12">

               <label for="input-login" class="form-group"> ID expiration date</label><input at-attr="input" autocomplete="on" name="id_expiration_date"  id ="id_expiration_date" maxlength="24" id="input-login" placeholder="" type="date" class="form-control" value="<?php if(!empty($bank->id_expiration_date )){ echo $bank->id_expiration_date ; } else{ } ?>">

            </div>

         </div>

         <div class="row">

            <div class="col-md-12">

               <div class="savepollarea">

                 <label for="input-login" class="form-group"> </label>

               <button type="submit" href="#" class="subscribe btn btn-primary" >submit </button>

            </div>

         </div>

         

      

      </form>
      </div>
      <div class="col-md-4"></div>
   </div>

</div>

@endsection
