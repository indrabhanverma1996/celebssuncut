@extends('layouts.appAdmin')
@section('content')

    <div class="card">
        <div class="card-header">{{ __('Roles List') }}</div>

        <div class="card-body">
            @can('role_create')
            <a href="{{ route('admin.roles.create') }}" class="btn btn-primary">Add New Role</a>
            @endcan

            <br /><br />



                <table class="table table-borderless table-hover" id="example">
                            <tr class="bg-info text-light">
                                <th class="text-center">ID</th>
                                <th>Title</th>
                                <th>Short Code</th>
                                <th>
                                    &nbsp;
                                </th>
                            </tr>
                    @forelse ($roles as $role)
                        <tr>
                            <td class="text-center">{{$role->id}}</td>
                            <td>{{$role->title}}</td>
                            <td>{{$role->short_code ?? '--'}}</td>
                            <td>
                                    @can('role_show')
                                        <a href="{{ route('admin.roles.show', $role->id) }}" class="btn btn-sm btn-success">View</a>
                                    @endcan
                                    @can('role_edit')
                                        <a href="{{ route('admin.roles.edit', $role->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    @endcan
                                    @can('role_delete')
                                        <form action="{{ route('admin.roles.destroy', $role->id) }}" class="d-inline-block" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    @endcan
                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="100%" class="text-center text-muted py-3">No Roles Found</td>
                            </tr>
                    @endforelse
                </table>




            @if($roles->total() > $roles->perPage())
            <br><br>
            {{$roles->links()}}
            @endif

        </div>
    </div>

@endsection
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

<script type="text/javascript">
    

$(document).ready( function () {
    $('#example').DataTable();
} );
</script>