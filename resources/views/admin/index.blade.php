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
            <div>{{ __('Dashboard') }}</div>
          </h1>
          
          <div class="row">
            <div class="col-lg-3 col-md-6 col-12">
              <div class="card card-sm-3">
                <div class="card-icon bg-primary">
                  <i class="ion ion-person"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Users</h4>
                  </div>
                  <div class="card-body">
                  {{$usercount}}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12">
              <div class="card card-sm-3">
                <div class="card-icon bg-danger">
                  <i class="ion ion-ios-paper-outline"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Roles</h4>
                  </div>
                  <div class="card-body">
                   {{$rolecount}}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12">
              <div class="card card-sm-3">
                <div class="card-icon bg-warning">
                  <i class="ion ion-paper-airplane"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Products</h4>
                  </div>
                  <div class="card-body">
                  {{$productcount}}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12">
              <div class="card card-sm-3">
                <div class="card-icon bg-success">
                <i class="ion ion-record"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Permission</h4>
                  </div>
                  <div class="card-body">
                  {{$permissioncount}}
                  </div>
                </div>
              </div>
            </div>                
          </div>
        
          
              <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
               </div>
               
               
              <div class="card">
                <div class="card-header">
                  <div class="float-right">
                    <div class="btn-group">
                      <a href="#" class="btn active">Week</a>
                      <a href="#" class="btn">Month</a>
                      <a href="#" class="btn">Year</a>
                    </div>
                  </div>
                  <h4>Statistics</h4>
                </div>
                <div class="card-body">
                  <canvas id="myChart" height="158"></canvas>
                  <div class="statistic-details mt-sm-4">
                    <div class="statistic-details-item">
                      <small class="text-muted"><span class="text-primary"><i class="ion-arrow-up-b"></i></span> 7%</small>
                      <div class="detail-value">$243</div>
                      <div class="detail-name">Today's Sales</div>
                    </div>
                    <div class="statistic-details-item">
                      <small class="text-muted"><span class="text-danger"><i class="ion-arrow-down-b"></i></span> 23%</small>
                      <div class="detail-value">$2,902</div>
                      <div class="detail-name">This Week's Sales</div>
                    </div>
                    <div class="statistic-details-item">
                      <small class="text-muted"><span class="text-primary"><i class="ion-arrow-up-b"></i></span>9%</small>
                      <div class="detail-value">$12,821</div>
                      <div class="detail-name">This Month's Sales</div>
                    </div>
                    <div class="statistic-details-item">
                      <small class="text-muted"><span class="text-primary"><i class="ion-arrow-up-b"></i></span> 19%</small>
                      <div class="detail-value">$92,142</div>
                      <div class="detail-name">This Year's Sales</div>
                    </div>
                  </div>
             </div>             
          </section>
    </div>
@endsection
