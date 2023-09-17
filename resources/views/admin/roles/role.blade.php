@extends('layouts.app')
@section('content')
<div class="main-wrapper">
  <div class="navbar-bg"></div>
  @include('layouts.nav')
  <div class="main-sidebar">
  @include('layouts.aside')
  </div>
  <div class="main-content">
    <section class="section">
      <h1 class="section-header">
        <div>Roles</div>
      </h1>
        @if(Session::has('Success'))
         <div class="alert alert-success" role="alert">
           {{Session::get('Success')}}
         </div>
         @endif
        <div class="card">
          <div class="card-header">
            <h4>Roles</h4>
            @can('role-create')
            <a href="{{route('roles.create')}}" class="btn btn-primary btn-action mr-1 float-right" data-toggle="tooltip" title="Add User">Add Role</a>
            @endcan
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">S/N</th>
                    <th scope="col">Names</th>
                    @canany(['role-edit','role-delete'])
                    <th scope="col">Action</th>
                    @endcanany
                  </thr>
                </thead>
                <tbody>
                  @php 
                  $i = 1
                  @endphp
                  @foreach ($roles as $role)
                  <tr>
                    <td>{{$i++}}</td>
                    <td>{{$role->name}}</td>
                    <td>
                    <div class="d-flex">
                      <form action="{{route('roles.destroy',$role->id )}}"class="d-flex" method="POST">
                      @csrf 
                      @method('delete')
                          @can('role-edit')
                           <a href="{{url('admin/roles/'.$role->id.'/edit')}}" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit"><i class="ion ion-edit"></i></a>
                           @endcan
                           <!-- <a href="{{route('roles.destroy',$role->id )}}" class="btn btn-danger btn-action" data-toggle="tooltip" title="Remove" data-original-title="Delete"><i class="ion ion-trash-b"></i></a> -->
                           @can('role-delete')
                           <button type="Submit" onclick="return confirm('Are you sure to delete this role?')" class="btn btn-danger btn-action" data-toggle="tooltip" title="Remove" data-original-title="Delete"><i class="ion ion-trash-b"></i></button>
                           @endcan
                          </form>
                         </div>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              {{ $roles->links()}}
            </div>
          </div>
        </div>
      </div>
     </section> 
</div>
@endsection
