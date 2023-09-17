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
        <div>Edit Role</div>
      </h1>
        <div class="card">
          <div class="card-header">
            <h4><strong>Edit Role</strong></h4>
          </div>
          <div class="card-body">
          <form method="POST" action="{{ route('roles.update', $role->id) }}">
                  @csrf
                  @method('put')
                    <div class="form-group">
                      <label for="name">{{ __('Name') }}</label>
                      <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $role->name }}" required autocomplete="name" autofocus>
                      @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                     @enderror
                    </div>

                  <div class="form-group">
                    @foreach ($permissions as $permission)
                    <div class="form-check">
                    <input id="{{$permission->name}}" type="checkbox" class="form-check-input" name="permissions[]" value="{{$permission->id}}" @isset($role) @if(in_array($permission->id, $rolePermissions) ? true : false) checked @endif @endisset>
                    <label for="{{$permission->name}}" class="form-check-label">{{$permission->name}}</label>
                    </div>
                    @endforeach
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">
                    {{ __('Update Role') }}
                    </button>
                  </div>
                </form>
          </div>
      </div>
     </section> 
</div> 
</div>
@endsection