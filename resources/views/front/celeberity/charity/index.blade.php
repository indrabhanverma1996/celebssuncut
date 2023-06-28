@extends('layouts.appFront')
@section('content')
<div class="charitypage">
<div class="page-header">
   <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
      </ol>
   </nav>
</div>
<div class="row">
   @if (session('error'))
   <div class="alert alert-danger" role="alert">
      {{ session('error') }}
   </div>
   @endif
  <div class="dflex-aline pl_pr">
   <div class="col-md-9">
   <h1 class="breadcrumb-item active" aria-current="page"> Charity Form  list</h1>
   </div>
   <div class="col-md-3">
      <button  class="post-btn pull-right"><a class="nav-link" 
         href="{{route('Celeberity.Charity.create') }}"> Create Charity </a></button>
   </div>
</div>
   <div class="col-lg-12 stretch-card grid-margin" style="margin-top:10px">
      <div class="card">
         <div class="card-body">
            <table class="table table-bordered">
               <thead>
                  <tr>
                     <th> # </th>
                     <th> Charity Organization </th>
                     <th> Charity Amount </th>
                     <th>time </th>
                     <th> Action </th>
                  </tr>
               </thead>
               <tbody >
                  <?php $i = 1;?>
                  @foreach($charity as $val)
                  <tr>
                     <td> {{$i++}} </td>
                     <td>  @if(!empty($val->organization_id))  @foreach(json_decode($val->organization_id) as $organization) {{$organization}}  @endforeach @else  @endif  </td>
                     <td> 
                        @if(!empty($val->fixed_amount)){{$val->fixed_amount}} @elseif(!empty($val->per_ammount)) 
                        {{$val->per_ammount}}
                        @endif
                     </td>
                     <td>{{$val->no_of_days}}</td>
                     <td width="200px">
                        <a   href="{{ route('Celeberity.Charity.edit', $val->id) }}"
                           class="btn btn-sm btn-info">Edit</a>
                        <form action="{{ route('Celeberity.Charity.destroy', $val->id) }}" class="d-inline-block" method="post">
                           @csrf
                           @method('DELETE')
                           <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                     </td>
                  </tr>
                  @endforeach
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>
</div>
@endsection