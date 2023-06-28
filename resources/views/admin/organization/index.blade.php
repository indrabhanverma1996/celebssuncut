

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
                    <div class="row">
                      <div class="col-md-9"></div>
                      <div class="col-md-3">
                         <input class="form-control" id="myInput" type="text" placeholder="Search..">
                      </div>
                    </div>
                    
                   
                    <table class="table table-bordered" style="margin-top:20px;" id="example">
                      <thead>
                        <tr>
                          <th> # </th>
                          <th> Organization Name </th>
                          <th> Status </th>
                          <th> Action </th>
                          
                        </tr>
                      </thead>
                      <tbody>
                        <?php $i = 1;?>
                         @foreach($organization as $val)
                        <tr class="table-info">
                          <td> {{$i++}} </td>
                          <td>{{$val->organization_name }} </td>
                           
                          <td> @if($val->status==1) <a href="" class="btn btn-sm btn-success">Active</a> 
                              @else
                              <button type="button" class="btn btn-sm btn-danger">Inactive</button>
                              @endif
                          </td>
                          <td>
<a   href="{{ url('admin/organization/edit/'.$val->id) }}"
             class="btn btn-sm btn-info">Edit</a>

              <form action="{{ url('admin/organization/delete/'.$val->id) }}" class="d-inline-block" method="post">
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
                   {!! $organization->links() !!}
                </div>
              </div>
            </div>

            @endsection