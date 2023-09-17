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
        <div>Add User</div>
      </h1>
        <div class="card">
          <div class="card-header">
            <h4><strong>Add User</strong></h4>
            @can('user-list')
            <a href="{{route('users.index')}}" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="view users">View users</a>
            @endcan
          </div>
          <div class="card-body">
          <form method="POST" action="{{ route('users.store') }}">
                  @csrf
                    <div class="form-group">
                      <label for="name">{{ __('Name') }}</label>
                      <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                      @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                     @enderror
                    </div>

                  <div class="form-group">
                    <label for="email">{{ __('Email Address') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="password" class="d-block">{{ __('Password') }}</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                      @error('password')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>

                  <div class="form-group">
                    @foreach ($roles as $role)
                    <div class="form-check">
                    <input id="{{$role->name}}" type="checkbox" class="form-check-input" name="roles[]" value="{{$role->id}}">
                    <label for="{{$role->name}}" class="form-check-label">{{$role->name}}</label>
                    </div>
                    @endforeach
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">
                    {{ __('Add User') }}
                    </button>
                  </div>
                </form>
          </div>
      </div>
     </section> 
</div> 
</div>
@endsection