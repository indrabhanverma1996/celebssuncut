



@extends('layouts.appAdmin')







@section('content')







<div class="page-header">

              

              <nav aria-label="breadcrumb">

                <ol class="breadcrumb">

                  <li class="breadcrumb-item"><a href="#">Tables</a></li>

                  <li class="breadcrumb-item active" aria-current="page">Basic tables</li>

                </ol>

              </nav>

            </div>

            @if (session('error'))

                        <div class="alert alert-danger" role="alert">

                            {{ session('error') }}

                        </div>

                    @endif

            <div class="row">

              

              <div class="col-lg-12 stretch-card grid-margin">

                <div class="card">

                  <div class="card-body">

                    

                   

                    <table class="table table-bordered">

                      <thead>

                        <tr>

                          <th> # </th>

                          <th> User name </th>

                          <th> Application Id </th>
                           <th> Status </th>
                          <th> Action </th>

                          

                        </tr>

                      </thead>

                      <tbody>

                        <?php $i = 1;?>

                         @foreach($onfido as $val)
                        
                          @php   $user = DB::table('users')->where('id',$val->user_id)->first(); @endphp
                        <tr class="table-info">

                          <td> {{$i++}} </td>

                          <td>{{$user->name}} </td>
                           <td>{{$val->applicant_id}} </td>
                         
                        <td>{{$val->status}} </td>
                          <td><a href="{{$val->results_uri}}"  target="_blank" class="btn btn-sm btn-info">export</a> 

                            <a href="{{url('admin/category/delete/'.$val->id)}}" class="btn btn-sm btn-danger">Delete</a>

                          </td>

                          

                        </tr>

                        @endforeach

                        

                        

                        

                      </tbody>

                    </table>

                  </div>

                </div>

              </div>

            </div>



            @endsection