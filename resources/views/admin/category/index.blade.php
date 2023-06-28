

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
                          <th> Category name </th>
                          <th> status </th>
                          <th> Action </th>
                          
                        </tr>
                      </thead>
                      <tbody>
                        <?php $i = 1;?>
                         @foreach($category as $val)
                        <tr class="table-info">
                          <td> {{$i++}} </td>
                          <td>{{$val->category_name}} </td>
                          <td> @if($val->status==1) <a href="" class="btn btn-sm btn-success">Active</a> 
                              @else
                              <button type="button" class="btn btn-sm btn-danger">Inactive</button>
                              @endif
                          </td>
                          <td><a href="{{url('admin/category/edit/'.$val->id)}}" class="btn btn-sm btn-info">Edit</a> 
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