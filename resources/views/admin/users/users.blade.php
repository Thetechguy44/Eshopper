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
        <div>Users</div>
      </h1>
        @if(Session::has('Success'))
         <div class="alert alert-success" role="alert">
           {{Session::get('Success')}}
         </div>
         @endif
        <div class="card">
          <div class="card-header">
            <h4>Users</h4>
            @can('user-create')
            <a href="{{route('users.create')}}" class="btn btn-primary btn-action mr-1 float-right" data-toggle="tooltip" title="Add User">Add user</a>
            @endcan
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">S/N</th>
                    <th scope="col">Names</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    @canany(['user-edit','user-delete'])
                    <th scope="col">Action</th>
                    @endcanany
                  </thr>
                </thead>
                <tbody>
                  @php 
                  $i = 1
                  @endphp
                  @foreach ($users as $user)
                  <tr>
                    <td>{{$i++}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                      @if(!empty($user->getRoleNames()))
                        @foreach($user->getRoleNames() as $role)
                          <label class="badge badge-success">{{ $role }}</label>
                        @endforeach
                      @endif
                    </td>
                    <td>
                    <div class="d-flex">
                      <form action="{{route('users.destroy',$user->id )}}"class="d-flex" method="POST">
                      @csrf 
                      @method('delete')
                          @can('user-edit')
                           <a href="{{url('admin/users/'.$user->id.'/edit')}}" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit"><i class="ion ion-edit"></i></a>
                          @endcan
                           <!-- <a href="{{route('users.destroy',$user->id )}}" class="btn btn-danger btn-action" data-toggle="tooltip" title="Remove" data-original-title="Delete"><i class="ion ion-trash-b"></i></a> -->
                           @can('user-delete')
                           <button type="Submit" onclick="return confirm('Are you sure to delete this user?')" class="btn btn-danger btn-action" data-toggle="tooltip" title="Remove" data-original-title="Delete"><i class="ion ion-trash-b"></i></button>
                           @endcan
                          </form>
                         </div>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              {{ $users->links()}}
            </div>
          </div>
        </div>
      </div>
     </section> 
</div>
@endsection
