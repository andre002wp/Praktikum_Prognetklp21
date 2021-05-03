{{-- <!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        <img src="{{ asset('backend/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
        <a href="#" class="d-block">Alexander Pierce</a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
            <li class="nav-item has-treeview menu-open">
                <a href=" {{ route('dashboard') }} " class="nav-link {{ Route::currentRouteName() === 'dashboard' ? 'active' : '' }} ">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Dashboard
                </p>
                </a>
            </li>
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                <i class="fas fa-align-justify"> </i>&nbsp;
                  <p>
                    Attribute
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href=" {{ route('category') }} " class="nav-link {{ Route::currentRouteName() === 'category' ? 'active' : '' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Category</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Brand</p>
                    </a>
                  </li>
                </ul>
              </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside> --}}
<style>
    .a-text a{
        text-indent: 14px;
    }
</style>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('backend/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
            <div class="ml-auto pr-2 pt-1">
                <a href="#" class="d-block">
                    {{-- @if () --}}
                        <svg class="notification" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bell" viewBox="0 0 16 16">
                            <path id="notification-normal" d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"/>
                        </svg>
                    {{-- @else --}}
                        {{-- <svg class="notification" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bell-fill" viewBox="0 0 16 16">
                            <path id="notification-fill" d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z"/>
                        </svg> --}}
                        {{-- @foreach($notifications as $notif)
											<li>{!!$notif->data!!}</li>
											<br>
										@endforeach --}}
                    {{-- @endif --}}
                </a>
                <div class="notification-content">
                    <ul>
                        <li>
                            Profile
                        </li>
                        <li>
                            {{ route('logout') }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->
                <li class="nav-item">
                    {{-- <a href=" {{ route('dashboard') }} " class="nav-link {{ Route::currentRouteName() === 'dashboard' ? 'active' : '' }}"> --}}
                    <a class="nav-link" href="#">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item has-treeview {{ Route::currentRouteName() === 'category' || 'brand' || 'product' ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ Route::currentRouteName() === 'category' || 'brand' || 'product' ? 'active' : '' }}">
                        <i class="fas fa-database pl-1 pr-1"></i>
                        <p style="text-indent: 8px;">Data Master</p>
                        <i class="fas fa-angle-left right"></i>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item a-text">
                            {{-- <a href=" {{ route('category') }} " class="nav-link {{ Route::currentRouteName() === 'category' ? 'active' : '' }}"> --}}
                            <a href="#">
                                <i class="far fa-hand-point-right"></i>
                                <p>Category</p>
                            </a>
                        </li>
                        <li class="nav-item a-text">
                            {{-- <a href=" {{ route('brand') }}" class="nav-link {{ Route::currentRouteName() === 'brand' ? 'active' : '' }}"> --}}
                            <a href="#">
                                <i class="far fa-hand-point-right"></i>
                                <p>Brands</p>
                            </a>
                        </li>
                        <li class="nav-item a-text">
                            {{-- <a href=" {{ route('product') }}" class="nav-link {{ Route::currentRouteName() === 'product' ? 'active' : '' }}"> --}}
                            <a href="#">
                                <i class="far fa-hand-point-right"></i>
                                <p>Products</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                @endguest
            </ul>
        </nav>
    <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

