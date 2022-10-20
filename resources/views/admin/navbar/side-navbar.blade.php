  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->

    <a href="/" class="brand-link">
      <img src="{{ asset('assets/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">{{env('APP_NAME')}}</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
{{--            <img src="/assets/upload/images/user/{{ Auth::user()->foto }}" class="img-circle elevation-2" alt="User Image">--}}
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">

            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ url('/admin/user')}}" class="nav-link @if($class==='User') active @endif"><i class="far fa-user nav-icon"></i> Users</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/admin/customer')}}" class="nav-link @if($class==='customer') active @endif"><i class="far fa-circle nav-icon"></i> Data Nasabah</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/admin/events')}}" class="nav-link @if($class==='event') active @endif"><i class="far fa-circle nav-icon"></i> Events</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.partner.list')}}" class="nav-link @if($class==='partner') active @endif"><i class="far fa-circle nav-icon"></i> Partner</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.video')}}" class="nav-link @if($class==='video') active @endif"><i class="far fa-circle nav-icon"></i> Videos</a>
                </li>

                <hr>
                <li class="nav-item text-center">
                    <form action="/logout" method="post">
                        @csrf
                        <button type="submit" class="nav-link btn-danger text-white">Logout</button>
                    </form>
                </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
