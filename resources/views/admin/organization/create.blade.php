 
@extends('layouts.appAdmin')

@section('content')

 <div class="page-header">
             
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Forms</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Organization Form </li>
                </ol>
              </nav>
            </div>

 @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
            <div class="row">
              <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body" style="background-color:#ccccff;">
                   
           <form class="forms-sample"  action="{{
           url('admin/organization/store')}}" method="post">
            @csrf
                     <div class="form-group">
                        <label for="exampleInputUsername1">Organization Name</label>
                       <input type="text" class="form-control"  name="organization_name" id="exampleInputUsername1" placeholder="Organization Name" required>
                      </div>
                     
                     
                        <div class="form-group">
                        <label for="exampleInputUsername1">Status</label>
                        <select class="form-control" name="status">
                          <option value="1">Active</option>
                          <option value="0">Inactive</option>
                        </select>
                      </div>
                      <button type="submit" class="btn btn-primary mr-2">Submit</button>
                      
                    </form>
                  </div>
                </div>
              </div>
             


@endsection