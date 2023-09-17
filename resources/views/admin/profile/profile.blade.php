@extends('layouts.app')
@section('content')
<div class="main-wrapper">
  <div class="navbar-bg"></div>
  @include('layouts.nav')
  <div class="main-sidebar">
  @include('layouts.aside')
  </div>
  <div class="main-content">
    <section class="section profile">
      <div class="pagetitle">
        <div class="card-header">
          <h4><strong>Profile </strong></h4>
        </div>
      </div>
      @if(Session::has('Success'))
         <div class="alert alert-success" role="alert">
           {{Session::get('Success')}}
         </div>
         @endif
        <div class="card">
          <div class="card-header">
            <h4><strong>Profile</strong></h4>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-xl-4">
      
                <div class="card">
                  <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                
                    <img src="{{asset('asset/img/avatar/'.$profile->profile_image)}}" alt="Profile-image" class="rounded-circle">
                    <h2>{{$profile->name}}</h2>
                    <h3>{{$profile->job}}</h3>
                  </div>
                </div>
      
              </div>
      
              <div class="col-xl-8">
      
                <div class="card">
                  <div class="card-body pt-3">
                    <!-- Bordered Tabs -->
                    <ul class="nav nav-tabs nav-tabs-bordered">
      
                      <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="pill" href="#profile-overview">Overview</a>
                      </li>
                    </ul>
                    <div class="tab-content pt-2">
      
                      <div class="tab-pane fade show active profile-overview" id="profile-overview">
                        <h5 class="card-title">About</h5>
                        <p class=" fst-italic">{{$profile->about}}</h5>
                        <div class="row">
                          <div class="col-lg-3 col-md-4 label ">Full Name</div>
                          <div class="col-lg-9 col-md-8">{{$profile->name}}</div>
                        </div>
      
                        <div class="row">
                          <div class="col-lg-3 col-md-4 label">Job</div>
                          <div class="col-lg-9 col-md-8">{{$profile->job}}</div>
                        </div>
                        
                        <div class="row">
                          <div class="col-lg-3 col-md-4 label">Email</div>
                          <div class="col-lg-9 col-md-8">{{$profile->email}}</div>
                        </div>

                        <div class="row">
                          <div class="col-lg-3 col-md-4 label">Phone</div>
                          <div class="col-lg-9 col-md-8">{{$profile->phone}}</div>
                        </div>

                        <div class="row">
                          <div class="col-lg-3 col-md-4 label">Date of birth</div>
                          <div class="col-lg-9 col-md-8">{{$profile->dob}}</div>
                        </div>

                        <div class="row">
                          <div class="col-lg-3 col-md-4 label">Country</div>
                          <div class="col-lg-9 col-md-8">{{$profile->country}}</div>
                        </div>
      
                        <div class="row">
                          <div class="col-lg-3 col-md-4 label">Address</div>
                          <div class="col-lg-9 col-md-8">{{$profile->address}}</div>
                        </div>
                          
                        <a href="{{url('admin/profile/'.$profile->id . '/edit')}}" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit Profile" data-original-title="Edit"><i class="ion ion-edit"></i></a>
                      </div>
                    </div><!-- End Bordered Tabs -->
                  </div>
                </div>
              </div>
             
            </div>
          </div>
      </div>
     </section> 
   </div>
</div>
@endsection
