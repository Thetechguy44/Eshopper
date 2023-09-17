<aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="{{route('home.index')}}">Ecommerce</a>
      </div>
      <div class="sidebar-user">
        <div class="sidebar-user-picture">
        <img src="{{asset('asset/img/avatar/' . auth()->user()->profile_image)}}" alt="Profile">
        </div>
        <div class="sidebar-user-details">
          <div class="user-name">{{ Auth::user()->name }}</div>
          <div class="user-role">
          {{ Auth::user()->job }}
          </div>
        </div>
      </div>
      <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li class="active">
          <a href="{{route('home.index')}}"><i class="ion ion-speedometer"></i><span>Home</span></a>
        </li>
        <li class="menu-header">Components</li>

        @can('user-list')
        <li>
          <a href="#" class="has-dropdown"><i class="ion ion-person"></i><span>Manage Users</span></a>
          <ul class="menu-dropdown">
            <li><a href="{{route('users.index')}}"><i class="ion ion-ios-circle-outline"></i>Users</a></li>
            @can('user-create')
            <li><a href="{{route('users.create')}}"><i class="ion ion-ios-circle-outline"></i>Add User</a></li>
            @endcan
          </ul>
        </li>
        @endcan

        @can('role-list')
        <li>
          <a href="#" class="has-dropdown"><i class="ion ion-clipboard"></i><span>Manage Roles</span></a>
          <ul class="menu-dropdown">
            <li><a href="{{route('roles.index')}}"><i class="ion ion-ios-circle-outline"></i>Roles</a></li>
            @can('role-create')
            <li><a href="{{route('roles.create')}}"><i class="ion ion-ios-circle-outline"></i>Add Role</a></li>
            @endcan
          </ul>
        </li>
        @endcan

        @can('product-list')
        <li>
          <a href="#" class="has-dropdown"><i class="ion ion-flag"></i><span>Product</span></a>
          <ul class="menu-dropdown">
            <li><a href="{{route('product.index')}}"><i class="ion ion-ios-circle-outline"></i>View</a></li>
            @can('product-create')
            <li><a href="{{route('product.create')}}"><i class="ion ion-ios-circle-outline"></i>Add</a></li>
            @endcan
          </ul>
        </li>
        @endcan

        @canany(['category-list','subcategory-list','subsubcategory-list'])
        <li>
          <a href="#" class="has-dropdown"><i class="ion ion-ios-albums-outline"></i><span>Categories</span></a>
          <ul class="menu-dropdown">

            @can('category-list')
            <li><a href="#" class="has-dropdown"><i class="ion ion-ios-circle-outline"></i><span>Category</span></a>
            <ul class="menu-dropdown">
              <li><a href="{{route('category.index')}}"><i class="ion ion-ios-circle-outline"></i>View</a></li>
              @can('category-create')
              <li><a href="{{route('category.create')}}"><i class="ion ion-ios-circle-outline"></i>Add</a></li>
              @endcan
            </ul>
            </li>
            @endcan

            @can('subcategory-list')
            <li>
            <a href="#" class="has-dropdown"><i class="ion ion-ios-circle-outline"></i><span>Sub-Category</span></a>
                <ul class="menu-dropdown">
                  <li><a href="{{route('subcategory.index')}}"><i class="ion ion-ios-circle-outline"></i>View</a></li>
                  @can('subcategory-create')
                  <li><a href="{{route('subcategory.create')}}"><i class="ion ion-ios-circle-outline"></i>Add</a></li>
                  @endcan
                </ul>
            </li>
            @endcan

            @can('subsubcategory-list')
            <li>
              <a href="#" class="has-dropdown"><i class="ion ion-ios-circle-outline"></i><span>Sub-Sub-Category</span></a>
                <ul class="menu-dropdown">
                  <li><a href="{{route('sub-subcategory.index')}}"><i class="ion ion-ios-circle-outline"></i>View</a></li>
                  @can('subsubcategory-create')
                  <li><a href="{{route('sub-subcategory.create')}}"><i class="ion ion-ios-circle-outline"></i>Add</a></li>
                  @endcan
                </ul>
            </li>
            @endcan
            
          </ul>
        </li>
        @endcanany
      </ul>
      
      <div class="p-3 mt-4 mb-4">
        <a href="{{ route('logout') }}" class="btn btn-danger btn-shadow btn-round has-icon has-icon-nofloat btn-block" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="ion ion-log-out"></i> <div>{{ __('Logout') }}</div>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
      </div>
</aside>