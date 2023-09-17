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
        <div>Profile</div>
      </h1>
        <div class="card">
          <div class="card-header">
            <h4><strong>Edit Profile</strong></h4>
            <a href="{{route('profile.index')}}" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Back">Back</a>
          </div>
          <div class="card-body">
            <form action="{{route('profile.update',$profiles->id)}}" method="Post" enctype="multipart/form-data">
            @csrf 
            @method('put')
              <div class="row mb-3">
                <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                <div class="col-md-8 col-lg-9">
                  <img src="{{asset('asset/img/avatar/'.$profiles->profile_image)}}" alt="Profile" class="rounded-circle" width="200px" height="200px">
                  <div class="pt-2">
                    <input type="file" name="avatar" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Upload new profile image" data-original-title="Edit" value="{{$profiles->profile_image}}">
                   
                    <!-- <a class="btn btn-danger btn-action" data-toggle="tooltip" title="Remove my profile image" data-original-title="Delete"><i class="ion ion-trash-b"></i></a> -->
                  </div>
                </div>
              </div>

              <div class="row mb-3">
                <label for="firstname" class="col-md-4 col-lg-3 col-form-label">Name</label>
                <div class="col-md-8 col-lg-9">
                  <input name="name" type="text" class="form-control" id="firstname" value="{{$profiles->name}}">
                </div>
              </div>

              <div class="row mb-3">
                <label for="about" class="col-md-4 col-lg-3 col-form-label">About</label>
                <div class="col-md-8 col-lg-9">
                  <textarea name="about" class="form-control" id="about" style="height: 100px">{{$profiles->about}}</textarea>
                </div>
              </div>

              <div class="row mb-3">
                <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                <div class="col-md-8 col-lg-9">
                  <input name="email" type="email" class="form-control" id="Email" value="{{$profiles->email}}">
                </div>
              </div>

              <div class="row mb-3">
                <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                <div class="col-md-8 col-lg-9">
                  <input name="phone" type="text" class="form-control" id="Phone" value="{{$profiles->phone}}">
                </div>
              </div>

              <div class="row mb-3">
                <label for="DoB" class="col-md-4 col-lg-3 col-form-label">Date of birth</label>
                <div class="col-md-8 col-lg-9">
                  <input name="dob" type="date" class="form-control" id="DOB" value="{{$profiles->dob}}">
                </div>
              </div>

              <div class="row mb-3">
                <label for="Job" class="col-md-4 col-lg-3 col-form-label">Job</label>
                <div class="col-md-8 col-lg-9">
                  <input name="job" type="text" class="form-control" id="Job" value="{{$profiles->job}}">
                </div>
              </div>

              <div class="row mb-3">
                <label for="Country" class="col-md-4 col-lg-3 col-form-label">Country</label>
                <div class="col-md-8 col-lg-9">
                  <input name="country" type="text" class="form-control" id="Country" value="{{$profiles->country}}">
                </div>
              </div>

              <div class="row mb-3">
                <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                <div class="col-md-8 col-lg-9">
                  <input name="address" type="text" class="form-control" id="Address" value="{{$profiles->address}}">
                </div>
              </div>

              <div class="text-center">
                <button type="submit" class="btn btn-primary">Save Changes</button>
              </div>
            </form>

          </div>
      </div>
     </section> 
  
    </div>

</div>
@endsection