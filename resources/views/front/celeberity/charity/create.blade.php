@extends('layouts.appFront')
@section('content')
<div class="charityedirepage creatcharity">
<div class="page-header">
   <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
         <!--<li class="breadcrumb-item"><a href="#">Forms</a></li>-->
         <!--<li class="breadcrumb-item active" aria-current="page">Category Form </li>-->
      </ol>
   </nav>
</div>
<div class="row">
@if (session('success'))
<div class="alert alert-success" role="alert">
   {{ session('success') }}
</div>
@endif
<!--  <nav aria-label="breadcrumb">-->
<!--  <ol class="breadcrumb">-->
<!--<li class="breadcrumb-item"><a href="#">Forms</a></li>-->
<!--  </ol>-->
<!--</nav>-->
<h1  aria-current="page"> Create charity Form </h1>
<div class="col-md-12 grid-margin stretch-card">
   <div class="card">
      <div class="card-body">
         <form class="forms-sample"  action="{{
            route('Celeberity.Charity.store')}}" method="post">
            @csrf
            <div class="form-group">
               <label for="exampleInputUsername1"> Organization Name</label>
               <select class="form-control" multiple="" name="organization_id[]">
                  @foreach($organization as $val)
                  <option value=" {{$val->organization_name}}">{{$val->organization_name}}</option>
                  @endforeach;
               </select>
            </div>
            <div class="col-sm-6">
               <label>
               <input type="radio" name="colorRadio" 
                  value="no"> Percentage Amount</label>             
            </div>
            <div class="col-sm-6">
               <label>
               <input type="radio" name="colorRadio" 
                  value="yes"  > Fixed Amount</label>
               <label>
            </div>
            <div class="form-group" id="fixed">
            <label for="FixedAmount" > Fixed Amount</label>
            <input type="Number" class="form-control" id="exampleInputUsername1" name="fixed_amount" placeholder="Fixed Amount" >
            </div>
            <div class="form-group" id="Percentage">
               <label for="PerAmount"> Percentage Amount</label>
               <input type="Number" class="form-control" id="exampleInputUsername1" name="per_ammount" placeholder="Percentage Amount" >
            </div>
            <div class="form-group">
               <label for="exampleInputUsername1">Status</label>
               <select class="form-control" name="no_of_days">
                  <option value="All Time">All Time</option>
                    <option value="Three months">Three months</option>
                  <option value="Six Months">Six Months </option>
               </select>
            </div>
            <button type="submit" class="btn btn-primary mr-2">Submit</button>
         </form>
      </div>
   </div>
</div>
</div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
   $(document).ready(function(){
   
   $("#fixed").hide();
   
   $("#Percentage").hide();
   
   $('input[name="colorRadio"]').click(function() {
   
   var inputValue = $(this).attr("value");
   
   if(inputValue=='yes'){
   
         
   
             $("#fixed").show();
   
           $("#Percentage").hide();
   
        }else{
   
      
   
        $("#Percentage").show();
   
       $("#fixed").hide();
   
     }  
   
   
   
   });
   
   });
   
</script>