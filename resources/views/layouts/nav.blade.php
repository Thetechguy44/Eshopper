<nav class="navbar navbar-expand-lg main-navbar fixed-top d-flex align-items-center">
    <form class="form-inline mr-auto">
      <ul class="navbar-nav mr-3">
        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="ion ion-navicon-round"></i></a></li>
        <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="ion ion-search"></i></a></li>
      </ul>
      <div class="search-element">
        <input class="form-control" type="search" placeholder="Search" aria-label="Search">
        <button class="btn" type="submit"><i class="ion ion-search"></i></button>
      </div>
    </form>
    @guest
     @if (Route::has('login'))
    <div class="btn">
    <a class="btn btn-primary btn-sm" href="{{ route('login') }}">{{ __('Login') }}</a>
    @endif
    @if (Route::has('register'))
    <a class="btn btn-primary btn-sm" href="{{ route('register') }}">{{ __('Register') }}</a>
    </div>
    @endif
        @else
    <ul class="navbar-nav navbar-right">
      <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg">
      <span><strong>{{ Auth::user()->name }}</strong></span>
        <div class="d-sm-none d-lg-inline-block"></div></a>
        <div class="dropdown-menu dropdown-menu-right">
          <a href="{{route('profile.index')}}" class="dropdown-item has-icon">
            <i class="ion ion-android-person"></i> Profile
          </a>
          <a href="{{ route('logout') }}" class="dropdown-item has-icon" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="ion ion-log-out"></i> {{ __('Logout') }}
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
           </form>
        </div>
      </li>
    </ul>
    @endguest
</nav>