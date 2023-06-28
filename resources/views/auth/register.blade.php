@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body register">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group">
                            <label for="name" class=" col-form-label text-md-right">{{ __('Name') }} :</label>

                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                        </div>

                        <div class="form-group">
                            <label for="email" class=" col-form-label text-md-right">{{ __('E-Mail Address') }} :</label>

                           
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                         
                        </div>
                         <div class="form-group ">
                             <label for="email" class=" col-form-label text-md-right">Account Type:</label></br>
                          

                                     <label class="col-form-label text-md-right accounttype" >
                                    <input type="radio" name="colorRadio" 
                                       value="2" required> Celebrity</label> 
                                <label class="col-form-label text-md-right accounttype" >
                                    <input type="radio" name="colorRadio" 
                                       value="3" required> User</label> 
                                 </div>
                        <div class="form-group">
                            <label for="password" class="col-form-label text-md-right">{{ __('Password') }} :</label>

                           
                              <input  type="password"  id="passwordconfirm" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>

                                         
                                    </span>
                                @enderror
                                  <div  id="CheckPasswordMatch" style="color:red"></div>
                                  <div  id="tests" ></div>
                          
                        </div>

                        <div class="form-group">
                            <label for="password-confirm"  class="col-form-label text-md-right">{{ __('Confirm Password') }} :</label>

                           
                                <input  type="password"  class="form-control" name="password_confirmation" required autocomplete="new-password">
                              
                            
                        </div>
                        

                        <div class="form-group mb-0 text-center">
                         
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                                <h5 class="text-center">Or</h5>

<div class="row text-center">
    <div class="col-12 text-center"> 
 <a href="{{ url('auth/facebook') }}" class="fa fa-facebook"></a>
 <a href="{{ url('auth/google') }}" class="fa fa-google"></a>
   <a href="{{ url('auth/twitter') }}" class="fa fa-twitter"></a>
       
       
  
</div>
                     <p class="text-center ihaveall">           @if (Route::has('login'))
                                   
                                    Already have an Account ?<a href="{{ route('login') }}" class="btn btn-link">{{ __('Login') }}</a>
                                @endif</p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
 $(document).ready(function(){
    $("#passwordconfirm").keyup(function(){
   
   
    var inputVal = $("#passwordconfirm").val();
    var len = inputVal.length;

     if(len < 8){
        $("#CheckPasswordMatch").html("Password must be 8 Charcter!");

     }else if(len > 8){
        
       $("#CheckPasswordMatch").html('');  
     }
  });
});
  </script>