@extends('layouts.appAdmin')

@section('content')
<div class="page-header">

              

              <nav aria-label="breadcrumb">

                <ol class="breadcrumb">

                  <li class="breadcrumb-item"><a href="#"></a></li>

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

                          <th> Post  </th>
                         <th> Amount  </th>
                          <th>Puchaged users </th>
                          <th>Posted users </th>
                          <th>category </th>
<!-- 

                          <th> Action </th>
 -->
                          

                        </tr>

                      </thead>

                      <tbody>

                        <?php $i = 1;?>

                         @foreach($subscription as $val)


                        <tr class="table-info">

                          <td> {{$i++}} </td>

                          <td>{{ $val->content}} </td>
                            <td>{{$val->price}} </td>
                            <td>{{$val->name}} </td>
                            <td>  @php 
        
           $celebrity = DB::table('users')->where('id',$val->celebirity_user_id)->first();

  
@endphp @if(!empty($celebrity)){{$celebrity->name}} @endif</td>
                            <td>{{$val->category_name}} </td>
                          
                          <!-- <td><a href="{{url('admin/category/edit/'.$val->id)}}" class="btn btn-sm btn-info">Edit</a> 

                            <a href="{{url('admin/category/delete/'.$val->id)}}" class="btn btn-sm btn-danger">Delete</a>

                          </td> -->

                          

                        </tr>

                        @endforeach

                        

                        

                        

                      </tbody>

                    </table>

                  </div>

                </div>

              </div>

            </div>



            @endsection